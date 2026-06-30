<?php

use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Categories\CategoryController;
use App\Http\Controllers\Employment\EmploymentController;
use App\Http\Controllers\Forum\ReplyController;
use App\Http\Controllers\Forum\TopicController;
use App\Http\Controllers\Services\ServiceController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\RoleController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserSettingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');

/*
|--------------------------------------------------------------------------
| Community
|--------------------------------------------------------------------------
*/

// Públicas
Route::get('community', [TopicController::class, 'index'])->name('community.index');
Route::get('community/{community}', [TopicController::class, 'show'])->name('community.show');

// Protegidas
Route::middleware('auth')->group(function () {
    Route::get('community/create', [TopicController::class, 'create'])->name('community.create');
    Route::post('community', [TopicController::class, 'store'])->name('community.store');

    Route::get('community/{community}/edit', [TopicController::class, 'edit'])->name('community.edit');
    Route::put('community/{community}', [TopicController::class, 'update'])->name('community.update');
    Route::delete('community/{community}', [TopicController::class, 'destroy'])->name('community.destroy');

    Route::post('community/{forum:slug}/reply', [ReplyController::class, 'store'])->name('reply.store');
});

/*
|--------------------------------------------------------------------------
| Services
|--------------------------------------------------------------------------
*/

// Públicas
Route::get('services', [ServiceController::class, 'index'])->name('services.index');
Route::get('services/{service}', [ServiceController::class, 'show'])->name('services.show');

// Protegidas
Route::middleware('auth')->group(function () {
    Route::get('services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('services', [ServiceController::class, 'store'])->name('services.store');

    Route::get('services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('services/{service}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
});

/*
|--------------------------------------------------------------------------
| Employments
|--------------------------------------------------------------------------
*/

// Públicas
Route::get('employments', [EmploymentController::class, 'index'])->name('employments.index');
Route::get('employments/{employment}', [EmploymentController::class, 'show'])->name('employments.show');

// Protegidas
Route::middleware('auth')->group(function () {
    Route::get('employments/create', [EmploymentController::class, 'create'])->name('employments.create');
    Route::post('employments', [EmploymentController::class, 'store'])->name('employments.store');

    Route::get('employments/{employment}/edit', [EmploymentController::class, 'edit'])->name('employments.edit');
    Route::put('employments/{employment}', [EmploymentController::class, 'update'])->name('employments.update');
    Route::delete('employments/{employment}', [EmploymentController::class, 'destroy'])->name('employments.destroy');
});


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

Route::prefix('conexvi')->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('users', UserController::class);

    Route::resource('categories', CategoryController::class);

    Route::resource('roles', RoleController::class);
});
