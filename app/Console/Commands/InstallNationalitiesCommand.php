<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallNationalitiesCommand extends Command
{

  protected $signature = 'install:nationalities';

  protected $description = 'Установка национальностей';

  public function handle(): void
  {
    $this->installNationalities();
    $this->info('Установка национальностей...');
  }

  private function installNationalities(): void
  {
    $nationalities = [
      ['id' => 1, 'title' => ['uz' => 'O\'zbek', 'ru' => 'Узбек']],
      ['id' => 2, 'title' => ['uz' => 'Rus', 'ru' => 'Русский']],
      ['id' => 3, 'title' => ['uz' => 'Qoralpoq', 'ru' => 'Каракалпак']],
      ['id' => 4, 'title' => ['uz' => 'Tojik', 'ru' => 'Таджик']],
      ['id' => 5, 'title' => ['uz' => 'Turkman', 'ru' => 'Туркмен']],
      ['id' => 6, 'title' => ['uz' => 'Arman', 'ru' => 'Армянин']],
      ['id' => 7, 'title' => ['uz' => 'Gruzin', 'ru' => 'Грузин']],
      ['id' => 8, 'title' => ['uz' => 'Qozoq', 'ru' => 'Казах']],
      ['id' => 9, 'title' => ['uz' => 'Qirg\'iz', 'ru' => 'Киргиз']],
      ['id' => 10, 'title' => ['uz' => 'Koreys', 'ru' => 'Кореец']],
    ];
    foreach ($nationalities as $nationality) {
      $nationality['title'] = json_encode($nationality['title'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
      \App\Models\Nationality::query()->upsert($nationality, 'id');
    }
  }
}
