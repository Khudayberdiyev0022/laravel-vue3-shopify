<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $permissions = [
        'admissions-create',
        'admissions-show',
        'admissions-edit',
        'admissions-destroy',
        'departments-create',
        'departments-show',
        'departments-edit',
        'departments-destroy'
      ];

      foreach ($permissions as $permission) {
        Permission::create(['name' => $permission]);
      }
    }
}
