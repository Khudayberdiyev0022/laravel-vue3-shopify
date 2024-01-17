<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallPartisansCommand extends Command
{

  protected $signature = 'install:partisans';

  protected $description = 'Установка партийность';

  public function handle(): void
  {
    $this->installPartisans();
    $this->info('Установка партийность...');
  }

  private function installPartisans(): void
  {
    $partisans = [
      ['id' => 1, 'title' => ['uz' => 'Partiyaviyligi yo\'q', 'ru' => 'Без партии']],
      ['id' => 2, 'title' => ['uz' => '“Milliy tiklanish” demokratik partiyasi', 'ru' => 'Демократическая партия «Миллий тикланиш»']],
      ['id' => 3, 'title' => ['uz' => 'O\'zbekiston liberal-demokratik partiyasi', 'ru' => 'Либерально-демократическая партия Узбекистана']],
      ['id' => 4, 'title' => ['uz' => 'O‘zbekiston Xalq demokratik partiyasi', 'ru' => 'Народно-демократическая партия Узбекистана']],
      ['id' => 5, 'title' => ['uz' => '“Adolat” sotsial-demokratik partiyasi', 'ru' => 'Социал-демократическая партия «Адолат»']],
      ['id' => 6, 'title' => ['uz' => 'O‘zbekiston Ekologik partiyasi', 'ru' => 'Экологическая партия Узбекистана']],
    ];
    foreach ($partisans as $partisan) {
      $partisan['title'] = json_encode($partisan['title'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
      \App\Models\Partisan::query()->upsert($partisan, 'id');
    }
  }
}
