<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;

class Order extends Component
{
    public $orders, $products = [], $product_name, $message = '', $productInCart;


    public function mount(){

        $this->products = Product::all(); 
        $this->productInCart = Cart::all();
   
    }
    public function InsertToCart(){
          $countProduct = Product::where("name", $this->product_name)->first();
          if(!$countProduct){

            return $this->message ="Product Not Found";
          }
          $countProduct = Cart::where('product_name', $this->product_name)->count();

          if($countProduct > 0){
             return $this->message = $countProduct->product_name. 'Product already exist in cart please add quantity';
          }
          $add_to_cart = new Cart();
          $add_to_cart->product_name = $countProduct->name;
          $add_to_cart->product_qty = $countProduct->quantity;
          $add_to_cart->product_price = $countProduct->price;
          $add_to_cart->user_id = auth()->user()->id;
          $add_to_cart->save();

          $this->product_name = '';
          return $this->message = 'Product added successfully';


          dd($countProduct);

        }
    public function render()
    {
        return view('livewire.order');
    }
}