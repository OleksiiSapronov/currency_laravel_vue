<script setup lang="ts">
import { computed } from "vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps<{
  href: string;
  active?: boolean;
}>();

const classes = computed(() =>
  props.active
    ? "inline-flex items-center px-1 pt-1 border-b-4 border-white-400 min-[1024px]:text-lg leading-5 text-white-900 focus:outline-none focus:border-white transition duration-150 ease-in-out font-bold"
    : "inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm leading-5 text-white-500 hover:text-white-700 hover:border-gray-300 focus:outline-none focus:text-white focus:border-gray-300 transition duration-150 ease-in-out"
);
</script>

<template>
  <Link :href="href" :class="classes">
    <slot />
  </Link>
</template>
