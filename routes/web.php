<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPermissionController;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DegreeLevelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NationalityController;
use App\Http\Controllers\PartisanController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use Illuminate\Support\Facades\Route;


// вход
Route::middleware('guest')->group(function () {
  Route::redirect('/', 'login');
  Route::get('login', [AuthController::class, 'login'])->name('login');
  Route::post('login', [AuthController::class, 'loginStore'])->name('login.store');
});

// админка
Route::middleware(['auth', 'admin'])->group(function () {
  Route::get('language/{language}', \App\Http\Controllers\IndexController::class)->name('change.language');
  Route::get('home', [HomeController::class, 'home'])->name('home');
  Route::post('logout', [AuthController::class, 'logout'])->name('logout');

  // пользователи
  Route::get('users', \App\Livewire\UserComponent::class)->name('users.index');

  // админы
  Route::resource('admins', AdminController::class);

  // роли админа
  Route::get('admins/{admin}/roles/create', [AdminRoleController::class, 'create'])->name('admins.roles.create');
  Route::post('admins/{admin}/roles/attach', [AdminRoleController::class, 'attach'])->name('admins.roles.attach');
  Route::post('admins/{admin}/roles/detach', [AdminRoleController::class, 'detach'])->name('admins.roles.detach');

  // полномочия админа
  Route::get('admins/{admin}/permissions/create', [AdminPermissionController::class, 'create'])->name('admins.permissions.create');
  Route::post('admins/{admin}/permissions/attach', [AdminPermissionController::class, 'attach'])->name('admins.permissions.attach');
  Route::post('admins/{admin}/permissions/detach', [AdminPermissionController::class, 'detach'])->name('admins.permissions.detach');

  // роли
  Route::resource('roles', RoleController::class);

  // полномочия роли
  Route::get('roles/{role}/permissions/create', [RolePermissionController::class, 'create'])->name('roles.permissions.create');
  Route::post('roles/{role}/permissions/attach', [RolePermissionController::class, 'attach'])->name('roles.permissions.attach');
  Route::post('roles/{role}/permissions/detach', [RolePermissionController::class, 'detach'])->name('roles.permissions.detach');

  // полномочия
  Route::resource('permissions', PermissionController::class);


  Route::resource('languages', \App\Http\Controllers\LanguageController::class)->except('show');
  Route::resource('translations', \App\Http\Controllers\TranslationController::class);

  Route::resource('chairs', \App\Http\Controllers\ChairController::class);


  // отделы
  Route::get('departments', \App\Livewire\DepartmentComponent::class)->name('departments.index');

  // кафедры
  Route::get('chairs', \App\Livewire\ChairComponent::class)->name('chairs.index');

  // должности
  Route::get('positions', \App\Livewire\PositionComponent::class)->name('positions.index');

  // кафедры
  Route::get('groups', \App\Livewire\GroupComponent::class)->name('groups.index');

  // националности
  Route::get('nationalities', \App\Livewire\NationalityComponent::class)->name('nationalities.index');

  // степень родства
  Route::get('degreelevels', \App\Livewire\DegreeLevelComponent::class)->name('degreelevels.index');

  // регионы
  Route::resource('regions', RegionController::class);
  Route::get('regions/{region}/cities/{city}', [RegionController::class, 'showCity'])->name('regions.cities.show');

  // города
  Route::resource('cities', CityController::class);

  Route::get('education', [\App\Http\Controllers\EducationController::class, 'index'])->name('education.index');

  // регионы
//  Route::get('regions', [RegionController::class, 'index'])->name('regions.index');
//  Route::get('regions/create', [RegionController::class, 'create'])->name('regions.create');
//  Route::post('regions', [RegionController::class, 'store'])->name('regions.store');
//  Route::get('regions/{region}', [RegionController::class, 'show'])->name('regions.show');
//  Route::delete('regions/{region}', [RegionController::class, 'destroy'])->name('regions.destroy');
//
//  Route::get('divisions', fn() => 'divisions')->name('divisions.index');
//  Route::get('sciences', fn() => 'sciences')->name('sciences.index');
//  Route::get('class-schedule', fn() => 'class_schedule')->name('class_schedule.index');
//  Route::get('bachelors', fn() => 'bachelors')->name('bachelors.index');
//  Route::get('masters', fn() => 'masters')->name('masters.index');
//  Route::get('training', fn() => 'training')->name('training.index');
//  Route::get('intermediate', fn() => 'intermediate')->name('intermediate.index');
//  Route::get('test', fn() => 'test')->name('test.index');
//  Route::get('speaking', fn() => 'speaking')->name('speaking.index');
//  Route::get('sync', fn() => 'sync')->name('sync.index');
//  Route::get('files', fn() => 'files')->name('files.index');
});
