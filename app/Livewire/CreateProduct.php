<?php

namespace App\Livewire;

use App\Models\Products;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CreateProduct extends Component
{
    public $name;
    public $slug;
    public $brand;
    public $description;
    public $unit_price;
    public $selling_price;
    public $quantity;
    public $trending = false;
    public $status = false; 
    
public function store(Products $products){
    $this->validate([
        'name' => 'required|string|max:255',
        'slug' => 'string',
        'brand' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'unit_price' => 'required|numeric',
        'selling_price' => 'required|numeric',
        'quantity' => 'required|integer',
        'trending' => 'boolean',
        'status' => 'boolean',
    ]);
    
    $products->name = $this->name;
    $products->slug = $this->slug;
    $products->brand = $this->brand;
    $products->description = $this->description;
    $products->unit_price = $this->unit_price;
    $products->selling_price = $this->selling_price;
    $products->quantity = $this->quantity;
    $products->trending = $this->trending;
    $products->status = $this->status;
    $products->save();

    return redirect()->back()->with('success', 'Produit bien enregistre');
    if($products){
        $this->reset([
            'name', 'slug', 'brand', 'description',
            'unit_price', 'selling_price', 'quantity',
            'trending', 'status'
        ]);
    }
}

    public function render()
    {
        return view('livewire.create-product');
    }
}