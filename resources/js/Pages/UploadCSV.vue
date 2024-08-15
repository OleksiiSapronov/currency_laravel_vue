<template>
  <Head title="UploadCSV" />

  <MainLayout>
    <div class="py-6">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-12 py-12 lg:gap-5">
          <div class="flex flex-col gap-5">
            <h1 class="text-lg font-bold">Upload CSV File</h1>
            <form @submit.prevent="submit">
              <input type="file" ref="fileInput" accept=".csv" />
              <button 
                class="rounded-md border-0 bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-md hover:bg-gray-50" type="submit">Upload From File</button>
            </form>
            <div v-if="errors.length" class="text-md text-red-500">
              <p v-for="error in errors" :key="error">{{ error }}</p>
            </div>
            <div>
              <button 
                class="rounded-md border-0 bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-md hover:bg-gray-50"
                @click="handleDownload"
                >Upload From API</button>
            </div>
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

const handleDownload = () => {
  router.get('/admin/upload-api', {
    onError: (errorResponse) => {
      errors.value = Object.values(errorResponse.errors || {});
    },
    onSuccess: () => {
      errors.value = [];
      alert("Upload Successfully");
    },
  });
}

const submit = () => {
  const file = fileInput.value.files[0];

  if (!file) {
    errors.value = ["Please select a file."];
    return;
  }

  const formData = new FormData();
  formData.append("csv_file", file);

  router.post("/admin/upload-csv", formData, {
    headers: {
      "Content-Type": "multipart/form-data",
    },
    onError: (errorResponse) => {
      errors.value = Object.values(errorResponse.errors || {});
    },
    onSuccess: () => {
      fileInput.value.value = "";
      errors.value = [];
      alert("Upload Successfully");
    },
  });
};
</script>
