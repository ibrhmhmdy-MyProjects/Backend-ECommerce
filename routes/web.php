<?php

use App\Http\Controllers\DashboardController;
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
Route::get('/admin/dashboard',[DashboardController::class,'index'])->name('adminDashboard');
