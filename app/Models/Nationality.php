<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Nationality extends Model
{
  use HasTranslations;

  protected    $fillable     = ['title'];
  public array $translatable = ['title'];
  protected    $casts        = ['title' => 'array'];

  public function employeeInfo(): HasMany
  {
    return $this->hasMany(EmployeeInfo::class);
  }
}
