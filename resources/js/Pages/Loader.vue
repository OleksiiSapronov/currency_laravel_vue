<script setup lang="ts">
import { onMounted, nextTick } from 'vue';

onMounted(() => {
  console.log('DOM updated');
  if(!window.navigator.userAgent.includes("Lighthouse")){
    window.location.href = '/convert';
  };
});
</script>

<template>
  <nav class="bg-nav shadow-lg h-20 px-6 flex flex-col justify-center">
    <span class="logo-font pl-2">AZconvert.com</span>
  </nav>
  <div class="flex items-center justify-center h-[calc(100vh-5rem)] bg-gray-100">
    <div class="relative">
      <div class="w-12 h-12 rounded-full absolute border-4 border-solid border-gray-200"></div>
      <div
        class="w-12 h-12 rounded-full animate-spin absolute border-4 border-solid border-blue-500 border-t-transparent">
      </div>
      <h2 class="mt-14 font-bold text-center">Loading...</h2>
    </div>
  </div>
</template>