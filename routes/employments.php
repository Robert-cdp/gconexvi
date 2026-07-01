<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employment\EmploymentController;

/*
|--------------------------------------------------------------------------
| Employments
|--------------------------------------------------------------------------
*/

// Protegidas
Route::middleware('auth')->group(function () {
    Route::get('employments/create', [EmploymentController::class, 'create'])->name('employments.create');
    Route::post('employments', [EmploymentController::class, 'store'])->name('employments.store');

    Route::get('employments/{employment}/edit', [EmploymentController::class, 'edit'])->name('employments.edit');
    Route::put('employments/{employment}', [EmploymentController::class, 'update'])->name('employments.update');
    Route::delete('employments/{employment}', [EmploymentController::class, 'destroy'])->name('employments.destroy');
});

// Públicas
Route::get('employments', [EmploymentController::class, 'index'])->name('employments.index');
Route::get('employments/{employment}', [EmploymentController::class, 'show'])->name('employments.show');