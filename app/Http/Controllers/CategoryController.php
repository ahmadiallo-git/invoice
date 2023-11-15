<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view("category.index", compact("categories"));
    }
    
    public function create() {  
        return view("category.create");
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
        ]);
        Category::create($request->all());
       
        return redirect()->route('category.index')->with('success', 'Catégorie créée avec succès');
    }

    public function cancel()
    {
        return redirect()->back();
    }
    
    public function edit($id)
{
    // Logique d'édition à ajouter ici
    // Par exemple, récupérez la catégorie avec l'id donné
    $category = Category::findOrFail($id);

    // Passez la catégorie à la vue d'édition
    return view('category.edit', compact('category'));
}
public function destroy(Category $category)
{
    $category->delete();
    
    return redirect()->route('category.index')->with('success', 'Catégorie supprimée avec succès');
}
public function update(Request $request, Category $category)
{
    $this->validate($request, [
        'name' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:categories,slug,' . $category->id,
        // Ajoutez d'autres règles de validation au besoin
    ]);

    $category->update($request->all());

    return redirect()->route('category.index')->with('success', 'Catégorie mise à jour avec succès');
}

}