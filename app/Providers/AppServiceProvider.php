<?php

namespace App\Providers;

use App\Models\Language;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

  public function register(): void
  {
    //
  }

  public function boot(): void
  {
    Paginator::useBootstrapFive();

    if (Schema::hasTable((new Language())->getTable())) {
      $this->setDefaultLanguage();
      $this->setFallbackLanguage();
    }
    Json::encodeUsing(function (mixed $value) {
      return json_encode($value, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    });
    //    request queries
    //    if (app()->isLocal()) {
    //      DB::listen(function ($query) {
    //        info($query->sql, $query->bindings);
    //      });
    //    }
  }

  private function setDefaultLanguage(): void
  {
    $language = Language::findDefault();

    $language && app()->setLocale($language->id);
  }

  private function setFallbackLanguage(): void
  {
    $language = Language::findFallback();

    $language && app()->setFallbackLocale($language->id);
  }
}
