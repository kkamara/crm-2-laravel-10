<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
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
Route::get(
    'admin/resetpassword', 
    [
        ResetPasswordController::class,
        'index'
    ]
)->name('resetAdminPassword');
Route::post(
    'admin/login', 
    [LoginController::class, 'create']
)->name('adminLoginCreate');