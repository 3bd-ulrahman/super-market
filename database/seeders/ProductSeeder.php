<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::all()->each(function (Category $category): void {
            if ($category->products()->exists()) {
                return;
            }

            Product::factory()
                ->count(8)
                ->create(['category_id' => $category->id]);
        });
    }
}
