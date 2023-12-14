<?php


if (!function_exists('activeLink')) {
  function activeLink(string|array $name, $class = 'active'): string
  {
    return request()->routeIs($name) ? $class : '';
  }
}
