<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallRegionsCommand extends Command
{

  protected $signature   = 'install:regions';
  protected $description = 'Установка регионов';

  public function handle(): void
  {
    $this->installRegions();
    $this->info('Установка регионов...');
  }

  private function installRegions(): void
  {
    $regions = [
      ['id' => 1, 'title' => ['uz' => 'Andijon vil.', 'ru' => 'Андижанская обл.',]],
      ['id' => 2, 'title' => ['uz' => 'Buxoro vil.', 'ru' => 'Бухарская обл.',]],
      ['id' => 3, 'title' => ['uz' => 'Jizzax vil.', 'ru' => 'Джизакская обл.',]],
      ['id' => 4, 'title' => ['uz' => 'Qoraqalpog`iston Respublikasi', 'ru' => 'Республика Каракалпакстан',]],
      ['id' => 5, 'title' => ['uz' => 'Qashqadaryo vil.', 'ru' => 'Кашкадарьинская обл.',]],
      ['id' => 6, 'title' => ['uz' => 'Navoiy vil.', 'ru' => 'Навоийская обл',]],
      ['id' => 7, 'title' => ['uz' => 'Namangan vil.', 'ru' => 'Наманганская обл.',]],
      ['id' => 8, 'title' => ['uz' => 'Samarqand vil.', 'ru' => 'Самаркандская обл.',]],
      ['id' => 9, 'title' => ['uz' => 'Surhandaryo vil.', 'ru' => 'Сурхандарьинская обл.',]],
      ['id' => 10, 'title' => ['uz' => 'Sirdaryo vil.', 'ru' => 'Сырдарьинская обл.',]],
      ['id' => 11, 'title' => ['uz' => 'Toshkent vil.', 'ru' => 'Ташкентская обл.',]],
      ['id' => 12, 'title' => ['uz' => 'Farg`ona vil.', 'ru' => 'Ферганская обл.',]],
      ['id' => 13, 'title' => ['uz' => 'Xorazm vil.', 'ru' => 'Хорезмская обл.',]],
    ];
    foreach ($regions as $region) {
      $region['title'] = json_encode($region['title'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
      \App\Models\Region::query()->upsert($region, 'id');
    }
  }
}
