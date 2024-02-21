<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LanguageRouteMiddleware
{
  private string|null $prefix;
  private string $currentLanguage;
  private string $defaultLanguage;

  public function __construct()
  {
    $this->prefix = Language::routePrefix();
    $this->currentLanguage = app()->getLocale();
    $this->defaultLanguage = Language::findDefault()->id ?? 'uz';
  }

  // для определения префикса

  public function handle(Request $request, Closure $next): Response
  {

    // для определения текущего языка
    if ($this->currentLanguage === $this->defaultLanguage) {
      if (is_null($this->prefix)) {
        return $next($request);
      }

      return $this->redirect($request);
    }

    // для определения префикса
    if ($this->prefix === $this->currentLanguage) {
      return $next($request);
    }

    return $this->redirect($request);
  }

  private function redirect(Request $request): RedirectResponse
  {
    $url = $this->currentLanguage;

    // если нет префикса
    if ($this->currentLanguage === $this->defaultLanguage) {
      $url = '';
    }

    $segments = $request->segments();

    $this->prefix && array_shift($segments);
    if ($path = implode('/', $segments)) {
      $url .= "/{$path}";
    }

    if ($query = $request->getQueryString()) {
      $url .= "?{$query}";
    }

    return redirect($url);
  }
}
