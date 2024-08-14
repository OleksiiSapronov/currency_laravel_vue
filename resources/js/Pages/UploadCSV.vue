<template>
  <Head title="UploadCSV" />

  <MainLayout>
    <div class="py-6">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-12 pb-12 lg:gap-5">
          <h1 class="text-lg font-bold">Upload CSV File</h1>
          <form @submit.prevent="submit">
            <input type="file" ref="fileInput" accept=".csv" />
            <button 
              class="rounded-md border-0 bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-md hover:bg-gray-50" type="submit">Upload</button>
          </form>
          <div v-if="errors.length">
            <p v-for="error in errors" :key="error">{{ error }}</p>
          </div>
        </div>
      </div>
    </div>
  </MainLayout>
</template>

<script setup>
import { ref } from "vue";
import { router } from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head, } from "@inertiajs/vue3";

const fileInput = ref(null);
const errors = ref([]);

const submit = () => {
  const file = fileInput.value.files[0];

  if (!file) {
    errors.value = ["Please select a file."];
    return;
  }

  const formData = new FormData();
  formData.append("csv_file", file);

  router.post("/upload-csv", formData, {
    headers: {
      "Content-Type": "multipart/form-data",
    },
    onError: (errorResponse) => {
      errors.value = Object.values(errorResponse.errors || {});
    },
    onSuccess: () => {
      fileInput.value.value = "";
      errors.value = [];
    },
  });
};
</script>
