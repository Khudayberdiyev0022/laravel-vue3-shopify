<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
  protected $model = Product::class;
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'category_id'   => $this->faker->numberBetween(1, 3),
      'title'         => $this->faker->name(),
      'description'   => $this->faker->paragraph(),
      'content'       => $this->faker->text(),
      'preview_image' => $this->faker->imageUrl(),
      'price'         => $this->faker->numberBetween(100, 1000),
      'count'         => $this->faker->numberBetween(1, 10),
      'is_published'  => $this->faker->boolean(),
      'status'        => $this->faker->numberBetween(1, 4),
    ];
  }
}
