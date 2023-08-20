<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/admin/dashboard', function () {
    return view('admin/dashboard');
})->name('adminHome');
Route::redirect('admin', 'admin/login');
Route::get('/admin/login', function () {
    return view('admin/auth/login');
})->name('adminLogin');
