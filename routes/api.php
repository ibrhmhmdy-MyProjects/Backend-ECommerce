<?php

use App\Http\Controllers\ProductsApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::middleware(['auth','isAdmin'])->group(function(){
    // Route::get('/admin/dashboard',[DashboardController::class,'index'])->name('DashboardAdmin');
    Route::controller(ProductsApiController::class)->group(function() {
        Route::get('/admin/products/index','index')->name('IndexProducts');
        Route::get('/admin/products/create','create')->name('CreateProduct');
        Route::post('/admin/products/store','store')->name('StoreProduct');
        Route::get('/admin/products/edit/{id}','edit')->name('EditProduct');
        Route::put('/admin/products/update/{id}','update')->name('UpdateProduct');
        Route::get('/admin/products/delete/{id}','destroy')->name('DeleteProduct');
        Route::get('/admin/products/show/{id}','show')->name('ShowProduct');
    });
// });