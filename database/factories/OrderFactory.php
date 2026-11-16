<?php

namespace Database\Factories;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subtotal = fake()->randomFloat(2, 20, 1000);
        $deliveryFee = 25.00;

        return [
            'user_id' => User::factory(),
            'subtotal' => $subtotal,
            'delivery_fee' => $deliveryFee,
            'total' => round($subtotal + $deliveryFee, 2),
            'delivery_address' => fake()->streetAddress(),
            'status' => fake()->randomElement(OrderStatus::cases()),
        ];
    }

    /**
     * Indicate the order status.
     */
    public function forStatus(OrderStatus $status): static
    {
        return $this->state(fn (): array => [
            'status' => $status,
        ]);
    }
}
