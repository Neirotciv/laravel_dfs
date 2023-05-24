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

Route::prefix('/categories')->controller(CategoryController::class)->name('categories')->middleware('auth')->group(function () {
    Route::get('/', 'getAll');
    Route::get('/{id}', 'getById');
});

Route::prefix('/register')->controller(RegisterController::class)->name('register')->group(function () {
    Route::get('/', 'create')->middleware('guest');
    Route::post('/', 'store');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::get('/', function () { return view('dashboard.index'); })->name('dashboard');
});