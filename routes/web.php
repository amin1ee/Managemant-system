<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReorderRequestController;
use App\Http\Controllers\SupplierController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('dashboard');
    });

    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('suppliers', SupplierController::class);
    Route::post('/reorders/{id}/pdf', [ReorderRequestController::class, 'generatePdf'])->name('reorders.pdf');
    Route::resource('reorders', ReorderRequestController::class);
    Route::get('/notifications',[NotificationsController::class,'index'])->name('notifications.index');
    Route::delete('/notifications/{id}', [NotificationsController::class, 'destroy'])->name('notifications.destroy');

    Route::post('/logout', [AuthController::class, 'logout'])->name("logout");
    

});

Route::get('/login', [AuthController::class, 'index'])->name("login");
Route::post('/login', [AuthController::class, 'store'])->name("login.store");
