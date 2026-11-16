<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $slug = fake()->unique()->slug(3);

        return [
            'category_id' => Category::factory(),
            'name' => Str::headline($slug),
            'slug' => $slug,
            'barcode' => fake()->unique()->ean13(),
            'price' => fake()->randomFloat(2, 1, 500),
            'unit' => fake()->randomElement(['١ كجم', '١ لتر', '٢٥٠ جم', '٥ أرغفة']),
            'in_stock' => fake()->boolean(90),
        ];
    }

    /**
     * Indicate that the product is in stock.
     */
    public function inStock(): static
    {
        return $this->state(fn (): array => [
            'in_stock' => true,
        ]);
    }

    /**
     * Indicate that the product is out of stock.
     */
    public function outOfStock(): static
    {
        return $this->state(fn (): array => [
            'in_stock' => false,
        ]);
    }
}
