<?php

namespace App\Console\Commands;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class InstallPermissionsCommand extends Command
{

  protected $signature = 'install:permissions';

  protected $description = 'Установка прав доступа';

  public function handle(): void
  {
    $this->installRoles();
    $this->installPermissions();
    $this->info('Установка ролей и прав доступа...');
  }

  private function installRoles(): void
  {
    Role::query()->firstOrCreate([
      'name'  => 'super admin',
      'super' => true,
    ]);
    DB::table('role_user')->insert([
      'role_id' => 1,
      'user_id' => 1,
    ]);
  }

  private function installPermissions(): void
  {
    $policies = Gate::policies();
    foreach ($policies as $model => $policy) {
      $methods = $this->getPolicyMethods($policy);

      foreach ($methods as $method) {
        Permission::query()
          ->firstOrCreate([
            'model'  => $model,
            'action' => $method,
          ],[
            'model'  => $model,
            'action' => $method,
          ]);
      }
    }
  }

  private function getPolicyMethods(string $policy): array
  {
    $methods = get_class_methods($policy);

    return array_filter($methods, function (string $method) {
      return !in_array($method, [
        'denyWithStatus',
        'denyAsNotFound',
      ]);
    });
  }
}
