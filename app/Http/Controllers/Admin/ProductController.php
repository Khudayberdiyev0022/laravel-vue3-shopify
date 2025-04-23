<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
  public function index(): View
  {
    $products = Product::query()->get();

    return view('admin.products.index', compact('products'));
  }

  public function create()
  {
    $categories = Category::query()->get();
    $tags       = Tag::query()->get();
    $colors     = Color::query()->get();

    return view('admin.products.create', compact('categories', 'tags', 'colors'));
  }

  public function store(Request $request)
  {
    $data = $request->validate([
      'category_id'   => 'required',
      'title'         => 'required',
      'description'   => 'nullable',
      'content'       => 'nullable',
      'price'         => 'required',
      'count'         => 'required',
      'preview_image' => 'nullable',
      'is_published'  => 'nullable',
    ]);
    if ($request->hasFile('preview_image')) {
      $file                  = $request->file('preview_image');
      $data['preview_image'] = $file->store('/uploads', 'public');
    }
    $product = Product::query()->create($data);
    $tags    = $request->get('tags');
    $product->tags()->attach($tags);
    $colors = $request->get('colors');
    $product->colors()->attach($colors);

    return redirect()->route('admin.products.index');
  }
}
