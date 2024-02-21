<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Department extends Model
{
  use HasTranslations;

  protected    $fillable     = ['type', 'title'];
  public array $translatable = ['title'];
  protected    $casts        = ['type' => 'boolean', 'title' => 'array'];

  public function positions(): HasMany
  {
    return $this->hasMany(Position::class);
  }

  public function employeePosition(): HasMany
  {
    return $this->hasMany(EmployeePosition::class);
  }
}
