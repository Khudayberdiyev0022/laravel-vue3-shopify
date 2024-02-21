<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class DegreeLevel extends Model
{
  use HasTranslations;
  protected    $fillable     = ['title'];
  public array $translatable = ['title'];
  protected    $casts        = ['title' => 'array'];
}
