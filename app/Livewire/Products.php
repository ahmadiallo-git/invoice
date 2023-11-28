<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
    public  $products;
    public function mount()
    {
        $this->products = Product::all();

        
    }
    public function render()
    {
        return view('livewire.products');
    }

    public function addToCart($productId){

        $cart = Cart::where('product_id', $productId)->first();

        if(!$cart){
            Cart::create(['product_id' => $productId, 'qty' => 1]);
        }else{
            $cart->updated(['qty' => $cart->qty + 1]);
        }

        $this->emit('updatedCart');

    }
}