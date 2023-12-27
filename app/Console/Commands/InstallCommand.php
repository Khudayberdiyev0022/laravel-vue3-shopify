<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{

  protected $signature   = 'install';
  protected $description = 'Установить все консолные комманды';

  public function handle(): void
  {
    $this->call(InstallLanguageCommand::class);
    $this->info('Установка консольных комманды успешно завершено...');
  }
}
