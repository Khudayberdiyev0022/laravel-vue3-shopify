<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
  public function __construct()
  {
    $this->middleware('permission:user.create')->only('create', 'store');
    $this->middleware('permission:user.show')->only('index', 'show');
    $this->middleware('permission:user.edit')->only('edit', 'update');
    $this->middleware('permission:user.destroy')->only('destroy');
  }

  public function index(): View
  {
    $users = User::query()->where('id', '!=' , 1)->latest()->paginate(15);

    return view('users.index', compact('users'));
  }

  public function create(): View
  {
    $roles = Role::query()->pluck('name')->all();

    return view('users.create', compact('roles'));
  }

  public function store(Request $request)
  {
    $data             = $request->all();
    $data['password'] = Hash::make($request->password);

    $user = User::create($data);
    $user->assignRole($request->roles);

    return redirect()->route('users.index');
  }

  public function show(User $user): View
  {
    return view('users.show', compact('user'));
  }

  public function edit(User $user): View
  {
    // Check Only Super Admin can update his own Profile
    if ($user->hasRole('Super Admin')) {
      if ($user->id != auth()->id()) {
        abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS');
      }
    }
    $roles     = Role::query()->pluck('name')->all();
    $userRoles = $user->roles->pluck('name')->all();

    return view('users.edit', compact('user', 'roles', 'userRoles'));
  }

  public function update(Request $request, User $user)
  {
    $data = $request->all();

    if (!empty($request->password)) {
      $data['password'] = Hash::make($request->password);
    } else {
      $data = $request->except('password');
    }

    $user->update($data);

    $user->syncRoles($request->roles);

    return redirect()->route('users.index');
  }

  public function destroy(User $user)
  {
    // About if user is Super Admin or User ID belongs to Auth User
    if ($user->hasRole('Super Admin') || $user->id == auth()->id()) {
      abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS');
    }

    $user->syncRoles([]);
    $user->delete();

    return redirect()->route('users.index');
  }
}
