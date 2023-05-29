<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserManagerController;
use App\Http\Controllers\CategoryManagerController;
use App\Http\Controllers\ProductManagerController;

// Dashboard routes
Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard/show/{product}', [DashboardController::class, 'show'])->name('dashboard.show');



// User Manager routes
Route::get('/users', [UserManagerController::class, 'index'])->name('user.index');
Route::get('/users/create', [UserManagerController::class, 'create'])->name('user.create');
Route::post('/users', [UserManagerController::class, 'store'])->name('user.store');
Route::get('/users/{user}', [UserManagerController::class, 'show'])->name('user.show');
Route::get('/users/{user}/edit', [UserManagerController::class, 'edit'])->name('user.edit');
Route::put('/users/{user}', [UserManagerController::class, 'update'])->name('user.update');
Route::delete('/users/{user}', [UserManagerController::class, 'destroy'])->name('user.destroy');

// Category Manager routes
Route::get('/categories', [CategoryManagerController::class, 'index'])->name('category.index');
Route::get('/categories/create', [CategoryManagerController::class, 'create'])->name('category.create');
Route::post('/categories', [CategoryManagerController::class, 'store'])->name('category.store');
Route::get('/categories/{category}', [CategoryManagerController::class, 'show'])->name('category.show');
Route::get('/categories/{category}/edit', [CategoryManagerController::class, 'edit'])->name('category.edit');
Route::put('/categories/{category}', [CategoryManagerController::class, 'update'])->name('category.update');
Route::delete('/categories/{category}', [CategoryManagerController::class, 'destroy'])->name('category.destroy');

// Product Manager routes
Route::get('/products', [ProductManagerController::class, 'index'])->name('product.index');
Route::get('/products/create', [ProductManagerController::class, 'create'])->name('product.create');
Route::post('/products', [ProductManagerController::class, 'store'])->name('product.store');
Route::get('/products/{product}', [ProductManagerController::class, 'show'])->name('product.show');
Route::get('/products/{product}/edit', [ProductManagerController::class, 'edit'])->name('product.edit');
Route::put('/products/{product}', [ProductManagerController::class, 'update'])->name('product.update');
Route::delete('/products/{product}', [ProductManagerController::class, 'destroy'])->name('product.destroy');

Route::get('api/product', [ProductManagerController::class, 'apis'])->name('product.apis');