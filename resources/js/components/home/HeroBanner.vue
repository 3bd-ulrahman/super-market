<script setup lang="ts">
import {
    ChevronLeft,
    ChevronRight,
    Percent,
    ShoppingBasket,
    Sparkles,
} from 'lucide-vue-next';
import { Button } from '@/components/ui/button';
</script>

<template>
    <section class="relative overflow-hidden bg-sun">
        <div
            class="pointer-events-none absolute -end-24 -top-28 size-72 rounded-full bg-white/30"
        />
        <div
            class="pointer-events-none absolute -start-16 bottom-0 size-56 rounded-full bg-primary/10"
        />

        <div
            class="relative mx-auto grid max-w-7xl gap-8 px-4 pt-7 pb-12 sm:px-6 lg:grid-cols-[1.05fr_0.95fr] lg:items-center lg:gap-10 lg:py-16"
        >
            <div class="text-center lg:text-start">
                <div
                    class="inline-flex items-center gap-1.5 rounded-full bg-white/75 py-1 ps-3 pe-1 text-xs font-semibold text-primary shadow-sm"
                >
                    <button
                        type="button"
                        class="grid size-6 place-items-center rounded-full text-ink/40 transition hover:bg-white hover:text-primary"
                        aria-label="العرض السابق"
                    >
                        <ChevronRight class="size-4" />
                    </button>
                    <Sparkles class="size-4 text-primary" />
                    <span>عرض خاص · خصم ٢٠٪ على الألبان والبيض</span>
                    <button
                        type="button"
                        class="grid size-6 place-items-center rounded-full text-ink/40 transition hover:bg-white hover:text-primary"
                        aria-label="العرض التالي"
                    >
                        <ChevronLeft class="size-4" />
                    </button>
                </div>

                <h1
                    class="mt-4 text-3xl leading-[1.3] font-extrabold text-ink sm:text-4xl lg:text-5xl"
                >
                    اطلب النهاردة واستلم
                    <span class="relative whitespace-nowrap text-primary">
                        طلبك لحد البيت
                        <svg
                            class="absolute start-0 -bottom-1.5 h-2 w-full text-white/80"
                            viewBox="0 0 200 8"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true"
                        >
                            <path
                                d="M2 6c40-4 90-5 196-2"
                                stroke="currentColor"
                                stroke-width="3"
                                stroke-linecap="round"
                            />
                        </svg>
                    </span>
                    .
                </h1>

                <p
                    class="mx-auto mt-4 max-w-md text-sm leading-relaxed text-ink/70 sm:text-base lg:mx-0"
                >
                    بقالة، خضار وفاكهة، لحوم ودواجن، وأكتر من ٢٠ ألف منتج — كله
                    بيوصلك لحد باب البيت.
                </p>

                <div
                    class="mt-6 flex flex-wrap items-center justify-center gap-3 lg:justify-start"
                >
                    <Button size="lg">
                        <ShoppingBasket class="size-5" />
                        اطلب دلوقتي
                    </Button>
                    <Button
                        as="a"
                        href="#categories"
                        variant="outline"
                        size="lg"
                    >
                        <Percent class="size-5 text-primary" />
                        تصفح الأقسام
                    </Button>
                </div>
            </div>

            <div class="relative mx-auto w-full max-w-md">
                <div
                    class="relative mx-auto grid aspect-square w-full max-w-[22rem] place-items-center"
                >
                    <div class="absolute inset-0 rounded-full bg-white/30" />
                    <div class="absolute inset-8 rounded-full bg-white/50" />
                    <span
                        class="relative text-[6.5rem] leading-none"
                        aria-hidden="true"
                        >🛒</span
                    >
                    <span
                        class="absolute start-0 top-6 rounded-2xl bg-white px-3 py-2 text-[11px] font-bold text-ink shadow-lg shadow-ink/5 sm:text-xs"
                        >توصيل في ٣٠ دقيقة</span
                    >
                    <span
                        class="absolute end-0 bottom-8 rounded-2xl bg-primary px-3 py-2 text-[11px] font-bold text-white shadow-lg shadow-primary/20 sm:text-xs"
                        >أكتر من ٢٠ ألف منتج</span
                    >
                    <span
                        class="absolute end-6 top-1 text-3xl"
                        aria-hidden="true"
                        >🥕</span
                    >
                    <span
                        class="absolute start-8 bottom-0 text-3xl"
                        aria-hidden="true"
                        >🍅</span
                    >
                </div>
            </div>
        </div>
    </section>
</template>
