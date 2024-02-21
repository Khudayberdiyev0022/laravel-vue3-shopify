<?php

namespace App\Http\Middleware;

use Closure;

class SetLocale
{
  public function handle($request, Closure $next)
  {
    if (session()->has('lang')) {
      $lang = session('lang');
    } else {
      $lang = config('app.locale');
    }
    app()->setLocale($lang);

    return $next($request);
  }
}
