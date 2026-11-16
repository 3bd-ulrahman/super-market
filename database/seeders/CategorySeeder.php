<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Fruits & Vegetables' => 'fruits-vegetables',
            'Dairy & Eggs' => 'dairy-eggs',
            'Meat & Poultry' => 'meat-poultry',
            'Bakery' => 'bakery',
            'Beverages' => 'beverages',
            'Snacks' => 'snacks',
            'Frozen Foods' => 'frozen-foods',
            'Household' => 'household',
        ];

        foreach ($categories as $name => $slug) {
            Category::updateOrCreate(
                ['slug' => $slug],
                ['name' => $name],
            );
        }
    }
}
