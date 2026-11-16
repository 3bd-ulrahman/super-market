<script setup lang="ts">
import type { HTMLAttributes } from 'vue';
import { cva, type VariantProps } from 'class-variance-authority';
import { cn } from '@/lib/utils';

const buttonVariants = cva(
    'inline-flex shrink-0 items-center justify-center gap-2 whitespace-nowrap rounded-xl text-sm font-semibold outline-none transition-all focus-visible:ring-2 focus-visible:ring-ring/40 focus-visible:ring-offset-2 focus-visible:ring-offset-background disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:shrink-0',
    {
        variants: {
            variant: {
                default:
                    'bg-primary text-primary-foreground shadow-sm hover:bg-primary/90',
                accent: 'bg-sun text-ink shadow-sm hover:bg-sun-light',
                outline:
                    'border border-border bg-white text-ink hover:bg-muted',
                ghost: 'text-ink hover:bg-muted',
                link: 'text-primary underline-offset-4 hover:underline',
            },
            size: {
                default: 'h-10 px-4',
                sm: 'h-8 gap-1.5 rounded-lg px-3 text-xs',
                lg: 'h-12 rounded-2xl px-6 text-base',
                icon: 'size-10 rounded-full',
            },
        },
        defaultVariants: {
            variant: 'default',
            size: 'default',
        },
    },
);

type ButtonVariants = VariantProps<typeof buttonVariants>;

const props = withDefaults(
    defineProps<{
        variant?: ButtonVariants['variant'];
        size?: ButtonVariants['size'];
        as?: string;
        class?: HTMLAttributes['class'];
    }>(),
    {
        variant: 'default',
        size: 'default',
        as: 'button',
    },
);

defineOptions({ inheritAttrs: false });
</script>

<template>
    <component
        :is="props.as"
        :class="cn(buttonVariants({ variant: props.variant, size: props.size }), props.class)"
        v-bind="$attrs"
    >
        <slot />
    </component>
</template>
