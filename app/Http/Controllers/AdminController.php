<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

  public function index()
  {
    $admins = User::query()->where('admin', true)->get();

    return view('admins.index', compact('admins'));
  }

  public function create()
  {
    $users = User::query()->where('admin', false)->get();

    return view('admins.create', compact('users'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'user_id' => ['required', 'integer', 'exists:users,id'],
    ]);
    $id    = $request->input('user_id');
    $admin = User::query()->find($id);
    $admin->update(['admin' => true]);
    session()->flash('success', __('main.success_admin'));

    return redirect()->route('admins.index');
  }

  public function show(User $admin)
  {
    abort_unless($admin->admin, 404);
    $roles       = $admin->roles()->get();
    $permissions = $admin->permissions()->get();

    return view('admins.show', compact('admin', 'roles', 'permissions'));
  }

  public function edit(User $admin)
  {
//
  }

  public function update(Request $request, User $admin)
  {
    //
  }

  public function destroy(User $admin)
  {
    $admin->update(['admin' => false]);
    session()->flash('deleted', __('main.deleted_admin'));

    return redirect()->route('admins.index');
  }
}
