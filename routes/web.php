<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\ShopController;
use App\Http\Controllers\Api\CouponController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\TestimonialController;
use App\Http\Controllers\Api\AdminCommentsController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\CheckoutController;


Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::put('/cart/{cart}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');


Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/admin', [MainController::class, 'admin'])->name('admin');
Route::get('comments', [MainController::class, 'comments']);
Route::get('about', [MainController::class, 'about']);
Route::get('entercode', [MainController::class, 'entercode']);
Route::get('forgetpassword', [MainController::class, 'forgetpassword']);
Route::get('fproducts', [MainController::class, 'fproducts']);
Route::get('profile', [MainController::class, 'profile']);
Route::get('shop', [MainController::class, 'shop'])->name('shop');
Route::get('shop-detail', [MainController::class, 'shopdetail']);
Route::get('shopdetail2', [MainController::class, 'shopdetail2']);
Route::get('updateprofile', [MainController::class, 'updateprofile']);
Route::get('updateadminprofile', [MainController::class, 'updateadminprofile']);
Route::get('updateshop', [MainController::class, 'updateshop']);
Route::get('verificationCode', [MainController::class, 'verificationCode']);
Route::get('comments', [MainController::class, 'comments']);
Route::get('adminprofile', [MainController::class, 'adminprofile']);
Route::get('testimonial', [MainController::class, 'testimonial']);
Route::get('showPrice', [MainController::class, 'showPrice'])->name('showPrice');



Route::get('/showLoginForm', [LoginController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');



Route::get('/showRegistrationForm', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register.post');



Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
Route::post('roles', [RoleController::class, 'store'])->name('roles.store');
Route::get('roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
Route::put('roles/{id}', [RoleController::class, 'update'])->name('roles.update');
Route::delete('roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
Route::get('permissions', [RoleController::class, 'getPermissions'])->name('permissions.index');


Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('users/create', [UserController::class, 'create'])->name('users.create');
Route::post('users', [UserController::class, 'store'])->name('users.store');
Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');



Route::get('/admincomments', [AdminCommentsController::class, 'index'])->name('admincomments.index');
Route::post('comments', [AdminCommentsController::class, 'store'])->name('comments.store');
Route::delete('/admincomments/{id}', [AdminCommentsController::class, 'destroy'])->name('admincomments.destroy');
Route::post('admincomments', [AdminCommentsController::class, 'search'])->name('admincomments.search');


Route::get('categories',[CategoryController::class,'index']);
Route::resource('categories', CategoryController::class);


Route::resource('coupon', CouponController::class);
Route::get('/coupon/{id}/edit', [CouponController::class, 'edit'])->name('coupon.edit');
Route::put('/coupon/{id}', [CouponController::class, 'update'])->name('coupon.update');
Route::post('/coupon', [CouponController::class, 'store'])->name('coupon.store');
Route::post('/cart/apply-coupon', [CouponController::class, 'applyCoupon'])->name('cart.applyCoupon');


Route::get('featuredproducts',[ProductController::class,'index']);
Route::get('fproducts', [ProductController::class, 'filterProducts'])->name('featuredproducts.filter');
Route::get('/fshop', [ProductController::class, 'showProducts'])->name('featuredproducts.showProducts');
Route::resource('featuredproducts', ProductController::class);


Route::get('uploadshop',[ShopController::class,'index']);
Route::resource('uploadshop', ShopController::class);


Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
