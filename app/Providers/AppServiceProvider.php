<?php

namespace App\Providers;

use App\Models\Language;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
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

    //    request queries
    //    if (app()->isLocal()) {
    //      DB::listen(function ($query) {
    //        info($query->sql, $query->bindings);
    //      });
    //    }
    //    request queries end
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
