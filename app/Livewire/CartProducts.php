<?php

namespace App\Livewire;

use Aimeos\MShop\Service\Provider\Decorator\Country;
use App\Models\Cart;
use Livewire\Component;

class CartProducts extends Component
{
    public $taxTotal;
    public $taxRate;
    public $shipping;
    public $totalWithoutTax;
    public $totalWithTax;
    public $taxValue;
    public $selectedCountry;
    public $countries;
    // protected $listeners = ["updateCart" => "render", "decreaseQuantity" => "decreaseQuantity"];
    protected $listeners = ['updateCart' => 'render'];



    public function render()
    {
        $cartItems = Cart::with("product")->get()
                    ->map( function (Cart $items){
                        return (object) [
                            
                            "id"=> $items->product_id,
                            "name"=> $items->product->name,
                            "price"=> $items->product->selling_price,
                            "qty"=> $items->qty,
                            "total"=> ($items->qty * $items->product->selling_price),
                        ];
                    });
        return view('livewire.cart-products', compact('cartItems'));
    }

   

    public function increaseQuantity($id)
    {
        $this->emit('increaseQuantity', $id);
    }

    public function decreaseQuantity($id, $qty)
    {
        if ($qty != 1) {
            Cart::where('product_id', $id)->update(['qty' => $qty - 1]);
        } else {
            Cart::where('product_id', $id)->delete();
        }

        $this->emit('updateCart');
    }
    
}