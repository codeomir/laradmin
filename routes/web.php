<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', [LoginController::class, 'index'])->name('login');
Route::post('/admin', [LoginController::class, 'login']);

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {
    Route::get('logout', [LoginController::class, 'logout']);
    
    Route::get('dashboard', [DashboardController::class, 'index']);
});