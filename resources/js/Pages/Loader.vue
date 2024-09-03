<script setup lang="ts">
window.location.href = '/convert';
</script>

<template>
  <nav class="bg-nav shadow-lg h-20"></nav>
    <div className="flex items-center justify-center h-[calc(100vh-5rem)] bg-gray-100">
        <div className="relative">
            <div className="w-12 h-12 rounded-full absolute
                      border-4 border-solid border-gray-200"></div>
            <div className="w-12 h-12 rounded-full animate-spin absolute
                      border-4 border-solid border-blue-500 border-t-transparent"></div>
        </div>
    </div>
</template>
