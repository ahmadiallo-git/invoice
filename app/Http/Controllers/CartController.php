<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request){

        // $product = Product::findOrfail($request->input("product_id"));
        // Cart::add(
        //     $product->id, 
        //     $product->name, 
        //     $request->input('quantity'),
        //     $product->selling_price
        // );

        // return back()->with('success','Product added successfully');
    }
}