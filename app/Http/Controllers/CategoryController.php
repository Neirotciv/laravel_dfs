<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class CategoryController extends Controller
{

    public function getAll(): View
    {
        $categories = Category::all();
        return view('category.categories', ['categories' => $categories]);
    }

    public function getById(int $id)
    {
        $category = Category::find($id);
        $categories = Category::all();
        $products = $category->products()->get();
        
        return view('product.products', [
            'products' => $products,
            'categories' => $categories
        ]);
    }
}
