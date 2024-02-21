<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\HasPermissions;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Translatable\HasTranslations;

class User extends Authenticatable
{
  use Notifiable, HasPermissions, HasTranslations;

  public array $translatable = ['name'];
  protected    $fillable     = ['name', 'email', 'password', 'admin',];
  protected    $hidden       = ['password',];
  protected    $casts        = ['admin' => 'boolean', 'name' => 'array', 'password' => 'hashed',];


}
