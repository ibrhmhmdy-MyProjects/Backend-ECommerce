<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
/********** Route::UserSide **********/
Route::controller(HomeController::class)->group(function(){
    Route::get('/','index')->name('Home');
    Route::get('/single-product/{id}','SingleProduct')->name('SingleProduct');
});
Route::controller(CartController::class)->group(function(){
    Route::get('add-to-cart/{id}','addToCart')->name('addToCart');
    Route::get('shopping-cart','index')->name('ShoppingCart');
    Route::get('empty-cart','emptyCart')->name('EmptyCart');
    Route::get('update-quantity/{id}/{action}','updateQuantity')->name('UpdateQuantity');
    Route::get('remove-product/{id}','RemoveProduct')->name('RemoveProduct');
});
Route::controller(OrderController::class)->group(function(){
    Route::post('make-order','MakeOrder')->name('MakeOrder');
});


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('admin/index', function () {
        return view('admin.index');
    });
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
