<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

  public function index()
  {
    $roles = Role::query()->get();

    return view('roles.index', compact('roles'));
  }

  public function create()
  {
    $role_permission = Permission::query()->select('name', 'id')->groupBy('name')->get();
    $permissions     = [];
//    dd($custom_permission);

    foreach ($role_permission as $per) {
      $key = substr($per->name, 0, strpos($per->name, "."));
      if (str_starts_with($per->name, $key)) {
        $permissions[$key][] = $per;
      }
    }

    return view('roles.create', compact('permissions'));
  }

  public function store(Request $request)
  {
    $request->validate(['name' => 'required|string']);
    $role = Role::create(['name' => $request->name]);
    $role->givePermissionTo($request->permissions);

    return redirect()->route('roles.index');
  }

  public function show(Role $role)
  {
    return view('roles.show', compact('role', 'rolePermissions'));
  }

  public function edit(Role $role)
  {
//    $role = Role::with('permissions')->findOrFail($id);
    $role_permission = Permission::query()->select('name', 'id')->groupBy('name')->get();
    $permissions     = [];

    foreach ($role_permission as $per) {
      $key = substr($per->name, 0, strpos($per->name, "."));

      if (str_starts_with($per->name, $key)) {
        $permissions[$key][] = $per;
      }
    }

    return view('roles.edit', compact('role', 'permissions', 'role_permission'));
  }

  public function update(Request $request, Role $role)
  {
    $request->validate(['name' => 'required']);
    $role->update(["name" => $request->name]);
    $role->syncPermissions($request->permissions);

    return redirect()->route('roles.index');
  }

  public function destroy(Role $role)
  {
    $role->permissions()->detach();
    $role->delete();

    return redirect()->route('roles.index');
  }
}
