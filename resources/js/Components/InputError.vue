<script setup lang="ts">
defineProps<{
    message?: string;
}>();
</script>

<template>
    <div v-show="message">
        <div class="text-sm text-red-600">
            {{ message }}
        </div>
    </div>
</template>
