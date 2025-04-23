<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductMinResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          'id'           => $this->id,
          'title'        => $this->title,
          'description'  => $this->description,
          'content'      => $this->when(request()->routeIs('admin.products.show'), $this->content),
          'price'        => $this->price,
          'count'        => $this->count,
          'is_published' => $this->is_published,
          'image_url'    => $this->imageUrl,
          'category'     => CategoryResource::make($this->category),
          'colors' => ColorResource::collection($this->colors),
        ];
    }
}
