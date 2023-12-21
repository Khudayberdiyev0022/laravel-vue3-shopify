<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Role::create(['name' => 'Super Admin']);
    $admin = Role::create(['name' => 'Admin']);
    $teacher = Role::create(['name' => 'Teacher']);
    $student = Role::create(['name' => 'Student']);
//
//    $admin->givePermissionTo([
//      'admissions.create',
//      'admissions.show',
//      'admissions.edit',
//      'admissions.destroy',
//      'departments.create',
//      'departments.show',
//      'departments.edit',
//      'departments.destroy'
//    ]);
//
//    $teacher->givePermissionTo([
//      'departments.create',
//      'departments.show',
//      'departments.edit',
//      'departments.destroy'
//    ]);
  }
}
