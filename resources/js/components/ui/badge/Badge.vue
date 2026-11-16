<script setup lang="ts">
import type { HTMLAttributes } from 'vue';
import { cva, type VariantProps } from 'class-variance-authority';
import { cn } from '@/lib/utils';

const badgeVariants = cva(
    'inline-flex items-center gap-1 rounded-full px-2.5 py-0.5 text-xs font-semibold transition-colors [&_svg]:pointer-events-none',
    {
        variants: {
            variant: {
                default: 'bg-primary text-primary-foreground',
                accent: 'bg-sun text-ink',
                muted: 'bg-muted text-ink',
                outline: 'border border-border bg-white text-ink',
                success: 'bg-pastel-mint text-ink',
            },
        },
        defaultVariants: {
            variant: 'default',
        },
    },
);

type BadgeVariants = VariantProps<typeof badgeVariants>;

const props = withDefaults(
    defineProps<{
        variant?: BadgeVariants['variant'];
        class?: HTMLAttributes['class'];
    }>(),
    {
        variant: 'default',
    },
);
</script>

<template>
    <span :class="cn(badgeVariants({ variant: props.variant }), props.class)">
        <slot />
    </span>
</template>
