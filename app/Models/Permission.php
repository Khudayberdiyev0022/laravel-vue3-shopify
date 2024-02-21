<?php

namespace App\Models;

use App\Traits\HasPermissions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Permission extends Model
{

  protected $fillable = ['model', 'action', 'comment'];

  public function users(): BelongsToMany
  {
    return $this->belongsToMany(User::class);
  }

  public function getName(): string
  {
    $model  = class_basename($this->model);
    $action = ucfirst($this->action);
    $model = __("main." . strtolower($model));
    $action = __("main." . strtolower($action));
//    dd(__('main.'). strtolower($model), $action);

    return trim("{$model} {$action}");
  }
}
