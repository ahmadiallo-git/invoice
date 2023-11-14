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
        return redirect()->route('category.index')->with('success', 'Catégorie créée avec succès');
    }

    public function createTest() {
        return view('category.create-test');
    }
    
}