<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Forum\ReplyController;
use App\Http\Controllers\Forum\TopicController;

/*
|--------------------------------------------------------------------------
| Community
|--------------------------------------------------------------------------
*/

// Protegidas
Route::middleware('auth')->group(function () {
    Route::get('community/create', [TopicController::class, 'create'])->name('community.create');
    Route::post('community', [TopicController::class, 'store'])->name('community.store');

    Route::get('community/{community}/edit', [TopicController::class, 'edit'])->name('community.edit');
    Route::put('community/{community}', [TopicController::class, 'update'])->name('community.update');
    Route::delete('community/{community}', [TopicController::class, 'destroy'])->name('community.destroy');

    Route::post('community/{forum:slug}/reply', [ReplyController::class, 'store'])->name('reply.store');
});

// Públicas
Route::get('community/{category:slug?}', [TopicController::class, 'index'])
    ->name('community.index');

Route::get('community/topic/{community:slug}', [TopicController::class, 'show'])
    ->name('community.show');