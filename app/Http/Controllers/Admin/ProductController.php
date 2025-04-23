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
      'category_id'    => 'required',
      'title'          => 'required',
      'description'    => 'nullable',
      'content'        => 'nullable',
      'price'          => 'required',
      'count'          => 'required',
      'is_published'   => 'nullable',
      'preview_image'  => 'nullable',
      'product_images' => 'nullable|array',
      'color_id'       => 'nullable|array',
      'tag_id'         => 'nullable|array',
    ]);
    if ($request->hasFile('preview_image')) {
      $file                  = $request->file('preview_image');
      $data['preview_image'] = $file->store('/uploads', 'public');
    }
//dd($data);
    unset($data['color_id'], $data['tag_id'], $data['product_images']);
    $product = Product::query()->create($data);
    if ($request->hasFile('product_images')) {
      $files = $request->file('product_images');
      foreach ($files as $file) {
        $url = $file->store('/uploads', 'public');
        $product->productImages()->create(['url' => $url]);
      }
    }
    $tags = $request->get('tag_id');
    $product->tags()->attach($tags);
    $colors = $request->get('color_id');
    $product->colors()->attach($colors);

    return redirect()->route('admin.products.index');
  }
}
