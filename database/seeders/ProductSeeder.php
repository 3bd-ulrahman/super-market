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
        $products = [
            [
                'name' => 'طماطم',
                'slug' => 'tomato',
                'barcode' => '6221031000011',
                'unit' => '١ كجم',
                'price' => 24.50,
                'category' => 'fruits-vegetables',
            ],
            [
                'name' => 'لبن كامل الدسم',
                'slug' => 'full-cream-milk',
                'barcode' => '6221031000028',
                'unit' => '١ لتر',
                'price' => 42.00,
                'category' => 'dairy-eggs',
            ],
            [
                'name' => 'أرز',
                'slug' => 'rice',
                'barcode' => '6221031000035',
                'unit' => '٢ كجم',
                'price' => 68.00,
                'category' => 'grocery',
            ],
            [
                'name' => 'عيش بلدي',
                'slug' => 'baladi-bread',
                'barcode' => '6221031000042',
                'unit' => '٥ أرغفة',
                'price' => 12.00,
                'category' => 'bakery',
            ],
            [
                'name' => 'جبنة رومي',
                'slug' => 'romy-cheese',
                'barcode' => '6221031000059',
                'unit' => '١ كجم',
                'price' => 185.00,
                'category' => 'dairy-eggs',
            ],
            [
                'name' => 'خيار',
                'slug' => 'cucumber',
                'barcode' => '6221031000066',
                'unit' => '٢٥٠ جم',
                'price' => 18.00,
                'category' => 'fruits-vegetables',
            ],
            [
                'name' => 'عصير برتقال',
                'slug' => 'orange-juice',
                'barcode' => '6221031000073',
                'unit' => '١ لتر',
                'price' => 35.00,
                'category' => 'beverages',
            ],
            [
                'name' => 'بيض',
                'slug' => 'eggs',
                'barcode' => '6221031000080',
                'unit' => '٣٠ بيضة',
                'price' => 165.00,
                'category' => 'dairy-eggs',
            ],
        ];

        $categoryIds = Category::query()->pluck('id', 'slug');

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['slug' => $product['slug']],
                [
                    'category_id' => $categoryIds[$product['category']],
                    'name' => $product['name'],
                    'barcode' => $product['barcode'],
                    'unit' => $product['unit'],
                    'price' => $product['price'],
                    'in_stock' => true,
                ],
            );
        }
    }
}
