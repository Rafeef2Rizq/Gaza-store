<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\{CategoryController, AdminController};
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::prefix(LaravelLocalization::setLocale())->middleware(['auth', 'isAdmin', 'verified'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::resource('categories', CategoryController::class);
    });
});

