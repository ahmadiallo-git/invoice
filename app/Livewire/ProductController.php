<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductController extends Component
{
    public $products;
    public $productId;
    public $name;
    public $brand;
    public $description;
    public $unitPrice;
    public $sellingPrice;
    public $quantity;
    public $trending;
    public $status;

    public function render()
    {
        $this->products = Product::all();
        return view('livewire.product-controller.index');
    }

    public function create()
    {
        return view('livewire.product-controller.create');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $this->productId = $product->id;
        $this->name = $product->name;
        $this->brand = $product->brand;
        $this->description = $product->description;
        $this->unitPrice = $product->unit_price;
        $this->sellingPrice = $product->selling_price;
        $this->quantity = $product->quantity;
        $this->trending = $product->trending;
        $this->status = $product->status;

        return view('livewire.product-controller.edit');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'brand' => 'nullable',
            'description' => 'nullable',
            'unitPrice' => 'required',
            'sellingPrice' => 'required',
            'quantity' => 'required|integer|min:0',
            'trending' => 'boolean',
            'status' => 'boolean',
        ]);

        Product::create($validatedData);

        $this->resetForm();
        $this->emit('productStored');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'brand' => 'nullable',
            'description' => 'nullable',
            'unitPrice' => 'required',
            'sellingPrice' => 'required',
            'quantity' => 'required|integer|min:0',
            'trending' => 'boolean',
            'status' => 'boolean',
        ]);

        $product = Product::find($this->productId);
        $product->update($validatedData);

        $this->resetForm();
        $this->emit('productUpdated');
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
        $this->emit('productDeleted');
    }

    private function resetForm()
    {
        $this->productId = null;
        $this->name = '';
        $this->brand = '';
        $this->description = '';
        $this->unitPrice = '';
        $this->sellingPrice = '';
        $this->quantity = '';
        $this->trending = '';
        $this->status = '';
    }
}