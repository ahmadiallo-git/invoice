<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
   
    public  $products;
    // protected $listeners = ["updateCart" => "render"];
    protected $listeners = ['updateCart' => 'render'];
    public function mount()
    {
        $this->products = Product::all();

        
    }
    
    public function render()
    {
        return view('livewire.products');
    }

   
    public function addToCart($productId)
{
    $user_id = auth()->user()->id; // Obtenez l'ID de l'utilisateur actuellement authentifié

    $cart = Cart::where('product_id', $productId)->first();

    if (!$cart) {
        Cart::create(['product_id' => $productId, 'qty' => 1, 'user_id' => $user_id]);
    } else {
        $cart->update(['qty' => $cart->qty + 1]);
    }

    $this->emit('updateCart');
}

}