<script setup lang="ts">
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
  <Head title="Contact" />

  <MainLayout>
    <div class="py-6 contact">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">
            <h1 class="label">Kontakt</h1>
            <div class="content">
              Uwagi, pytania, reklama, coś innego? Skontaktuj się z nami:
              kontakt@azconvert.com
            </div>
          </div>
        </div>
      </div>
    </div>
  </MainLayout>
</template>
