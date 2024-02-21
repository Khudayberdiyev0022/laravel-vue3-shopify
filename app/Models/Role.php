<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Role extends Model
{
  protected $fillable = ['name', 'super'];
  public    $casts    = ['super' => 'boolean'];

  public function permissions(): BelongsToMany
  {
    return $this->belongsToMany(Permission::class, 'role_permission');
  }

  public function users(): BelongsToMany
  {
    return $this->belongsToMany(User::class, 'role_user');
  }

  public function getName(): string
  {
    return Str::title($this->name);
  }
}
