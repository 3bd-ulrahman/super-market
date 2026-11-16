<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::where('in_stock', true)->get();

        if ($products->isEmpty()) {
            return;
        }

        User::all()->each(function (User $user) use ($products): void {
            $cart = Cart::firstOrCreate(['user_id' => $user->id]);

            $products
                ->random(min(fake()->numberBetween(2, 5), $products->count()))
                ->each(function (Product $product) use ($cart): void {
                    CartItem::firstOrCreate(
                        [
                            'cart_id' => $cart->id,
                            'product_id' => $product->id,
                        ],
                        ['quantity' => fake()->numberBetween(1, 4)],
                    );
                });
        });
    }
}
