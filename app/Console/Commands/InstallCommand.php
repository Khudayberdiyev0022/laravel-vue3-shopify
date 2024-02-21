<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{

  protected $signature   = 'install';
  protected $description = 'Установить все консолные комманды';

  public function handle(): void
  {
    $this->call(InstallUsersCommand::class);
    $this->call(InstallPermissionsCommand::class);
    $this->call(InstallNationalitiesCommand::class);
    $this->call(InstallDegreeLevelsCommand::class);
    $this->call(InstallPartisansCommand::class);
    $this->call(InstallDepartmentsCommand::class);
    $this->call(InstallRegionsCommand::class);
    $this->call(InstallLanguagesCommand::class);
    $this->call(InstallTranslationsCommand::class);
    $this->info('Установка консольных комманды успешно завершено...');
  }
}
