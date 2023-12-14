<?php

namespace App\Traits;

trait Locale
{
  public function getTitle()
  {
    $title = 'title_'.app()->getLocale();

    return $this->$title;
  }
}
