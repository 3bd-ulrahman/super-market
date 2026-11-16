<script setup lang="ts">
import type { HTMLAttributes } from 'vue';
import { cn } from '@/lib/utils';

const props = defineProps<{
    class?: HTMLAttributes['class'];
}>();
</script>

<template>
    <input
        :class="
            cn(
                'flex h-11 w-full min-w-0 rounded-xl border border-border bg-white px-4 text-sm text-ink outline-none transition placeholder:text-muted-foreground focus-visible:border-primary focus-visible:ring-2 focus-visible:ring-primary/15 disabled:cursor-not-allowed disabled:opacity-50',
                props.class,
            )
        "
    />
</template>
