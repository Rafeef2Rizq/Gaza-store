<?php

use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\{CategoryController, AdminController, ProductController};
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::prefix(LaravelLocalization::setLocale())->middleware(['auth', 'isAdmin', 'verified'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
        Route::put('/profile_data', [AdminController::class, 'profile_data'])->name('profile_data');
        Route::post('/check-password', [AdminController::class, 'check_password'])->name('check_password');
        Route::get('delete-image/{id?}', [ProductController::class, 'delete_image'])->name('delete_image');
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
        Route::get('/orders', [AdminController::class, 'order'])->name('orders');
        Route::get('/notifications', [AdminController::class, 'notification'])->name('notifications');



    });
});

