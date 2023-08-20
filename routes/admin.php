<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/admin',function() {
    return ['message'=>'success'];
});
Route::get(
    '/admin/dashboard', 
    [
        DashboardController::class,
        'index'
    ]
)->name('adminHome');
Route::get(
    'admin', 
    [
        DashboardController::class, 
        'redirectAdminPath'
    ]
);
Route::get(
    '/admin/login', 
    [LoginController::class, 'index']
)->name('adminLogin');
Route::post(
    'admin/login', 
    [LoginController::class, 'create']
)->name('adminLoginCreate');
Route::get(
    'admin/resetpassword', 
    [
        ResetPasswordController::class,
        'index'
    ]
)->name('resetAdminPassword');