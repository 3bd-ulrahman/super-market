<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),
            'product_id' => Product::factory(),
            'price_at_purchase' => fake()->randomFloat(2, 1, 500),
            'quantity' => fake()->numberBetween(1, 10),
        ];
    }

    /**
     * Indicate that the product no longer exists.
     */
    public function withoutProduct(): static
    {
        return $this->state(fn (): array => [
            'product_id' => null,
        ]);
    }
}
