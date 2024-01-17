<?php

use App\Http\Controllers\DegreeLevelController;
use App\Http\Controllers\NationalityController;
use App\Http\Controllers\PartisanController;
use App\Http\Controllers\RegionController;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::middleware('auth')->group(callback: function () {
  Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
  Route::get('language/{language}', \App\Http\Controllers\IndexController::class)->name('change.language');
  Route::resource('roles', \App\Http\Controllers\RoleController::class);
  Route::resource('permissions', \App\Http\Controllers\PermissionController::class);
  Route::resource('languages', \App\Http\Controllers\LanguageController::class)->except('show');
  Route::resource('translations', \App\Http\Controllers\TranslationController::class);
  Route::get('users/changeStatus', [\App\Http\Controllers\UserController::class, 'changeStatus']);
  Route::resource('users', \App\Http\Controllers\UserController::class);
  Route::resource('faculties', \App\Http\Controllers\FacultyController::class);


  // степень родства
  Route::get('degreelevels', [DegreeLevelController::class, 'index'])->name('degreelevels.index');
  Route::get('degreelevels/create', [DegreeLevelController::class, 'create'])->name('degreelevels.create');
  Route::post('degreelevels', [DegreeLevelController::class, 'store'])->name('degreelevels.store');
  Route::get('degreelevels/{degreelevel}', [DegreeLevelController::class, 'show'])->name('degreelevels.show');
  Route::delete('degreelevels/{degreelevel}', [DegreeLevelController::class, 'destroy'])->name('degreelevels.destroy');

  // партии
  Route::get('partisans', [PartisanController::class, 'index'])->name('partisans.index');
  Route::get('partisans/create', [PartisanController::class, 'create'])->name('partisans.create');
  Route::post('partisans', [PartisanController::class, 'store'])->name('partisans.store');
  Route::get('partisans/{partisan}', [PartisanController::class, 'show'])->name('partisans.show');
  Route::delete('partisans/{partisan}', [PartisanController::class, 'destroy'])->name('partisans.destroy');

  // национальности
  Route::get('nationalities', [NationalityController::class, 'index'])->name('nationalities.index');
  Route::get('nationalities/create', [NationalityController::class, 'create'])->name('nationalities.create');
  Route::post('nationalities', [NationalityController::class, 'store'])->name('nationalities.store');
  Route::get('nationalities/{nationality}', [NationalityController::class, 'show'])->name('nationalities.show');
  Route::delete('nationalities/{nationality}', [NationalityController::class, 'destroy'])->name('nationalities.destroy');


  // регионы
  Route::get('regions', [RegionController::class, 'index'])->name('regions.index');
  Route::get('regions/create', [RegionController::class, 'create'])->name('regions.create');
  Route::post('regions', [RegionController::class, 'store'])->name('regions.store');
  Route::get('regions/{region}', [RegionController::class, 'show'])->name('regions.show');
  Route::delete('regions/{region}', [RegionController::class, 'destroy'])->name('regions.destroy');

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
