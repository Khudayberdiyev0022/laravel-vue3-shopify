<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\StoreRequest;
use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TagController extends Controller
{
  public function index(): View
  {
    $tags = Tag::query()->get();

    return view('admin.tags.index', compact('tags'));
  }

  public function create(): View
  {
    return view('admin.tags.create');
  }

  public function store(StoreRequest $request): RedirectResponse
  {
    $data = $request->validated();

    Tag::query()->create($data);

    return redirect()->route('admin.tags.index');
  }
}
