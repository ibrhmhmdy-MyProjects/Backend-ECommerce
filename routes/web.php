<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
// Route::UserSide
Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Route::AdminSide
Route::get('/admin/dashboard',[DashboardController::class,'index'])->name('DashboardAdmin');
Route::get('/admin/products/index',[ProductsController::class,'index'])->name('IndexProducts');
Route::get('/admin/products/create',[ProductsController::class,'create'])->name('CreateProduct');
Route::post('/admin/products/store',[ProductsController::class,'store'])->name('StoreProduct');
Route::get('/admin/products/edit/{id}',[ProductsController::class,'edit'])->name('EditProduct');
Route::put('/admin/products/update/{id}',[ProductsController::class,'update'])->name('UpdateProduct');
Route::get('/admin/products/delete/{id}',[ProductsController::class,'destroy'])->name('DeleteProduct');
Route::get('/admin/products/show/{id}',[ProductsController::class,'show'])->name('ShowProduct');
