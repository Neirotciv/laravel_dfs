<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * The Show method retrieves a specific category based on the provided id,
     * retrieves all products associated with that category,
     * and all categories to provide them to the view.
     *
     * @param int $id The id of the category to retrieve.
     * @throws ModelNotFoundException If no category with the provided id exists.
     * @return View A view that contains the specific category, its associated products and all categories.
     */
    public function show(int $id): View
    {
        $category = Category::findOrFail($id);
        $categories = Category::all();
        $products = $category->products()->get();
        
        return view('product.products', [
            'products' => $products,
            'categories' => $categories
        ]);
    }
}
