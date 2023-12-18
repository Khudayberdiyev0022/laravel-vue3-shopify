<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $permissions = Permission::paginate(10);

    return view('permissions.index', compact('permissions'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('permissions.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $data = $request->validate([
      'name' => 'required|string',
    ]);
    Permission::query()->firstOrCreate($data);

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
  public function edit(Permission $permission)
  {
    return view('permissions.edit', compact('permission'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Permission $permission)
  {
    $data = $request->validate([
      'name' => 'required|string',
    ]);
    $permission->update($data);

    return redirect()->route('permissions.index')->with('updated', 'Permissions updated successfully!');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Permission $permission)
  {
    $permission->delete();

    return redirect()->route('permissions.index')->with('updated', 'Permissions updated successfully!');
  }
}
