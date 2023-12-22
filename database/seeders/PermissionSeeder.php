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
        'admission.create',
        'admission.show',
        'admission.edit',
        'admission.destroy',
        'department.create',
        'department.show',
        'department.edit',
        'department.destroy'
      ];

      foreach ($permissions as $permission) {
        Permission::create(['name' => $permission]);
      }
    }
}
