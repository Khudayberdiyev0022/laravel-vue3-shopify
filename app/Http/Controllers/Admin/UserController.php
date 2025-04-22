<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
  public function index(): View
  {
    $users = User::query()->get();

    return view('admin.users.index', compact('users'));
  }

  public function create(): View
  {
    return view('admin.users.create');
  }

  public function store(Request $request)
  {
    $data = $request->validate([
      'name'       => 'required',
      'middlename' => 'nullable',
      'age'        => 'nullable',
      'gender'     => 'nullable',
      'address'    => 'nullable',
      'email'      => 'required|email|unique:users',
      'password'   => 'required',
    ]);

    $user = User::create($data);

    return redirect()->route('admin.users.index');
  }
}
