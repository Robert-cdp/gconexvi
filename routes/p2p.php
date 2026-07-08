<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductController;

/*
|--------------------------------------------------------------------------
| Marketplace
|--------------------------------------------------------------------------
*/

// Protegidas
Route::middleware('auth')->group(function () {
    Route::get('marketplace/create', [ProductController::class, 'create'])->name('marketplace.create');
    Route::post('marketplace', [ProductController::class, 'store'])->name('marketplace.store');

    Route::get('marketplace/{product}/edit', [ProductController::class, 'edit'])->name('marketplace.edit');
    Route::put('marketplace/{product}', [ProductController::class, 'update'])->name('marketplace.update');
    Route::delete('marketplace/{product}', [ProductController::class, 'destroy'])->name('marketplace.destroy');
});

// Públicas
Route::get('marketplace', [ProductController::class, 'index'])->name('marketplace.index');
Route::get('marketplace/{product}', [ProductController::class, 'show'])->name('marketplace.show');
