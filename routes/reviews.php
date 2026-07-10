<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Reviews\ReviewController;

Route::middleware('auth')->group(function () {

    Route::get('reviews/create/{type}/{id}', [ReviewController::class, 'create'])
        ->name('reviews.create');

    Route::post('reviews', [ReviewController::class, 'store'])
        ->name('reviews.store');

});