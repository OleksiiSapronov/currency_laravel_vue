<template>
  <div ref="scrollTopButton" class="fixed justify-end bottom-0 pb-16 pr-8 invisible right-0">
    <button 
      @click="scrollToTop"
      class="bg-white hover:bg-indigo-500 focus:outline-none font-medium rounded-full text-sm p-4 text-center min-h-4 hover:text-white text-indigo-800 border shadow-lg hover:transition-colors">
      <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
        fill="none" viewBox="0 0 14 8">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M13 7 7.674 1.3a.91.91 0 0 0-1.348 0L1 7" />
      </svg>
    </button>
  </div>
</template>

<script setup>
import { onMounted, onUnmounted, ref } from "vue";

let scrollTopButton = ref(null);

const scrollToTop = () => {
  window.scrollTo({ top: 0, behavior: "smooth" });
}

const handleScroll = () => {
  if (window.scrollY > 100) {
    scrollTopButton.value.classList.remove("invisible");
  } else {
    scrollTopButton.value.classList.add("invisible");
  }
};

onMounted(() => {
  window.addEventListener("scroll", handleScroll);
});

onUnmounted(() => {
  window.removeEventListener("scroll", handleScroll);
});
</script>