<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function index(): View
  {
    $categories = Category::query()->get();

    return view('admin.categories.index', compact('categories'));
  }

  public function create(): View
  {
    return view('admin.categories.create');
  }

  public function store(StoreRequest $request): RedirectResponse
  {
    $data = $request->validated();

    Category::query()->create($data);

    return redirect()->route('admin.categories.index');
  }
}
