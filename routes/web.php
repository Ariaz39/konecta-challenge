<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->prefix('category')->group(function () {
    Route::get('/index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/edit/{category_id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/update/{category_id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/delete/{category_id}', [CategoryController::class, 'destroy'])->name('category.delete');
});

Route::middleware(['auth'])->prefix('product')->group(function () {
    Route::get('/index', [ProductController::class, 'index'])->name('product.index');
    Route::get('/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/edit/{product_id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/update/{product_id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/delete/{product_id}', [ProductController::class, 'destroy'])->name('product.delete');
});

Route::middleware(['auth'])->prefix('sale')->group(function () {
    Route::get('/', [SaleController::class, 'index'])->name('sale.index');
    Route::post('/sell', [SaleController::class, 'sell'])->name('sale.sell');
});

require __DIR__ . '/auth.php';
