<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Chat\MessageController;
use App\Http\Controllers\Chat\ConversationController;

Route::middleware('auth')->group(function () {

    Route::get('/chat', [ConversationController::class, 'index'])
        ->name('chat.index');

    Route::post('/chat/conversations', [ConversationController::class, 'store'])
        ->name('chat.conversations.store');

    Route::get('/chat/conversations/{conversation}', [ConversationController::class, 'show'])
        ->name('chat.conversations.show');

    Route::post('/chat/conversations/{conversation}/messages', [MessageController::class, 'store'])
        ->name('chat.messages.store');
});
