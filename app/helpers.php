<?php

if (!function_exists('activeLink')) {
  function activeLink(string|array $name, $class = 'active'): string
  {
    return request()->routeIs($name) ? $class : '';
  }
}

if (!function_exists('csvToArray')) {
  function csvToArray($filename = '', $delimiter = ','): bool|array
  {
    if (!file_exists($filename) || !is_readable($filename)) {
      return false;
    }

    $header = null;
    $data   = [];
    if (($handle = fopen($filename, 'r')) !== false) {
      while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
        if (!$header) {
          $header = $row;
        } else {
          $data[] = array_combine($header, $row);
        }
      }
      fclose($handle);
    }

    return $data;
  }
}
