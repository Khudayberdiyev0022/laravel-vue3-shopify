<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GroupController extends Controller
{
  public function index(): View
  {
    $groups = Group::query()->get();

    return view('admin.groups.index', compact('groups'));
  }

  public function create(): View
  {
    return view('admin.groups.create');
  }

  public function store(Request $request): RedirectResponse
  {
    $data = $request->validate([
      'name' => 'required',
    ]);

    Group::query()->create($data);

    return redirect()->route('admin.groups.index');
  }
}
