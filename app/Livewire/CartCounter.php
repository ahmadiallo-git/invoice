<?php

namespace App\Livewire;

use App\Models\Cart;
use Livewire\Component;

class CartCounter extends Component
{
    protected $listeners = ["cart_updated"=> "render"];
    
    public function render()
    {
       $cart_count = Cart::content()->count();

        return view('livewire.cart-counter', ['cartAmount' => Cart::sum('qty')]);
    }
}