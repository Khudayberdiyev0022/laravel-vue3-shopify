<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
  protected     $fillable = ['id', 'name', 'active', 'default', 'fallback'];
  protected     $casts    = ['active' => 'boolean', 'default' => 'boolean', 'fallback' => 'boolean'];
  protected $keyType = 'string';
  public $incrementing = false;

  public function getStateText(): string
  {
    $state = [];

    if ($this->active) {
      $state[] = 'Активен';
    }
    if ($this->default) {
      $state[] = 'По умолчанию';
    }
    if ($this->fallback) {
      $state[] = 'Резервный';
    }

    return implode(', ', $state);
  }
}
