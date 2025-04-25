<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    $this->call([
      Category::factory()->count(10)->create(),
      Product::factory()->count(5000)->create(),
    ]);
    // User::factory(10)->create();
    User::factory()->create([
      'name'  => 'Test User',
      'email' => 'test@example.com',
    ]);
  }
}
