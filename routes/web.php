<?php

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GithubController;
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

Route::prefix('/categories')->controller(CategoryController::class)->name('categories')->group(function () {
    Route::get('/', 'getAll');
    Route::get('/{id}', 'getById');
});

Route::prefix('/register')->controller(RegisterController::class)->name('register')->group(function () {
    Route::get('/', 'create')->middleware('guest');
    Route::post('/', 'store');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/redirect', [AuthController::class, 'redirectToProvider'])->name('redirect')->middleware('guest');
Route::get('/callback', [AuthController::class, 'handleProviderCallback']);

Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard.index');
    })->name('dashboard');
});

Route::get('/order/add/{id}', [OrderController::class, 'addItem'])->middleware('auth');

Route::prefix('/github')->name('github.')->controller(GithubController::class)->group(function () {
    Route::get('/redirect', 'redirectToProvider')->name('register')->middleware('guest');
    Route::get('/callback', 'handleProviderCallback');
});
