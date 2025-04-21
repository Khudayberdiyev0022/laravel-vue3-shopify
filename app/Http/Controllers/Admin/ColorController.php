<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Color\StoreRequest;
use App\Models\Color;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ColorController extends Controller
{
  public function index(): View
  {
    $colors = Color::query()->get();

    return view('admin.colors.index', compact('colors'));
  }

  public function create(): View
  {
    return view('admin.colors.create');
  }

  public function store(StoreRequest $request): RedirectResponse
  {
    $data = $request->validated();

    Color::query()->create($data);

    return redirect()->route('admin.colors.index');
  }
}
