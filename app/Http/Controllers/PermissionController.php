<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class PermissionController extends Controller
{
  public function index(): View
  {
    $permissions = Permission::query()->latest()->paginate(10);

    return view('permissions.index', compact('permissions'));
  }

  public function create(): View
  {
    return view('permissions.create');
  }

  public function store(Request $request): RedirectResponse
  {
    $data = $request->validate([
      'name' => ['required', 'string', 'max:50', 'unique:permissions'],
      'action' => ['required', 'string', 'max:50', 'unique:permissions'],
    ]);

    $data['type'] = 'custom';

    $permission = Permission::query()->create($data);
    session()->flash('success', __('main.success_permission'));

    return to_route('permissions.show', $permission);
  }

  public function show(Permission $permission): View
  {
    return view('permissions.show', compact('permission'));
  }

  public function delete(Permission $permission): RedirectResponse
  {
    try {
      DB::beginTransaction();
      $permission->users()->detach();
      $permission->delete();
      session()->flash('deleted', __('main.deleted_permission'));
      DB::commit();
    }catch (\Exception $e) {
      DB::rollBack();
      echo $e->getMessage();
    }
//    DB::transaction(function () use ($permission) {
////      $permission->roles()->detach();
//      $permission->users()->detach();
//      $permission->delete();
//      session()->flash('deleted', __('main.deleted_permission'));
//    });

    return to_route('permissions.index');
  }
}
