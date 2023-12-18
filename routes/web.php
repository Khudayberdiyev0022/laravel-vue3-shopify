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

//Route::get('/', function () {
//    return redirect()->route('home');
//});

Auth::routes();

Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::resource('roles', \App\Http\Controllers\RoleController::class);
Route::resource('permissions', \App\Http\Controllers\PermissionController::class);
Route::resource('users', \App\Http\Controllers\UserController::class);
Route::get('admissions', \App\Livewire\AdmissionComponent::class)->name('admissions');
Route::get('departments', \App\Livewire\DepartmentComponent::class)->name('departments');
