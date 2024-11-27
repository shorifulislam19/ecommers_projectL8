<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\HomeController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SuCategoryController;
use App\Http\Controllers\UnitController;

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

// Sub Categoty Routes here
Route::resource('/sub-categories',SuCategoryController::class);
Route::get('/subcat-status{subcategory}',[SuCategoryController::class, 'change_status']);

// Brand Routes here
Route::resource('/brands',BrandController::class);
Route::get('/brand-status{brand}',[BrandController::class, 'change_status']);

// Unit Routes here
Route::resource('/units',UnitController::class);
Route::get('/unit-status{unit}',[UnitController::class, 'change_status']);

// Size Routes here
Route::resource('/sizes',SizeController::class);
Route::get('/size-status{size}',[SizeController::class, 'change_status']);

// Color Routes here
Route::resource('/colors',ColorController::class);
Route::get('/color-status{color}',[ColorController::class, 'change_status']);

// Product Routes here
Route::resource('/products',ProductController::class);
Route::get('/product-status/{product}',[ProductController::class, 'change_status']);

// Home page
Route::get('/view-product/{id}',[HomeController::class, 'view_details']);
Route::get('/product_by_cat/{id}',[HomeController::class, 'product_by_cat']);
Route::get('/product_by_subcat/{id}', [HomeController::class, 'product_by_subcat']);
Route::get('/product_by_brand/{id}', [HomeController::class, 'product_by_brand']);

// add to acrt
Route::post('/add_to_cart', [CartController::class, 'add_to_cart']);
Route::get('/delete-cart/{id}', [CartController::class, 'delete']);

//  Checkout
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::get('/login-check', [CheckoutController::class, 'LogingCheck']);
// Customer login and registration route here
Route::post('/customer-login', [CustomerController::class, 'Login']);
Route::post('/customer-registration', [CustomerController::class, 'Registration']);
Route::get('/customer-logout', [CustomerController::class, 'logout']);
Route::post('/save-shipping-address', [CheckoutController::class, 'save_shipping_address']);
Route::get('/payment', [CheckoutController::class, 'payment']);
Route::post('/place-order', [CheckoutController::class, 'order_place']);
// orders route
Route::get('/manage-order', [OrderController::class, 'manage_order']);


