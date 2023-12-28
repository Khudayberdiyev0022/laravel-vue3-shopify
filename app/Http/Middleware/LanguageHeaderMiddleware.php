<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LanguageHeaderMiddleware
{

  public function handle(Request $request, Closure $next): Response
  {
//    для определения языка в браузере используется заголовок Accept-Language
//      $language = $request->header('Accept-Language');
    $languages = Language::getActive();
    $id        = $languages->pluck('id')->toArray();

    $request->getPreferredLanguage($id);

    return $next($request);
  }
}
