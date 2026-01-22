<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('dashboard');
    });

    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);

    Route::resource('suppliers', SupplierController::class);



    Route::post('/logout', [AuthController::class, 'logout'])->name("logout");
});

Route::get('/login', [AuthController::class, 'index'])->name("login");
Route::post('/login', [AuthController::class, 'store'])->name("login.store");
