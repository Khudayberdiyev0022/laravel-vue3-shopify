<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IndexProductResource extends JsonResource
{
  public function toArray(Request $request): array
  {

    return [
      'id'             => $this->id,
      'title'          => $this->title,
      'description'    => $this->description,
      'content'        => $this->when(request()->routeIs('admin.products.show'), $this->content),
      'price'          => $this->price,
      'count'          => $this->count,
      'is_published'   => $this->is_published,
      'image_url'      => $this->imageUrl,
      'category'       => CategoryResource::make($this->category),
    ];
  }
}
