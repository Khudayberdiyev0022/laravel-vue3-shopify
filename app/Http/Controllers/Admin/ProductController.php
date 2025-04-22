<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
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
    return view('admin.products.create');
    }

  public function store(Request $request)
  {
    $data = $request->validate([
      'name'       => 'required',
      'price'      => 'required',
      'count'      => 'required',
      'preview_image' => 'required',
    ]);

    $product = Product::query()->create($data);
    $tags = $request->get('tags');
    $product->tags()->sync($tags);
    $colors = $request->get('colors');
    $product->colors()->sync($colors);

    return redirect()->route('admin.products.index');
    }
}
