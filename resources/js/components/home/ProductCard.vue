<script setup lang="ts">
import { Plus } from 'lucide-vue-next';
import { Badge } from '@/components/ui/badge';
import { Button } from '@/components/ui/button';
import { formatPrice } from '@/lib/format';
import type { Product } from '@/types';

const props = defineProps<{
    product: Product;
    index: number;
}>();

const backgrounds = [
    'var(--color-pastel-cream)',
    'var(--color-pastel-blue)',
    'var(--color-pastel-peach)',
    'var(--color-pastel-mint)',
    'var(--color-pastel-sand)',
    'var(--color-pastel-lilac)',
    'var(--color-pastel-apricot)',
];

const emojis: Record<string, string> = {
    tomato: '🍅',
    'full-cream-milk': '🥛',
    rice: '🍚',
    'baladi-bread': '🍞',
    'romy-cheese': '🧀',
    cucumber: '🥒',
    'orange-juice': '🧃',
    eggs: '🥚',
};
</script>

<template>
    <article
        class="group flex flex-col overflow-hidden rounded-3xl border border-border/70 bg-card shadow-sm transition hover:-translate-y-0.5 hover:shadow-xl hover:shadow-primary/5"
    >
        <div
            class="relative flex h-32 items-center justify-center sm:h-40"
            :style="{
                backgroundColor: backgrounds[index % backgrounds.length],
            }"
        >
            <Badge variant="accent" class="absolute end-3 top-3"
                >خصم جديد</Badge
            >
            <img
                v-if="product.image"
                :src="product.image"
                :alt="product.name"
                class="size-full object-cover"
                loading="lazy"
            />
            <span
                v-else
                class="text-5xl drop-shadow-sm transition group-hover:scale-110 sm:text-6xl"
                aria-hidden="true"
                >{{ emojis[product.slug] ?? '🛍️' }}</span
            >
        </div>

        <div class="flex flex-1 flex-col p-3.5 sm:p-4">
            <h3 class="text-sm font-bold text-ink sm:text-base">
                {{ product.name }}
            </h3>
            <p v-if="product.unit" class="mt-0.5 text-xs text-muted-foreground">
                {{ product.unit }}
            </p>

            <div class="mt-3 flex items-center justify-between gap-2">
                <span class="text-sm font-extrabold text-primary sm:text-base">
                    {{ formatPrice(product.price) }}
                </span>
                <Button
                    type="button"
                    class="h-9 shrink-0 px-3 text-xs"
                    :aria-label="`أضف ${product.name} إلى السلة`"
                >
                    <Plus class="size-4" />
                    <span class="lg:hidden">أضف</span>
                </Button>
            </div>
        </div>
    </article>
</template>
