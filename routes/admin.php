<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\RoleController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Categories\CategoryController;

Route::prefix('conexvi')
    ->middleware(['auth', 'role:Administrador'])
    ->group(function () {

        Route::get('dashboard', [DashboardController::class, 'index'])
            ->name('admin.dashboard');

        Route::resource('users', UserController::class);

        Route::resource('categories', CategoryController::class);

        Route::resource('roles', RoleController::class);
    });
