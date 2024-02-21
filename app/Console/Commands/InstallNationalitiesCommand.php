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
    $filepath      = public_path('files/csv/nationalities.csv');
    $nationalities = csvToArray($filepath);
//    dd($nationalities);
    $data          = [];
    foreach ($nationalities as $key => $nationality) {
      $data['title'] = json_encode(["uz" => $nationality['name_uz'], "ru" => $nationality['name_ru']], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
      $data['id']    = ++$key;
      \App\Models\Nationality::query()->upsert($data, 'id');
    }
  }
}
