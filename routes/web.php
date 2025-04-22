<?php

use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name('admin.')->group(function () {
  Route::get('/', [App\Http\Controllers\Admin\IndexController::class, 'index'])->name('admin.index');
  Route::resource('users', App\Http\Controllers\Admin\UserController::class);
  Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
  Route::resource('tags', App\Http\Controllers\Admin\TagController::class);
  Route::resource('colors', App\Http\Controllers\Admin\ColorController::class);
  Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
});
