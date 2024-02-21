<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
  public function create(Role $role): View
  {
    $permissions = Permission::query()
      ->whereNotIn('id', $role->permissions->pluck('id'))
      ->oldest('action')
      ->get();

    return view('roles.permissions.create', compact('role', 'permissions'));
  }

  public function attach(Request $request, Role $role): RedirectResponse
  {
    $request->validate([
      'permission_id' => ['required', 'integer', 'exists:permissions,id'],
    ]);
    $id = $request->input('permission_id');

    $role->permissions()->syncWithoutDetaching($id);

    return to_route('roles.show', $role);
  }

  public function detach(Request $request, Role $role): RedirectResponse
  {
    $request->validate([
      'permission_id' => ['required', 'integer', 'exists:permissions,id'],
    ]);
    $id = $request->input('permission_id');

    $role->permissions()->detach($id);

    return to_route('roles.show', $role);
  }
}
