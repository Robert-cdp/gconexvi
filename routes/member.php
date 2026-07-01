<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\UserSettingsController;

Route::prefix('member')->group(function () {

    // Perfil público
    Route::get('{slug}', [ProfileController::class, 'index'])
        ->name('user.profile');

    // SOLO USUARIO AUTENTICADO (MI CUENTA)
    Route::middleware('auth')->prefix('settings')->group(function () {

        Route::get('general', [UserSettingsController::class, 'index'])
            ->name('user.settings.general');

        Route::put('general', [UserSettingsController::class, 'update'])
            ->name('user.settings.general.update');

        Route::get('password', [UserSettingsController::class, 'password'])
            ->name('user.settings.password');

        Route::put('password', [UserSettingsController::class, 'updatePassword'])
            ->name('user.settings.password.update');

        Route::get('avatar', [UserSettingsController::class, 'avatar'])
            ->name('user.settings.avatar');

        Route::put('avatar', [UserSettingsController::class, 'updateAvatar'])
            ->name('user.settings.avatar.update');

        Route::get('bio', [UserSettingsController::class, 'bio'])
            ->name('user.settings.bio');

        Route::put('bio', [UserSettingsController::class, 'updateBio'])
            ->name('user.settings.bio.update');
    });
});