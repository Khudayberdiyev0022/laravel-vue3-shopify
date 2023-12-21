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

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    return view('permissions.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request): RedirectResponse
  {
    $request->validate(['name' => 'required']);
//    dd($request->name);
    Permission::create(['name' => $request->name]);

    return redirect()->route('permissions.index')->with('success', 'Permissions created successfully!');
  }

  /**
   * Display the specified resource.
   */
  public function show(Permission $permission)
  {
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Permission $permission): View
  {
    return view('permissions.edit', compact('permission'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Permission $permission): RedirectResponse
  {
    $request->validate(['name' => 'required|string']);
    $permission->update($request->name);

    return redirect()->route('permissions.index')->with('updated', 'Permissions updated successfully!');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Permission $permission): RedirectResponse
  {
    $permission->delete();

    return redirect()->route('permissions.index')->with('updated', 'Permissions updated successfully!');
  }
}
