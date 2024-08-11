<template>
  <div>
    <h1>Upload CSV File</h1>
    <form @submit.prevent="submit">
      <input type="file" ref="fileInput" accept=".csv" />
      <button type="submit">Upload</button>
    </form>
    <div v-if="errors.length">
      <p v-for="error in errors" :key="error">{{ error }}</p>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import { router } from "@inertiajs/vue3";

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
