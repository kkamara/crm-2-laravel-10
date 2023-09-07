<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ClientController;

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
Route::get('/admin/logout', [LoginController::class, 'logout'])
    ->name('adminLogout');
Route::get(
    'admin/resetpassword', 
    [
        ResetPasswordController::class,
        'index'
    ]
)->name('resetAdminPassword');
Route::get(
    'admin/clients',
    [
        ClientController::class,
        'index'
    ]
)->name('adminClients');
Route::get(
    'admin/clients/search',
    [
        ClientController::class,
        'search'
    ]
)->name('clientsSearch');
Route::get(
    'admin/clients/{id}',
    [
        ClientController::class,
        'view'
    ]
)->name('client');
Route::get(
    'admin/clients/{id}/edit',
    [
        ClientController::class,
        'edit'
    ]
)->name('editClient');
Route::post(
    'admin/clients/{id}/edit',
    [
        ClientController::class,
        'update'
    ]
)->name('updateClient');
Route::get(
    'admin/clients/{id}/delete',
    [
        ClientController::class,
        'delete'
    ]
)->name('deleteClient');
Route::delete(
    'admin/clients/{id}/delete',
    [
        ClientController::class,
        'destroy'
    ]
)->name('destroyClient');