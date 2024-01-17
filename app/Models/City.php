<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Translatable\HasTranslations;

class City extends Model
{
  use HasTranslations;

  protected    $fillable     = ['region_id', 'title'];
  public array $translatable = ['title'];
  protected    $casts        = ['title' => 'array'];

  public function region(): HasOne
  {
    return $this->hasOne(Region::class, 'id', 'region_id');
  }
}
