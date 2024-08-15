<template>
  <Head title="Countries" />

  <MainLayout>
    <div class="py-6">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-12 py-12 lg:gap-5">
          <input type="checkbox" v-model="pickedTop"/> Show Only Top Currency
          <select v-model="pickedDisplay">
            <option value="main">Main Currency</option>
            <option value="other">Other Currency</option>
            <option value="none"></option>
          </select>
          Show Only Display Currency
          <table class="w-full text-left rtl:text-right text-gray-500">
            <thead class="text-gray-700 bg-gray-50 font-bold">
              <tr>
                <th scope="col" class="px-1 py-2 border">
                  No
                </th>
                <th scope="col" class="px-1 py-2 border">
                  Country Code
                </th>
                <th scope="col" class="px-1 py-2 border">
                  Country Name
                </th>
                <th scope="col" class="px-1 py-2 border text-nowrap">
                  Currency Name
                </th>
                <th scope="col" class="px-1 py-2 border">
                  Currency Code
                </th>
                <th scope="col" class="px-1 py-2 border">
                  Top Currency
                </th>
                <th scope="col" class="px-1 py-2 border" v-if="pickedTop">
                  Top Order
                </th>
                <th scope="col" class="px-1 py-2 border" v-if="!pickedTop">
                  Display Currency
                </th>
                <th scope="col" class="px-1 py-2 border" v-if="pickedDisplay !== 'none'">
                  Display Order
                </th>
                <th scope="col" class="px-1 py-2 border">
                  #
                </th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="country in dispCountries"
                :key="country.id"
                class="bg-white border-b"
                >
                <th class="p-1 border text-sm">
                  {{ country.id }}
                </th>
                <th class="p-1 border text-sm">
                  {{ country.country_code }}
                </th>
                <td class="p-1 border text-sm">
                  {{ country.country_name }}
                </td>
                <td class="p-1 border text-sm">
                  {{ country.currency_name }}
                </td>
                <td class="p-1 border text-sm">
                  {{ country.currency_code }}
                </td>
                <td class="p-1 border text-sm">
                  <select v-model="country.top_currency" @change="handleChange(country.id, country)">
                    <option value="1">Set</option>
                    <option value="0"></option>
                  </select>
                </td>
                <td class="p-1 border text-sm" v-if="pickedTop">
                  <input type="number" v-model="country.top_order" @change="handleChange(country.id, country)"/>
                </td>
                <td class="p-1 border text-sm" v-if="!pickedTop">
                  <select v-model="country.display" @change="handleChange(country.id, country)">
                    <option value="main">Main Currency</option>
                    <option value="other">Other Currency</option>
                    <option value="none"></option>
                  </select>
                </td>
                <td class="p-1 border text-sm" v-if="pickedDisplay !== 'none'">
                  <input type="number" v-model="country.display_order" @change="handleChange(country.id, country)"/>
                </td>
                <td class="p-1 border text-sm">
                  <button>edit</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </MainLayout>
</template>
  
<script setup lang="ts">
import { ref, watch } from "vue";
import { router } from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head, } from "@inertiajs/vue3";
import { Country } from "@/types";
import axios from "axios";

const props = withDefaults(defineProps<{
  countries: [Country];
}>(), {
});

const pickedTop = ref(false);
const pickedDisplay = ref('none');
const dispCountries = ref<Country[]>(props.countries);

const handleChange = (id: number, country: Country) => {
  axios.post(`/admin/countries/${id}`, { 
      '_method': 'PATCH',
      ...country
    }).then(data => {
    console.log(country);
    console.log(id);  
  });
}

watch(pickedTop, () => {
  if(pickedTop.value) 
    dispCountries.value = props.countries.filter(item => item.top_currency == 1);
  else dispCountries.value = props.countries;
})

watch(pickedDisplay, () => {
  if(pickedDisplay.value !== 'none') 
    dispCountries.value = props.countries.filter(item => item.display === pickedDisplay.value);
  else dispCountries.value = props.countries;
})
</script>
  