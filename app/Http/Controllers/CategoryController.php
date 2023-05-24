<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getAll()
    {
        $categories = Category::all();
        return view('category.categories', ['categories' => $categories]);
    }

    public function getById(int $id)
    {
        $category = Category::findOrFail($id);
        dd($category->product);
    }
}
