<?php

namespace App\Console\Commands;

use App\Models\Language;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Lang;

class InstallLanguageCommand extends Command
{

  protected $signature = 'install:languages';

  protected $description = 'Установить языки';

  public function handle(): void
  {
    $this->installLanguages();
    $this->info('Языки установлены...');
  }

  private function installLanguages(): void
  {
    $languages = [
      ['id' => 'uz', 'name' => 'O\'zbekcha', 'active' => true, 'default' => true, 'fallback' => false],
      ['id' => 'ru', 'name' => 'Русский', 'active' => true, 'default' => false, 'fallback' => true],
      ['id' => 'ar', 'name' => 'Arabic', 'active' => false, 'default' => false, 'fallback' => false],
    ];
    // Request to db 1 time
    Language::query()->upsert($languages, ['id']);
  }
}
