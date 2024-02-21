<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Position extends Model
{
  use HasTranslations;

  protected    $fillable     = ['department_id', 'title'];
  public array $translatable = ['title'];
  protected    $casts        = ['title' => 'array'];

  public function department(): BelongsTo
  {
    return $this->belongsTo(Department::class);
  }

  public function employees(): HasMany
  {
    return $this->hasMany(Employee::class);
  }

  public function employeePosition(): BelongsTo
  {
    return $this->belongsTo(EmployeePosition::class);
  }
}
