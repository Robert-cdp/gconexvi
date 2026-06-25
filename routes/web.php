<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Categories\CategoryController;
use App\Http\Controllers\Employment\EmploymentController;
use App\Http\Controllers\Services\ServiceController;
use App\Http\Controllers\User\RoleController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('conexvi')->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('users', UserController::class);

    Route::resource('categories', CategoryController::class);

    Route::resource('roles', RoleController::class);

});


Route::get('/', function () {
    return view('home.index');
})->name('index');

Route::resource('services', ServiceController::class);

Route::resource('jobs', EmploymentController::class);