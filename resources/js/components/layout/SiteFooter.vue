<script setup lang="ts">
import { Clock, Leaf, MapPin, Phone } from 'lucide-vue-next';
</script>

<template>
    <footer class="bg-ink text-white">
        <div
            class="mx-auto grid max-w-7xl gap-8 px-4 py-10 sm:px-6 md:grid-cols-3 md:gap-12"
        >
            <div>
                <div class="flex items-center gap-2.5">
                    <span
                        class="grid size-10 place-items-center rounded-full bg-sun text-ink"
                    >
                        <Leaf class="size-5" />
                    </span>
                    <span class="text-lg font-extrabold">أسواق أبو أيمن</span>
                </div>
                <p class="mt-3 max-w-xs text-sm leading-relaxed text-white/60">
                    بقالتك على باب البيت. اطلب النهاردة واستلم طلبك لحد البيت.
                </p>
            </div>

            <div>
                <h2 class="text-sm font-bold">تواصل معنا</h2>
                <ul class="mt-3 space-y-2.5 text-sm text-white/60">
                    <li class="flex items-center gap-2">
                        <MapPin class="size-4 shrink-0 text-sun" />
                        <span>شارع التحرير، الزرقا</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <Phone class="size-4 shrink-0 text-sun" />
                        <span dir="ltr">+20 100 000 0000</span>
                    </li>
                </ul>
            </div>

            <div>
                <h2 class="text-sm font-bold">مواعيد التوصيل</h2>
                <p class="mt-3 flex items-center gap-2 text-sm text-white/60">
                    <Clock class="size-4 shrink-0 text-sun" />
                    <span>يوميًا من ٩ صباحًا حتى ١١ مساءً</span>
                </p>
            </div>
        </div>

        <div
            class="border-t border-white/10 py-4 text-center text-xs text-white/40"
        >
            © ٢٠٢٦ سوق فريش. جميع الحقوق محفوظة.
        </div>
    </footer>
</template>
