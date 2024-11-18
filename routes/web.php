<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\HomeController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\CategoryController;


// user part
Route::get('/',[HomeController::class, 'index'])->name('welcome');

// Admin part
Route::get('/admin/login',[AdminController::class, 'index'])->name('admin.login');
Route::get('/admin/dashboard',[SuperAdminController::class, 'AdminDashboard'])->name('admin.dashboard');
// for login
Route::post('/admin_dashboard',[AdminController::class, 'show_dashboard'])->name('admin_dashboard');
Route::get('/logout',[SuperAdminController::class, 'logout'])->name('logout');

// Categoty Routes here
Route::resource('/categories',CategoryController::class);
Route::get('/cat-status{category}',[CategoryController::class, 'change_status']);


