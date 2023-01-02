<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgottenPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RetrievePasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', [LoginController::class, 'index'])->name('login');
Route::post('/admin', [LoginController::class, 'login']);

Route::get('/admin/forgot-my-password', [ForgottenPasswordController::class, 'index']);
Route::post('/admin/forgot-my-password', [ForgottenPasswordController::class, 'send_email']);

Route::get('/admin/retrieve-password/{token}', [RetrievePasswordController::class, 'index']);
Route::post('/admin/retrieve-password/{token}', [RetrievePasswordController::class, 'update_password']);

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {
    Route::get('logout', [LoginController::class, 'logout']);
    
    Route::get('dashboard', [DashboardController::class, 'index']);
});