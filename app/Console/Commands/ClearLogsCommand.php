<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ClearLogsCommand extends Command
{

    protected $signature = 'clear:logs';


    protected $description = 'Очистка логов и дебаг файлов';


    public function handle(): void
    {
      exec('echo "" > ' . storage_path('logs/laravel.log'));
      Artisan::call('debugbar:clear');
      $this->info('Лог файлы успешно очищен...');
    }
}
