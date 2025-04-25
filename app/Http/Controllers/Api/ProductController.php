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
    $products = Product::query()->paginate(10);

    return $this->responsePagination($products,IndexProductResource::collection($products));
//    return $this->error($products);
//    return $this->success(IndexProductResource::collection($products));
  }

  public function show(Product $product)
  {
    return ProductResource::make($product);
  }
}
