<script setup lang="ts">
import { Search } from 'lucide-vue-next';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';

withDefaults(
    defineProps<{
        tone?: 'default' | 'onPrimary';
    }>(),
    {
        tone: 'default',
    },
);
</script>

<template>
    <form class="flex w-full items-center gap-2" role="search" @submit.prevent>
        <div class="relative w-full">
            <Search
                class="pointer-events-none absolute start-4 top-1/2 size-4 -translate-y-1/2 text-muted-foreground"
            />
            <Input
                type="search"
                placeholder="ابحث عن منتج أو قسم…"
                aria-label="بحث"
                class="h-11 bg-white ps-11"
            />
        </div>
        <Button
            type="submit"
            :variant="tone === 'onPrimary' ? 'accent' : 'default'"
            class="h-11 px-5"
        >
            بحث
        </Button>
    </form>
</template>
