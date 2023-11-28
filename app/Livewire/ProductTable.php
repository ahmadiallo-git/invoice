<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ProductTable extends Component
{
    public  array $quantity = [];
    public  $products;
    public $taxRate = 0;
    public $shipping;
    public $totalCartWithoutTax;
    public $totalWithTax;
    public $taxValue;
    public $selectedCountry = "";
    public $countries;
    protected $listeners = ["updatedCart"=> "render"];
    public $checkout_message = "";

    public function mount()
    {
        $this->products = Product::all();

        foreach ($this->products as $product) {
            $this->quantity[$product->id] = 1;
        }
    }
    public function render()
    {
       
        $cart = Cart::content();
        return view('livewire.product-table', compact('cart'));
    }

    public function addToCart($product_id) {
        $product = Product::findOrFail($product_id);
        Cart::add(
            $product->id,
            $product->name,
            $this->quantity[$product_id],
            $product->selling_price,

        );

        $this->emit('updatedCart') ;
    }

    public function checkout() {    
        //Check the product qunatities

        $cart = Cart::with('product')->where('user_id', auth()->id())->get();

        $products = Product::select('id', 'quantity')
                ->whereIn('id', $cart->pluck('product_id'))
                ->pluck('quantity', 'id');
        foreach ($cart as $cartProduct) {
           
            if(!isset($products[$cartProduct->product_id]) 
             || $products[$cartProduct->product_id] < $cartProduct->qty) {
                $this->checkout_message = 'Error: product'. $cartProduct->product->name.' not found in stock';
            }
        }
        try {   

        DB::transaction(function () use ($cart) {

            //Create order

         $order = Order::create([
            'user_id'=> auth()->id(),
            'total_price'=> 0,

         ]);

         //Assign products to the order

         foreach($cart as $cartProduct) {
            $order->products()->attach($cartProduct->product_id,[
                'quantity' => $cartProduct->qty,
                'price'=> $cartProduct->product->selling_price,
            ]);
 
            $order->increment('total_price', $cartProduct->product->selling_price);

            //Decrease quntities of the products
            Product::find($cartProduct->product_id)->decrement('quantity',$cartProduct->qty);
         }

          
        //Empty cart

        Cart::where('user_id', auth()->id())->delete();

        $this->checkout_message = 'Success';


        });
    } catch (\Exception $e) {

        $this->checkout_message = 'Error happend try later';

    }
        
    }

}