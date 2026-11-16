<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ChevronDown, Leaf, MapPin, User } from 'lucide-vue-next';
import CartButton from '@/components/layout/CartButton.vue';
import SearchBar from '@/components/layout/SearchBar.vue';
import { Button } from '@/components/ui/button';

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
    <header
        class="sticky top-0 z-40 bg-primary text-white shadow-lg shadow-primary/20 lg:hidden"
    >
        <div class="px-4 pt-3 pb-4">
            <div class="flex items-center justify-between gap-3">
                <Link href="/" class="flex items-center gap-2">
                    <span
                        class="grid size-9 place-items-center rounded-full bg-sun text-ink"
                    >
                        <Leaf class="size-5" />
                    </span>
                    <span class="text-base font-extrabold">سوق فريش</span>
                </Link>

                <div class="flex items-center gap-3">
                    <CartButton :count="cartCount" tone="onPrimary" />
                    <button
                        type="button"
                        class="rounded-full p-1 text-white transition hover:bg-white/10"
                        aria-label="حسابي"
                    >
                        <User class="size-6" />
                    </button>
                </div>
            </div>

            <button
                type="button"
                class="mt-3 flex w-full items-center gap-1.5 rounded-xl bg-white/10 px-3 py-1.5 text-xs text-white/75"
            >
                <MapPin class="size-4 text-sun" />
                <span>التوصيل إلى</span>
                <span class="truncate font-semibold text-white"
                    >شارع التحرير، الدقي</span
                >
                <ChevronDown class="ms-auto size-4" />
            </button>

            <div class="mt-3">
                <SearchBar tone="onPrimary" />
            </div>
        </div>
    </header>

    <header
        class="sticky top-0 z-40 hidden border-b border-border bg-white/95 backdrop-blur lg:block"
    >
        <div class="mx-auto flex max-w-7xl items-center gap-6 px-6 py-3">
            <Link href="/" class="flex shrink-0 items-center gap-2.5">
                <span
                    class="grid size-11 place-items-center rounded-2xl bg-sun text-ink"
                >
                    <Leaf class="size-6" />
                </span>
                <span class="flex flex-col leading-tight">
                    <span class="text-lg font-extrabold text-ink">
                        أسواق أبو أيمن
                    </span>
                    <span class="text-[11px] text-muted-foreground"
                        >بقالتك على باب البيت</span
                    >
                </span>
            </Link>

            <div class="mx-auto w-full max-w-xl">
                <SearchBar />
            </div>

            <nav class="flex shrink-0 items-center gap-2">
                <Button variant="ghost" class="h-11 rounded-xl px-3">
                    <MapPin class="size-5 text-primary" />
                    <span class="flex flex-col items-start leading-tight">
                        <span
                            class="text-[10px] font-medium text-muted-foreground"
                            >التوصيل إلى</span
                        >
                        <span class="text-xs font-bold text-ink"
                            >الدقي، الجيزة</span
                        >
                    </span>
                </Button>
                <Button variant="ghost" class="h-11 rounded-xl">
                    <User class="size-5" />
                    <span>حسابي</span>
                </Button>
                <CartButton :count="cartCount" />
            </nav>
        </div>
    </header>
</template>
