<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallDepartmentsCommand extends Command
{

  protected $signature = 'install:departments';

  protected $description = 'Установка отделов и должностей';

  public function handle(): void
  {
    $this->installDepartments();
    $this->installPositions();
    $this->info('Установка отделов и должностей...');
  }

  private function installDepartments(): void
  {
    $departments = [
      ['id' => 1, 'type' => 0, 'title' => ['uz' => 'Bo\'lim yo\'q', 'ru' => 'Без отдела']],
      ['id' => 2, 'type' => 0, 'title' => ['uz' => 'Rektorat', 'ru' => 'Ректорат']],
      ['id' => 3, 'type' => 0, 'title' => ['uz' => 'AKT bo\'limi', 'ru' => 'Отдел АКТ']],
      ['id' => 4, 'type' => 0, 'title' => ['uz' => 'Buxgalteriya bo\'limi', 'ru' => 'Отдел Бухгалтерии']],
      ['id' => 5, 'type' => 0, 'title' => ['uz' => 'Kadrlar bilan ishlash bo\'limi', 'ru' => 'Отдел кадров']],
      ['id' => 6, 'type' => 0, 'title' => ['uz' => 'Yuridik bo\'limi', 'ru' => 'Отдел юридического сопровождения']],
      ['id' => 7, 'type' => 1, 'title' => ['uz' => 'Fuqarolik xuquqi', 'ru' => 'Гражданско-правовых дисциплин']],
      ['id' => 8, 'type' => 1, 'title' => ['uz' => 'Iqtisodiy xuquq', 'ru' => 'Экономическо-правовых дисциплин']],
      ['id' => 9, 'type' => 1, 'title' => ['uz' => 'Jinoyat xuquqi', 'ru' => 'Уголовно-правовых дисциплин']],
      ['id' => 10, 'type' => 1, 'title' => ['uz' => 'Ma\'muriy xuquq', 'ru' => 'Административно-правовых дисциплин']],
    ];
    foreach ($departments as $department) {
      $department['title'] = json_encode($department['title'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
      \App\Models\Department::query()->upsert($department, 'id');
    }
  }

  private function installPositions(): void
  {
    $positions = [
      ['id' => 1, 'department_id' => 1, 'title' => ['uz' => 'Lavozim yo\'q', 'ru' => 'Без должности']],
      ['id' => 2, 'department_id' => 2, 'title' => ['uz' => 'Rektor', 'ru' => 'Ректор']],
      ['id' => 3, 'department_id' => 3, 'title' => ['uz' => 'Dasturchi', 'ru' => 'Программист']],
      ['id' => 4, 'department_id' => 3, 'title' => ['uz' => 'Tizim administratori', 'ru' => 'Системный администратор']],
      ['id' => 5, 'department_id' => 4, 'title' => ['uz' => 'Bosh xisobchi', 'ru' => 'Главный бухгалтер']],
      ['id' => 6, 'department_id' => 5, 'title' => ['uz' => 'Bo\'lim boshlig\'i', 'ru' => 'Начальник отдела']],
    ];
    foreach ($positions as $position) {
      $position['title'] = json_encode($position['title'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
      \App\Models\Position::query()->upsert($position, 'id');
    }
  }
}
