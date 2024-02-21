<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class RoleController extends Controller
{
  public function index(): View
  {
    $roles = Role::query()->latest()->get();

    return view('roles.index', compact('roles'));
  }

  public function create(): View
  {
    return view('roles.create');
  }

  public function store(Request $request): RedirectResponse
  {
    $role = Role::query()
      ->create($request->validate([
        'name' => ['required', 'string', 'max:100', 'unique:roles'],
      ]));
    session()->flash('success', __('main.success_role'));

    return to_route('roles.show', $role);
  }

  public function show(Role $role): View
  {
    $permissions = $role->permissions()->get();

    return view('roles.show', compact('role', 'permissions'));
  }

  public function destroy(Role $role): RedirectResponse
  {
    try {
      DB::beginTransaction();
      $role->permissions()->detach();
      $role->users()->detach();
      $role->delete();
      session()->flash('deleted', __('main.deleted_role'));
      DB::commit();
    }catch (\Exception $e) {
      DB::rollBack();
      echo $e->getMessage();
    }
//    DB::transaction(function () use ($role) {
//      $role->permissions()->detach();
//      $role->users()->detach();
//      $role->delete();
//      session()->flash('deleted', __('main.deleted_role'));
//    });

    return to_route('roles.index');
  }
}
