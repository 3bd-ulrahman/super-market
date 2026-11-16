<script setup lang="ts">
import { ShoppingBasket } from 'lucide-vue-next';
import { Button } from '@/components/ui/button';
import { formatNumber } from '@/lib/format';

withDefaults(
    defineProps<{
        count?: number;
        tone?: 'primary' | 'onPrimary';
    }>(),
    {
        count: 0,
        tone: 'primary',
    },
);
</script>

<template>
    <Button v-if="tone === 'primary'" class="h-11 rounded-xl px-4">
        <ShoppingBasket class="size-5" />
        <span>السلة</span>
        <span
            class="grid size-6 place-items-center rounded-full bg-white/20 text-xs font-bold"
        >
            {{ formatNumber(count) }}
        </span>
    </Button>

    <button
        v-else
        type="button"
        class="relative rounded-full p-1 text-white transition hover:bg-white/10"
        aria-label="السلة"
    >
        <ShoppingBasket class="size-6" />
        <span
            class="absolute -end-1 -top-1 grid min-w-5 place-items-center rounded-full bg-sun px-1 text-[10px] font-bold text-ink"
        >
            {{ formatNumber(count) }}
        </span>
    </button>
</template>
