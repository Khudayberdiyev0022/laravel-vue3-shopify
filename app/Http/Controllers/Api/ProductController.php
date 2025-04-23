<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\IndexProductResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function index()
  {
    $products = Product::query()->get();

    return IndexProductResource::collection($products);
  }

  public function show(Product $product)
  {
    return ProductResource::make($product);
  }
}
