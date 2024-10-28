<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
/********** Route::UserSide **********/
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [ShopController::class,'index'])->name('UserIndex');
Route::get('/product/details/{id}', [ShopController::class,'ProductDetails'])->name('ProductDetails');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('users/index',[ProductsController::class,'index'])->name('indexUser');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

/********** Route::AdminSide **********/
Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/admin/dashboard',[DashboardController::class,'index'])->name('DashboardAdmin');
    Route::controller(ProductsController::class)->group(function() {
        Route::get('/admin/products/index','index')->name('IndexProducts');
        Route::get('/admin/products/create','create')->name('CreateProduct');
        Route::post('/admin/products/store','store')->name('StoreProduct');
        Route::get('/admin/products/edit/{id}','edit')->name('EditProduct');
        Route::put('/admin/products/update/{id}','update')->name('UpdateProduct');
        Route::get('/admin/products/delete/{id}','destroy')->name('DeleteProduct');
        Route::get('/admin/products/show/{id}','show')->name('ShowProduct');
    });
});
