<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    /**
     * Display the storefront home page.
     */
    public function __invoke(): Response
    {
        $categories = CategoryResource::collection(
            Category::query()
                ->with('media')
                ->orderBy('id')
                ->get(['id', 'name', 'slug']),
        )->resolve();

        $products = ProductResource::collection(
            Product::query()
                ->with(['category:id,name,slug', 'media'])
                ->where('in_stock', true)
                ->orderBy('id')
                ->limit(8)
                ->get(['id', 'category_id', 'name', 'slug', 'price', 'unit']),
        )->resolve();

        return Inertia::render('Home', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }
}
