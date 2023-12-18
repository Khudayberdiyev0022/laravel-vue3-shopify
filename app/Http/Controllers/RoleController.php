<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('permission:role-create|role-edit|role-delete', ['only' => ['index', 'show']]);
    $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
    $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
    $this->middleware('permission:role-delete', ['only' => ['destroy']]);
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $roles = Role::query()->paginate('10');

    return view('roles.index', compact('roles'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $permissions = Permission::query()->get();

    return view('roles.create', compact('permissions'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
//      $data = $request->validate([
//        'name' => 'required|string'
//      ]);
//      $data['guard_name'] = 'web';
//      dd($request->permissions);

    $role       = Role::firstOrCreate(['name' => $request->name]);
    $permissions = Permission::whereIn('id', $request->permissions)->get(['name'])->toArray();
//      dd($role->givePermissionTo(isset($request->permissions)));
//      dd($request['permissions']->map(fn($val) => (int)$val));
    $role->syncPermissions($permissions);

    return redirect()->route('roles.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Role $role)
  {
    $rolePermissions = Permission::join("role_has_permissions","permission_id","=","id")
      ->where("role_id",$role->id)
      ->select('name')
      ->get();

    return view('roles.show', compact('role', 'rolePermissions'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Role $role)
  {
    if($role->name=='Super Admin'){
      abort(403, 'SUPER ADMIN ROLE CAN NOT BE EDITED');
    }
    $permissions = Permission::query()->get();

    $rolePermissions = DB::table("role_has_permissions")->where("role_id",$role->id)
      ->pluck('permission_id')
      ->all();

//      dd($rolesPermissions);

    return view('roles.edit', compact('role', 'permissions', 'rolePermissions'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Role $role)
  {
    $data = $request->only('name');
    $role->update($data);
    $permissions = Permission::whereIn('id', $request->permissions)->get(['name'])->toArray();
    $role->syncPermissions($permissions);

    return redirect()->route('roles.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Role $role)
  {
    if($role->name=='Super Admin'){
      abort(403, 'SUPER ADMIN ROLE CAN NOT BE DELETED');
    }
    if(auth()->user()->hasRole($role->name)){
      abort(403, 'CAN NOT DELETE SELF ASSIGNED ROLE');
    }
    $role->delete();

    return redirect()->route('roles.index');
  }
}
