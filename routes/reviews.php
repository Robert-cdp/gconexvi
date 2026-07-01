<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Reviews\ReviewController;

Route::get('services/{service}/reviews/create', [ReviewController::class, 'create'])
    ->name('services.reviews.create');

Route::post('services/{service}/reviews', [ReviewController::class, 'store'])
    ->name('services.reviews.store');