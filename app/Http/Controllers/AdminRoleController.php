<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
  public function create(User $admin)
  {
    $roles = Role::query()
      ->whereNotIn('id', $admin->roles->pluck('id'))
      ->oldest('id')
      ->get();

    return view('admins.roles.create', compact('admin', 'roles'));
  }
  public function attach(Request $request, User $admin)
  {
    $request->validate([
      'role_id' => ['required', 'integer', 'exists:permissions,id'],
    ]);
    $id = $request->input('role_id');

    $admin->roles()->syncWithoutDetaching($id);

    return to_route('admins.show', $admin);
  }

  public function detach(Request $request, User $admin)
  {
    $request->validate([
      'role_id' => ['required', 'integer', 'exists:permissions,id'],
    ]);
    $id = $request->input('role_id');

    $admin->roles()->detach($id);

    return to_route('admins.show', $admin);
  }
}
