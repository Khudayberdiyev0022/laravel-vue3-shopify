<?php

namespace App\Models;

//use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Validation\ValidationException;
use Spatie\TranslationLoader\LanguageLine;

class Translation extends LanguageLine
{
  /**
   * @throws ValidationException
   * @property string $key
   * @property array  $text
   * @property string $group
   */
  public function scopeFilter(Builder $query, array $filter = []): Builder
  {
    $data = validator($filter, [
      'group'  => 'nullable|string|max:50',
      'key'    => 'nullable|string|max:50',
      'search' => 'nullable|string|max:100',
    ])->validate();


    if ($group = $data['group'] ?? null) {
      $query->where('group', $group);
    }

    if ($key = $data['key'] ?? null) {
      $query->where('key', $key);
    }

    if ($search = $data['search'] ?? null) {
      $query->where('text', 'like', "%{$search}%");
    }

    return $query;
  }
}
