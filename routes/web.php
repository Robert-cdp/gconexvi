<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Categories\CategoryController;
use App\Http\Controllers\Employment\EmploymentController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Services\ServiceController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\RoleController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserSettingsController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('index');

Route::resource('services', ServiceController::class);

Route::resource('jobs', EmploymentController::class);

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
    });
});

Route::prefix('conexvi')->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('users', UserController::class);

    Route::resource('categories', CategoryController::class);

    Route::resource('roles', RoleController::class);
});
