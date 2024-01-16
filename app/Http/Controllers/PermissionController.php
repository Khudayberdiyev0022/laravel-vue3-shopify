<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
  public function __construct()
  {
    $this->middleware('permission:permission.create')->only('create', 'store');
    $this->middleware('permission:permission.show')->only('index', 'show');
    $this->middleware('permission:permission.edit')->only('edit', 'update');
    $this->middleware('permission:permission.destroy')->only('destroy');
  }

  public function index(): View
  {
    $permissions = Permission::query()->paginate(15);

    return view('permissions.index', compact('permissions'));
  }

  public function create(): View
  {
    return view('permissions.create');
  }

  public function store(Request $request): RedirectResponse
  {
    $request->validate(['name' => 'required']);
//    dd($request->name);
    Permission::create(['name' => $request->name]);

    return redirect()->route('permissions.index')->with('success', 'Permissions created successfully!');
  }

  public function show(Permission $permission)
  {
    //
  }

  public function edit(Permission $permission): View
  {
    return view('permissions.edit', compact('permission'));
  }

  public function update(Request $request, Permission $permission): RedirectResponse
  {
    $request->validate(['name' => 'required|string']);
    $permission->update($request->name);

    return redirect()->route('permissions.index')->with('updated', 'Permissions updated successfully!');
  }

  public function destroy(Permission $permission): RedirectResponse
  {
    $permission->delete();

    return redirect()->route('permissions.index')->with('updated', 'Permissions updated successfully!');
  }
}
