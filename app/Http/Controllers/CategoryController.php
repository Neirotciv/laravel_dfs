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

    public function get(int $id)
    {
        $category = Category::find($id);
        dd($category->product);
    }
}
