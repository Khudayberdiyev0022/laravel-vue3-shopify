<?php

namespace App\Console\Commands;

use App\Models\Translation;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class InstallTranslationsCommand extends Command
{

  protected $signature = 'install:translations';

  protected $description = 'Перенести переводы в базу данных';

  private array $ignore = ['http-statuses'];

  public function handle(): void
  {
    $this->installTranslations();
    $this->info('Переводы перенесены...');
  }

  private function installTranslations(): void
  {
    // пройтись по всем папкам lang -> uz, ru ... +
    // пройтись по всем файлам в папке uz -> *.php, ru -> *.php +
    // получить содержимое файла validation.php -> ['key' => 'value'] +
    // создать структуру данных +
    // записать в базу insert +
    $st = Translation::query()->first();
//    dd($st);

    $translations = $this->getTranslations();
    $this->createTranslations($translations);
  }

  private function getTranslations(): array
  {
    $storage = Storage::disk('base');

    $translations = [
      // 'main' => ['home' => ['ru' => 'Главная', 'uz' => 'Bosh sahifa'] ],
      // 'validation' => ['required' => ['ru' => 'Обязательное поле', 'uz' => 'Majburiy'] ],
    ];
//    dd($storage->directories('lang'));
    foreach ($storage->directories('lang') as $folder) {
      $lang = pathinfo($folder, PATHINFO_FILENAME);
//      dump($lang);
//      dump($storage->files($folder));
      foreach ($storage->files($folder) as $file) {
        $group = pathinfo($file, PATHINFO_FILENAME);

        if (in_array($group, $this->ignore)) continue;

        $translations[$group] ??= [];

        $array = Arr::dot(require $file);

        foreach ($array as $key => $text) {
          if (empty($text)) {
            continue;
          }
          $translations[$group][$key]        ??= [];
          $translations[$group][$key][$lang] = $text;
//          dd($group, $key, $lang, $text);
        }
      }
    }

    return $translations;
  }

  private function createTranslations(array $translations): void
  {
    $models = Translation::query()->get();

    foreach ($translations as $group => $keys) {
      foreach ($keys as $key => $text) {
        $model = $models->where('group', $group)->where('key', $key)->first() ?: new Translation();
        $text  = ($model->text ?? []) + $text;
        $model->fill(compact('group', 'key', 'text'))->save();
      }
    }
  }
}
