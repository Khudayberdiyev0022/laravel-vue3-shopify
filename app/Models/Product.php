<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
 use HasFactory;
  protected $table = 'products';
  protected $guarded = [];
  public function tags(): BelongsToMany
  {
    return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id');
  }
  public function colors(): BelongsToMany
  {
    return $this->belongsToMany(Color::class, 'color_products', 'product_id', 'color_id');
  }
  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function getImageUrlAttribute(): string
  {
    return url('storage/'.$this->preview_image);
  }

  public function productImages(): HasMany
  {
    return $this->hasMany(ProductImage::class);
  }
}
