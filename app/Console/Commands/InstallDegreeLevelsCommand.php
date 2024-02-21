<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallDegreeLevelsCommand extends Command
{

  protected $signature = 'install:degree-levels';

  protected $description = 'Установка уровня родственников';

  public function handle()
  {
    $this->installDegreeLevels();
    $this->info('Установка уровня родственников...');
  }

  private function installDegreeLevels(): void
  {
    $degreeLevels = [
      ['id' => 1, 'title' => ['uz' => 'Otasi', 'ru' => 'Отец']],
      ['id' => 2, 'title' => ['uz' => 'Onasi', 'ru' => 'Мама']],
      ['id' => 3, 'title' => ['uz' => 'Opasi', 'ru' => 'Старшая сестра']],
      ['id' => 4, 'title' => ['uz' => 'Singlisi', 'ru' => 'Младшая сестра']],
      ['id' => 5, 'title' => ['uz' => 'Akasi', 'ru' => 'Старший брат']],
      ['id' => 6, 'title' => ['uz' => 'Ukasi', 'ru' => 'Младший брат']],
      ['id' => 7, 'title' => ['uz' => 'Turmush o\'rtog\'i', 'ru' => 'Супруг/Супруга']],
      ['id' => 8, 'title' => ['uz' => 'O\'g\'li', 'ru' => 'Сын']],
      ['id' => 9, 'title' => ['uz' => 'Qizi', 'ru' => 'Дочь']],
      ['id' => 10, 'title' => ['uz' => 'Qaynotasi', 'ru' => 'Тесть']],
      ['id' => 11, 'title' => ['uz' => 'Qaynonasi', 'ru' => 'Тешь']],
    ];
    foreach ($degreeLevels as $degreeLevel) {
      $degreeLevel['title'] = json_encode($degreeLevel['title'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
      \App\Models\DegreeLevel::query()->upsert($degreeLevel, 'id');
    }
  }
}
