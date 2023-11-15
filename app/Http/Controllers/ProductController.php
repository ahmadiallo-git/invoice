<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function index() {
      $products = Product::all();
      return view("products.index", compact("products"));
  }
  
  public function create() {  
      return view("products.create");
  }

  public function store(Request $request) {
      $this->validate($request, [
          'name' => 'required|string|max:255',
          'slug' => 'required|string|max:255|unique:products,slug',
          'description'=> 'required|string|max:255',
          'unit_price'=> 'required',
          'selling_price'=> 'required',
          'quantity' => 'required|integer',
      ]);
      Product::create($request->all());
     
      return redirect()->route('products.index')->with('success', 'Produit créée avec succès');
  }

  public function cancel()
  {
      return redirect()->back();
  }
  
  public function edit($id)
{
  // Logique d'édition à ajouter ici
  // Par exemple, récupérez la Produit avec l'id donné
  $Product = Product::findOrFail($id);

  // Passez la Produit à la vue d'édition
  return view('product.edit', compact('Product'));
}
public function destroy(Product $Product)
{
  $Product->delete();
  
  return redirect()->route('products.index')->with('success', 'Produit supprimée avec succès');
}
public function update(Request $request, Product $Product)
{
  $this->validate($request, [
      'name' => 'required|string|max:255',
      'slug' => 'required|string|max:255|unique:products,slug,' . $Product->id,
      // Ajoutez d'autres règles de validation au besoin
  ]);

  $Product->update($request->all());

  return redirect()->route('products.index')->with('success', 'Produit mise à jour avec succès');
}
}