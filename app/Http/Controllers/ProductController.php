<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function index() {
    
     
      return view("products.index");
  }
  
  public function create() {  
      $categories = Category::all();
      return view("products.create", compact("categories"));
  }

  public function store(Request $request) {
    $product = Product::all();
      $this->validate($request, [
      'category_id' => 'required|integer',
      'name' => 'required|string|max:255',    
      'slug' => 'required|string|max:255|unique:products,slug',
      'description'=> 'required|string',
      'unit_price' => 'required|integer',
      'selling_price' => 'required|integer',
      'quantity'=> 'required|integer',
      'status' => 'required|integer',
      'image'=> 'nullable',
      ]);

      if ($request->hasFile('image')) {
        $uploadsPath = 'uploads/products/';
        foreach( $request->file('image') as $imageFile ) {
          $extension = $imageFile->getClientOriginalExtension();
          $fileName = time().'.'.$extension;
         $imageFile->move($uploadsPath, $fileName);
          $fileImagePath = $uploadsPath . $fileName;
                     
          // $product->productImages()->create([
          //   'product_id' => $request->product_id,
          //   'image' => $fileImagePath,
          // ]);
        }
       
      }
      Product::create($request->all());
     
      return redirect()->route('product.index')->with('success', 'Produit créée avec succès');
  }

  public function cancel()
  {
      return redirect()->back();
  }
  
  public function edit($id)
{
  // Logique d'édition à ajouter ici
  // Par exemple, récupérez la Produit avec l'id donné
  $product = Product::findOrFail($id);
  $categories = Category::all();

  // Passez la Produit à la vue d'édition
  return view('products.edit', compact('product', 'categories'));
}
public function destroy(Product $product)
{
  $product->delete();
  
  return redirect()->route('product.index')->with('success', 'Produit supprimée avec succès');
}
public function update(Request $request, Product $product)
{
  $this->validate($request, [
      'category_id'=> 'category_id',
      'name' => 'required|string|max:255',
      'slug' => 'required|string|max:255|unique:products,slug,' . $product->id,
      'description'=> 'required|string',
      'unit_price' => 'required|integer',
      'selling_price' => 'required|integer',
      'quantity'=> 'required|integer',
      'status' => 'required|integer',
    ]);

  $product->update($request->all());

  return redirect()->route('product.index')->with('success', 'Produit mise à jour avec succès');
}
}