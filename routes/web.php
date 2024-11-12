<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\HomeController;
use App\Http\Controllers\SuperAdminController;

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

// Route::get('/', function () {
//     return view('frontend.welcome');
// });

Route::get('/',[HomeController::class, 'index'])->name('welcome');
Route::get('/admin/login',[AdminController::class, 'index'])->name('admin.login');
Route::get('/admin/dashboard',[SuperAdminController::class, 'AdminDashboard'])->name('admin.dashboard');
// for login
Route::post('/admin_dashboard',[AdminController::class, 'show_dashboard'])->name('admin_dashboard');
Route::get('/logout',[SuperAdminController::class, 'logout'])->name('logout');
