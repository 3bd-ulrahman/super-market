<?php

namespace Database\Seeders;

use App\Enums\OrderStatus;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();

        if ($products->isEmpty()) {
            return;
        }

        User::all()->each(function (User $user) use ($products): void {
            $orderCount = fake()->numberBetween(1, 3);

            for ($i = 0; $i < $orderCount; $i++) {
                $items = $products
                    ->random(min(fake()->numberBetween(1, 4), $products->count()))
                    ->map(fn (Product $product): array => [
                        'product_id' => $product->id,
                        'price_at_purchase' => $product->price,
                        'quantity' => fake()->numberBetween(1, 3),
                    ]);

                $subtotal = $items->sum(
                    fn (array $item): float => (float) $item['price_at_purchase'] * $item['quantity'],
                );
                $deliveryFee = 25.00;

                $order = $user->orders()->create([
                    'subtotal' => $subtotal,
                    'delivery_fee' => $deliveryFee,
                    'total' => round($subtotal + $deliveryFee, 2),
                    'delivery_address' => fake()->streetAddress(),
                    'status' => fake()->randomElement(OrderStatus::cases()),
                ]);

                $order->items()->createMany($items->all());
            }
        });
    }
}
