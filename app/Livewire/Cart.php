<?php

namespace App\Livewire;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class Cart extends Component
{   
    
    
    public $cartItems;
    public $productId;
    public $quantity = 1;

    public function mount()
    {
        $this->cartItems = CartItem::with('product')->get();
    }

    public function addToCart()
    {
        $this->validate([
            'productId' => 'required|exists:products,id',
            'quantity' => 'required|numeric|min:1',
        ]);

        CartItem::create([
            'product_id' => $this->productId,
            'quantity' => $this->quantity,
        ]);

        $this->reset(['productId', 'quantity']);
        $this->cartItems = CartItem::with('product')->get();
    }

    public function removeFromCart($cartItemId)
    {
        CartItem::find($cartItemId)->delete();
        $this->cartItems = CartItem::with('product')->get();
    }

   
    public function checkout()
    {
        // foreach ($this->cartItems as $cartItem) {
        //     // Crée une facture pour chaque article du panier
        //     $invoice = $cartItem->convertToInvoice();
        // }

        // // Rafraîchit les articles du panier
        // $this->cartItems = CartItem::with('product')->get();

        // // Redirige vers la page de détails de la dernière facture créée
        // if (isset($invoice)) {
        //     return redirect()->route('invoice.show', $invoice->id)->with('success', 'Produit créée avec succès');
        // }
        foreach ($this->cartItems as $cartItem) {
            // Crée une facture pour chaque article du panier
            $invoice = $cartItem->convertToInvoice();
        }
    
        // Rafraîchit les articles du panier
        $this->cartItems = CartItem::with('product')->get();
    
        // Déclenche l'événement de redirection côté client
        if (isset($invoice)) {
            $this->dispatchBrowserEvent('redirect', ['route' => 'invoice.show', 'params' => ['id' => $invoice->id]]);
            session()->flash('success', 'Produit créée avec succès');
        }
    }

    public function render()
    {
        $products = Product::all();
        return view('livewire.cart', compact('products'));
    }
    
}