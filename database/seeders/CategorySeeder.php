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
            'عروض ومنتجات جديدة' => 'offers',
            'مشروبات' => 'beverages',
            'بقالة' => 'grocery',
            'مخبوزات' => 'bakery',
            'لحوم ودواجن' => 'meat-poultry',
            'الألبان والبيض' => 'dairy-eggs',
            'خضار وفاكهة' => 'fruits-vegetables',
        ];

        foreach ($categories as $name => $slug) {
            Category::updateOrCreate(
                ['slug' => $slug],
                ['name' => $name],
            );
        }
    }
}
