<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/shop', function () {
    return view('pages.products.home');
});

Route::prefix('products')->group(function () {
    Route::get('/', [ProductsController::class, 'show'])->name('products.show');
    Route::post('/add/{id}', [ProductsController::class, 'addToCart'])->name('products.addToCart');
    Route::get('/cart', [ProductsController::class, 'showCart'])->name('products.showCart');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'show'])->name('admin.show');
    Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/create', [AdminController::class, 'store'])->name('admin.store');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
