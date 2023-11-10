<?php

namespace App\Livewire;

use Livewire\Component;class InvoiceItems extends Component
{
    public $products = [];
    public $quantities = [];
    public $discount = 0;
    public $newProduct = [
        'name' => '',
        'price' => 0,
    ];

    public function render()
    {
        // Calcul du total ici
        $subtotal = 0;
        foreach ($this->products as $key => $product) {
            $price = $product['price'];
            $quantity = $this->quantities[$key] ?? 1; // Quantité par défaut est 1
            $subtotal += $price * $quantity;
        }
        $total = $subtotal - $this->discount;

        return view('livewire.invoice-items', [
            'total' => $total,
        ]);
    }

    // public function addProduct($product)
    // {
    //     $this->products[] = $product;
    //     $this->quantities[] = 1; // Quantité initiale est 1
    // }

    public function addProduct()
    {
        $this->products[] = [
            'name' => $this->newProduct['name'],
            'price' => $this->newProduct['price'],
        ];
        $this->quantities[] = 1; // Initial quantity is 1
        $this->calculateTotal();
        // Réinitialisez le nouveau produit
        $this->newProduct = [
            'name' => '',
            'price' => 0,
        ];
    }

    public function removeProduct($index)
    {
        unset($this->products[$index]);
        unset($this->quantities[$index]);
        $this->products = array_values($this->products);
        $this->quantities = array_values($this->quantities);
    }
}