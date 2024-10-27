<?php

use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductsApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

    Route::get('/admin/dashboard',[DashboardController::class,'index'])->name('DashboardAdmin');
    Route::controller(ProductsApiController::class)->group(function() {
        Route::get('/admin/products/index','index')->name('IndexProducts');
        Route::get('/admin/products/create','create')->name('CreateProduct');
        Route::post('/admin/products/store','store')->name('StoreProduct');
        Route::get('/admin/products/edit/{id}','edit')->name('EditProduct');
        Route::put('/admin/products/update/{id}','update')->name('UpdateProduct');
        Route::get('/admin/products/delete/{id}','destroy')->name('DeleteProduct');
        Route::get('/admin/products/show/{id}','show')->name('ShowProduct');
    });
    Route::middleware('AuthApiToken')->group(function(){
        Route::controller(ProductsApiController::class)->group(function() {
            Route::get('/user/products/index','index')->name('IndexProducts');
            Route::get('/user/products/create','create')->name('CreateProduct');
            Route::post('/user/products/store','store')->name('StoreProduct');
            Route::get('/user/products/edit/{id}','edit')->name('EditProduct');
            Route::put('/user/products/update/{id}','update')->name('UpdateProduct');
            Route::get('/user/products/delete/{id}','destroy')->name('DeleteProduct');
            Route::get('/user/products/show/{id}','show')->name('ShowProduct');
        });
    });
    Route::controller(AuthApiController::class)->group(function(){
       Route::post('/admin/register','register');
       Route::get('/admin/login','login');
   });