<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
  protected $table = 'products';
  protected $guarded = [];
  public function tags(): BelongsToMany
  {
    return $this->belongsToMany(Tag::class, 'product_tag', 'product_id', 'tag_id');
  }
  public function colors(): BelongsToMany
  {
    return $this->belongsToMany(Color::class, 'color_product', 'product_id', 'color_id');
  }
  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function getImageUrlAttribute(): string
  {
    return url('storage/'.$this->preview_image);
  }
}
