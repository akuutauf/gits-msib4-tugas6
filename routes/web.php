<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route Pages Beranda
Route::get('/', [PagesController::class, 'home'])->name('home.page');

// route action logout hanya tersedia untuk admin
Route::get('/logout', [AuthController::class, "logout"])->name('logout.page');

// Cart Routes
Route::get('/cart-index', [CartController::class, 'index'])->name('index.cart');
Route::post('/cart/product-store/{id}', [CartController::class, 'store'])->name('store.cart');
Route::put('/cart/product-update/{id}', [CartController::class, 'update'])->name('update.cart');
Route::get('/cart/product-delete/{id}', [CartController::class, 'destroy'])->name('delete.cart');

// route untuk halaman register dan login (jika user sudah login maka tidak diperbolehkan mengakses login dan register page)
Route::middleware(['guest'])->group(function () {
    // Route Auth
    Route::get('/register', [AuthController::class, "register"])->name('register.page');
    Route::get('/login', [AuthController::class, "login"])->name('login.page');

    // Route Action Auth
    Route::post('/register', [AuthController::class, "doRegister"])->name('do.register');
    Route::post('/login', [AuthController::class, "doLogin"])->name('do.login');
});

// route view untuk admin
Route::middleware(['auth'])->group(function () {
    // dashboard admin
    Route::get('/admin-panel', [PagesController::class, 'admin'])->name('admin.page');

    // User Routes
    Route::get('/user-index', [UserController::class, 'index'])->name('index.user');
    Route::put('/user-update/{id}', [UserController::class, 'update'])->name('update.user');

    // Product Routes
    Route::get('/product-index', [ProductController::class, 'index'])->name('index.product');
    Route::get('/product/add', [ProductController::class, 'create'])->name('create.product');
    Route::post('/product/store', [ProductController::class, 'store'])->name('store.product');
    Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('edit.product');
    Route::put('/product/{id}/update', [ProductController::class, 'update'])->name('update.product');
    Route::get('/product/{id}/delete', [ProductController::class, 'destroy'])->name('delete.product');

    // Category Routes
    Route::get('/category-index', [CategoryController::class, 'index'])->name('index.category');
    Route::get('/category/add', [CategoryController::class, 'create'])->name('create.category');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('store.category');
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('edit.category');
    Route::put('/category/{id}/update', [CategoryController::class, 'update'])->name('update.category');
    Route::get('/category/{id}/delete', [CategoryController::class, 'destroy'])->name('delete.category');
});

// mengimplementasikan fungsi update data user (4.30 - 3.40)
