<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPermissionController extends Controller
{
  public function create(User $admin)
  {
    $permissions = Permission::query()
      ->whereNotIn('id', $admin->permissions->pluck('id'))
      ->oldest('action')
      ->get();

    return view('admins.permissions.create', compact('admin', 'permissions'));
  }
  public function attach(Request $request, User $admin)
  {
    $request->validate([
      'permission_id' => ['required', 'integer', 'exists:permissions,id'],
    ]);
    $id = $request->input('permission_id');

    $admin->permissions()->syncWithoutDetaching($id);

    return to_route('admins.show', $admin);
  }

  public function detach(Request $request, User $admin)
  {
    $request->validate([
      'permission_id' => ['required', 'integer', 'exists:permissions,id'],
    ]);
    $id = $request->input('permission_id');

    $admin->permissions()->detach($id);

    return to_route('admins.show', $admin);
  }
}
