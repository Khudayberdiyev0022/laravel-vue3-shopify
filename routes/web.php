<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::middleware('auth')->group(function () {
  Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
  Route::get('language/{language}', \App\Http\Controllers\IndexController::class)->name('change.language');
  Route::resource('roles', \App\Http\Controllers\RoleController::class);
  Route::resource('permissions', \App\Http\Controllers\PermissionController::class);
  Route::resource('languages', \App\Http\Controllers\LanguageController::class)->except('show');
  Route::get('users/changeStatus', [\App\Http\Controllers\UserController::class, 'changeStatus']);
  Route::resource('users', \App\Http\Controllers\UserController::class);
  Route::resource('faculties', \App\Http\Controllers\FacultyController::class);
  // Livewire Components
//  Route::get('admissions', \App\Livewire\AdmissionComponent::class)->name('admissions');
//  Route::get('departments', \App\Livewire\DepartmentComponent::class)->name('departments');
//  Route::get('teachers', \App\Livewire\TeacherComponent::class)->name('teachers');
//  Route::get('chairs', \App\Livewire\ChairComponent::class)->name('chairs');
//  Route::get('academic-year', fn() => 'academic_year')->name('academic.index');
  // Livewire Components End

  Route::get('divisions', fn() => 'divisions')->name('divisions.index');
  Route::get('sciences', fn() => 'sciences')->name('sciences.index');
  Route::get('class-schedule', fn() => 'class_schedule')->name('class_schedule.index');
  Route::get('bachelors', fn() => 'bachelors')->name('bachelors.index');
  Route::get('masters', fn() => 'masters')->name('masters.index');
  Route::get('training', fn() => 'training')->name('training.index');
  Route::get('intermediate', fn() => 'intermediate')->name('intermediate.index');
  Route::get('test', fn() => 'test')->name('test.index');
  Route::get('speaking', fn() => 'speaking')->name('speaking.index');
  Route::get('sync', fn() => 'sync')->name('sync.index');
  Route::get('files', fn() => 'files')->name('files.index');
});
