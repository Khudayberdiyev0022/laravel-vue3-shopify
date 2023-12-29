<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Language extends Model
{
  protected $fillable     = ['id', 'name', 'active', 'default', 'fallback'];
  protected $casts        = ['active' => 'boolean', 'default' => 'boolean', 'fallback' => 'boolean'];
  protected $keyType      = 'string';
  public    $incrementing = false;

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

  public static function booted(): void
  {
    static::saved(function (self $model) {
      Cache::forget('languages');
    });
    static::deleted(function (self $model) {
      Cache::forget('languages');
    });
  }
  public static function getActive(): Collection|array
  {
    return Cache::remember(
      key: 'languages',
      ttl: now()->addDay(),
      callback: fn() => self::query()->where('active', true)->get(),
    );
  }

  public static function findActive(string $id): Builder|Model|self|null
  {
    return self::getActive()->firstWhere('id', $id);
  }

  public static function findDefault(): Builder|Model|self|null
  {
    return self::getActive()->firstWhere('default', true);
  }

  public static function findFallback(): Builder|Model|self|null
  {
    return self::getActive()->firstWhere('fallback', true);
  }

  public static function routePrefix(): string|null
  {
    $prefix          = request()->segment(1);
    $activeLanguages = static::getActive();
    if ($activeLanguages->doesntContain($prefix)) {
      $prefix = null;
    }

    return $prefix;
  }
}
