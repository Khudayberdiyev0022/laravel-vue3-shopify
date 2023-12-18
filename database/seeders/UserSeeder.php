<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $superAdmin = \App\Models\User::factory()->create([
      'name'              => 'Super Admin',
      'email'             => 'super@gmail.com',
      'email_verified_at' => now(),
      'password'          => Hash::make('password'),
      'remember_token'    => Str::random(10),
    ]);
    $superAdmin->assignRole('Super Admin');

    $admin = User::factory()->create([
      'name'              => 'Admin',
      'email'             => 'admin@gmail.com',
      'email_verified_at' => now(),
      'password'          => Hash::make('password'),
      'remember_token'    => Str::random(10),
    ]);
    $admin->assignRole('Admin');

    $teacher = User::factory()->create([
      'name'              => 'Teacher',
      'email'             => 'teacher@gmail.com',
      'email_verified_at' => now(),
      'password'          => Hash::make('password'),
      'remember_token'    => Str::random(10),
    ]);
    $teacher->assignRole('Teacher');

    $student = User::factory()->create([
      'name'              => 'Student',
      'email'             => 'student@gmail.com',
      'email_verified_at' => now(),
      'password'          => Hash::make('password'),
      'remember_token'    => Str::random(10),
    ]);
    $student->assignRole('Student');
  }
}
