<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

    return view('welcome', [
        'products' => $products
    ]);
});

Route::prefix('categories')->name('categories')->group(function () {
    Route::get('/', 'App\Http\Controllers\CategoryController@getAll');
    
    Route::get('/{id}', [CategoryController::class, 'get']);
});