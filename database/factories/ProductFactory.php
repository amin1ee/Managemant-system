<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => ucfirst($this->faker->unique()->words(3, true)),
            'price' => $this->faker->randomFloat(2, 1, 1500),
            'category_id' => Category::query()->inRandomOrder()->value('id'),
            'supplier_id' => Supplier::query()->inRandomOrder()->value('id'),
            'available' => $this->faker->boolean(85),
            'quantity' => $this->faker->numberBetween(0, 250),
            'photo' => null,
        ];
    }
}
