<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import CategoryGrid from '@/components/home/CategoryGrid.vue';
import HeroBanner from '@/components/home/HeroBanner.vue';
import ProductCard from '@/components/home/ProductCard.vue';
import StorefrontLayout from '@/components/layout/StorefrontLayout.vue';
import type { Category, Product } from '@/types';

defineProps<{
    categories: Category[];
    products: Product[];
}>();
</script>

<template>
    <Head title="الرئيسية" />

    <StorefrontLayout>
        <HeroBanner />

        <CategoryGrid :categories="categories" />

        <section class="mx-auto max-w-7xl px-4 pt-6 pb-14 sm:px-6">
            <div
                v-if="products.length > 0"
                class="grid grid-cols-2 gap-3 sm:gap-4 lg:grid-cols-4"
            >
                <ProductCard
                    v-for="(product, index) in products"
                    :key="product.id"
                    :product="product"
                    :index="index"
                />
            </div>

            <div
                v-else
                class="rounded-3xl border border-dashed border-border bg-white/60 px-6 py-14 text-center"
            >
                <p class="text-base font-bold text-ink">
                    لا توجد منتجات متاحة حاليًا
                </p>
                <p class="mt-1 text-sm text-muted-foreground">
                    بنجهّز لك عروض جديدة، ارجع لنا بعد شوية.
                </p>
            </div>
        </section>
    </StorefrontLayout>
</template>
