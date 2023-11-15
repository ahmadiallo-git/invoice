<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public function render()
    {
        $categories = Category::orderBy("id","ASC")->paginate(5);
        return view('livewire.category.index', compact('categories'));
    }
}