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

Route::middleware('auth')->group(function () {
  Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
  Route::resource('roles', \App\Http\Controllers\RoleController::class);
  Route::resource('permissions', \App\Http\Controllers\PermissionController::class);
  Route::get('/users/changeStatus', [\App\Http\Controllers\UserController::class, 'changeStatus']);
  Route::resource('users', \App\Http\Controllers\UserController::class);
  Route::get('academic-year', fn() => 'academic_year')->name('academic.index');
  Route::get('divisions', fn() => 'divisions')->name('divisions.index');
  Route::get('sciences', fn() => 'sciences')->name('sciences.index');
  Route::get('class-schedule', fn() => 'class_schedule')->name('class_schedule.index');
  Route::get('professors', fn() => 'professors')->name('professors.index');
  Route::get('bachelors', fn() => 'bachelors')->name('bachelors.index');
  Route::get('masters', fn() => 'masters')->name('masters.index');
  Route::get('training', fn() => 'training')->name('training.index');
  Route::get('intermediate', fn() => 'intermediate')->name('intermediate.index');
  Route::get('test', fn() => 'test')->name('test.index');
  Route::get('speaking', fn() => 'speaking')->name('speaking.index');
  Route::get('sync', fn() => 'sync')->name('sync.index');
  Route::get('files', fn() => 'files')->name('files.index');
  Route::get('admissions', \App\Livewire\AdmissionComponent::class)->name('admissions');
  Route::get('departments', \App\Livewire\DepartmentComponent::class)->name('departments');
});
