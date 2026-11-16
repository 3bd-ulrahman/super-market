<?php

use App\Models\Category;
use App\Models\Product;
use Inertia\Testing\AssertableInertia;

test('home page renders the catalog', function () {
    $category = Category::factory()->create([
        'name' => 'خضار وفاكهة',
        'slug' => 'fruits-vegetables',
    ]);

    Product::factory()
        ->count(2)
        ->for($category)
        ->inStock()
        ->create(['unit' => '١ كجم']);

    $this->get(route('home'))
        ->assertOk()
        ->assertInertia(fn (AssertableInertia $page) => $page
            ->component('Home')
            ->has('categories', 1)
            ->where('categories.0.slug', 'fruits-vegetables')
            ->has('products', 2)
            ->where('products.0.unit', '١ كجم')
            ->where('products.0.category.slug', 'fruits-vegetables')
            ->where('products.0.image', null)
        );
});

test('home page hides out of stock products', function () {
    Product::factory()->outOfStock()->create();

    $this->get(route('home'))
        ->assertOk()
        ->assertInertia(fn (AssertableInertia $page) => $page
            ->component('Home')
            ->has('products', 0)
        );
});
