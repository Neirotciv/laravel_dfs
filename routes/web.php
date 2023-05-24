<?php

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $products = Product::all();
    $categories = Category::all();

    return view('product.products', [
        'products' => $products,
        'categories' => $categories
    ]);
});

Route::prefix('/categories')->middleware('auth')->controller(CategoryController::class)->name('categories')->group(function () {
    Route::get('/', 'getAll');
    Route::get('/{id}', 'getById');
});

Route::get('/register', [RegisterController::class, 'create'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::post('/login', [AuthController::class, 'login'])->name('login');