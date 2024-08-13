<template>
  <table class="w-full text-left rtl:text-right text-gray-500">
    <thead class="text-gray-700 bg-gray-50 font-bold">
      <tr>
        <th scope="col" class="px-1 py-2 border">
          Currency
        </th>
        <th scope="col" class="px-1 py-2 border">
          Current FX rate
        </th>
        <th scope="col" class="px-1 py-2 border text-nowrap">
          FX calculator
        </th>
        <th scope="col" class="px-1 py-2 border">
          Convert
        </th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="country in props.countries" :key="country.id"
        class="bg-white border-b">
        <th class="p-1 border text-md">
          <Link :href="genCurrencyLink(country)" class="text-blue-500 hover:text-gray-500">
            <img :src="genFlagUrl(country.country_code)" class="inline-block" /> 
            {{ `${country.call} ${country.currency_name} (${country.currency_code})` }}
          </Link>
        </th>
        <td class="p-1 border text-sm">
          <Link :href="genConvertLink(src, country)" class="text-blue-500 hover:text-gray-500">
            1 {{ props.src?.currency_code }} = {{ Math.round(country.value / src.value * 1e5) / 1e5
            }} {{ country.currency_code }}
          </Link>
        </td>
        <td class="p-1 border text-sm">
          <Link :href="genCalculatorLink(country)" class="text-blue-500 hover:text-gray-500">
            {{ country.currency_code }} calculator
          </Link>
        </td>
        <td class="p-1 border text-sm">
          <Link :href="genConvertLink(src, country, 10)" class="text-blue-500 hover:text-gray-500">
            Convert {{ src.currency_code }} to {{ country.currency_code }}
          </Link>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script setup lang="ts">
import { Country } from "@/types";
import { Link } from "@inertiajs/vue3";
import { genCalculatorLink, genConvertLink, genCurrencyLink, genFlagUrl } from "@/utils";

const props = withDefaults(
  defineProps<{
    countries: [Country];
    src: Country;
  }>(),
  {}
);
</script>