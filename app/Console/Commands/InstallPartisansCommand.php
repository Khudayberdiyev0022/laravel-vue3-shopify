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
    $filepath  = public_path('files/csv/partisans.csv');
    $partisans = csvToArray($filepath);
    $data      = [];
    foreach ($partisans as $key => $partisan) {
      $data['title'] = json_encode(["uz" => $partisan['name_uz'], "ru" => $partisan['name_ru']], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
      $data['id']    = ++$key;
      \App\Models\Partisan::query()->upsert($data, 'id');
    }
  }
}
