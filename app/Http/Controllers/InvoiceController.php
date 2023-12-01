<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(){

        return view("invoices.index");
    }

    public function cart()
    {
        $products = Product::all();
        $cartItems = CartItem::with('product')->get();

        return view('invoices.cart', compact('products', 'cartItems'));
    }

    public function show(Invoice $invoice)
    {
        // Assure-toi d'ajuster cela en fonction de la logique spécifique
        return view('invoices.show', compact('invoice'));
    }
}