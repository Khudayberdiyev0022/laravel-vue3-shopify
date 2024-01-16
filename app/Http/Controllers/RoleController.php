<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
public function __construct()
{
  $this->middleware('permission:role.create')->only('create', 'store');
  $this->middleware('permission:role.show')->only('index', 'show');
  $this->middleware('permission:role.edit')->only('edit', 'update');
  $this->middleware('permission:role.destroy')->only('destroy');
}

  public function index(): View
  {
    $roles = Role::with('permissions')->paginate(15);

//    dd($roles);
    return view('roles.index', compact('roles'));
  }

  public function create(): View
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

  public function store(Request $request): RedirectResponse
  {
    $request->validate(['name' => 'required|string']);
    $role = Role::create(['name' => $request->name]);
    $role->givePermissionTo($request->permissions);

    return redirect()->route('roles.index');
  }

  public function show(Role $role): View
  {
    return view('roles.show', compact('role'));
  }

  public function edit(Role $role): View
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

  public function update(Request $request, Role $role): RedirectResponse
  {
    $request->validate(['name' => 'required']);
    $role->update(["name" => $request->name]);
    $role->syncPermissions($request->permissions);

    return redirect()->route('roles.index');
  }

  public function destroy(Role $role): RedirectResponse
  {
    $role->permissions()->detach();
    $role->delete();

    return redirect()->route('roles.index');
  }
}
