<script setup lang="ts">
import SiteFooter from '@/components/layout/SiteFooter.vue';
import SiteHeader from '@/components/layout/SiteHeader.vue';

withDefaults(
    defineProps<{
        cartCount?: number;
    }>(),
    {
        cartCount: 0,
    },
);
</script>

<template>
    <div class="flex min-h-screen flex-col bg-background text-ink">
        <SiteHeader :cart-count="cartCount" />
        <main class="flex-1">
            <slot />
        </main>
        <SiteFooter />
    </div>
</template>
