<script setup lang="ts">
import {
    Apple,
    BadgePercent,
    Croissant,
    CupSoda,
    Drumstick,
    Milk,
    ShoppingBasket,
    type LucideIcon,
} from 'lucide-vue-next';
import type { Category } from '@/types';
import { formatNumber } from '@/lib/format';

defineProps<{
    categories: Category[];
}>();

const visuals: Record<string, { icon: LucideIcon; background: string }> = {
    offers: { icon: BadgePercent, background: 'var(--color-pastel-apricot)' },
    beverages: { icon: CupSoda, background: 'var(--color-pastel-blue)' },
    grocery: { icon: ShoppingBasket, background: 'var(--color-pastel-sand)' },
    bakery: { icon: Croissant, background: 'var(--color-pastel-peach)' },
    'meat-poultry': {
        icon: Drumstick,
        background: 'var(--color-pastel-lilac)',
    },
    'dairy-eggs': { icon: Milk, background: 'var(--color-pastel-mint)' },
    'fruits-vegetables': {
        icon: Apple,
        background: 'var(--color-pastel-cream)',
    },
};

function visualFor(slug: string): { icon: LucideIcon; background: string } {
    return (
        visuals[slug] ?? {
            icon: ShoppingBasket,
            background: 'var(--color-pastel-cream)',
        }
    );
}
</script>

<template>
    <section id="categories" class="mx-auto max-w-7xl px-4 pt-8 pb-2 sm:px-6">
        <div class="flex items-end justify-between gap-3">
            <h2 class="text-xl font-extrabold text-ink sm:text-2xl">
                الأقسام الرئيسية
            </h2>
            <span class="text-xs font-medium text-muted-foreground">
                {{ formatNumber(categories.length) }} أقسام
            </span>
        </div>

        <div class="mt-5 grid grid-cols-3 gap-3 sm:grid-cols-4 lg:grid-cols-7">
            <button
                v-for="category in categories"
                :key="category.id"
                type="button"
                class="group flex flex-col items-center gap-2 rounded-3xl bg-white/70 p-3 transition hover:-translate-y-0.5 hover:bg-white hover:shadow-lg hover:shadow-primary/5"
            >
                <span
                    class="grid size-14 place-items-center overflow-hidden rounded-2xl text-primary transition group-hover:scale-105 sm:size-16"
                    :style="{
                        backgroundColor: visualFor(category.slug).background,
                    }"
                >
                    <img
                        v-if="category.image"
                        :src="category.image"
                        :alt="category.name"
                        class="size-full object-cover"
                        loading="lazy"
                    />
                    <component
                        :is="visualFor(category.slug).icon"
                        v-else
                        class="size-7"
                    />
                </span>
                <span
                    class="text-center text-[11px] leading-tight font-semibold text-ink sm:text-sm"
                    >{{ category.name }}</span
                >
            </button>
        </div>
    </section>
</template>
