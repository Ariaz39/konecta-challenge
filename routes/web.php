<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/edit/{category_id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/update/{category_id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/delete/{category_id}', [CategoryController::class, 'destroy'])->name('category.delete');
});


require __DIR__ . '/auth.php';
