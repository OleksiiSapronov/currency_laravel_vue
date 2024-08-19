<template>
  <table class="w-full text-left rtl:text-right text-gray-500">
    <thead class="text-gray-700 bg-gray-50 font-bold">
      <tr>
        <th scope="col" class="px-1 py-2 border">
          {{ $t('CURRENCY') }}
        </th>
        <th scope="col" class="px-1 py-2 border">
          {{ $t('CURRENT_FX_RATE') }}
        </th>
        <th scope="col" class="px-1 py-2 border text-nowrap max-[768px]:hidden">
          {{ $t('FX_CALCULATOR' )}}
        </th>
        <th scope="col" class="px-1 py-2 border">
          {{ $t('CONVERT') }}
        </th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="country in dispCountries" 
        :key="country.id"
        class="bg-white border-b"
        >
        <th class="p-1 border text-md">
          <Link :href="genCurrencyLink(country)" class="text-blue-500 hover:text-gray-500">
            <img :src="genFlagUrl(country.country_code)" class="inline-block" :alt="country.country_name" /> 
            {{ `${country.call} ${country.currency_name} (${country.currency_code})` }}
          </Link>
        </th>
        <td class="p-1 border text-sm">
          <Link :href="genConvertLink(src, country)" class="text-blue-500 hover:text-gray-500">
            1 {{ props.src?.currency_code }} = {{ disValue(src, country) }} {{ country.currency_code }}
          </Link>
        </td>
        <td class="p-1 border text-sm max-[768px]:hidden">
          <Link :href="genCalculatorLink(country)" class="text-blue-500 hover:text-gray-500">
            {{ $t('CURRENCY_CALCULATOR', { code: country.currency_code })}}
          </Link>
        </td>
        <td class="p-1 border text-sm">
          <Link :href="genConvertLink(src, country, 10)" class="text-blue-500 hover:text-gray-500">
            {{ $t('TABLE_CONVERT_CURRENCY', { src: src.currency_code, dest: country.currency_code })}}
          </Link>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script setup lang="ts">
import { Country } from "@/types";
import { Link } from "@inertiajs/vue3";
import { disValue, genCalculatorLink, genConvertLink, genCurrencyLink, genFlagUrl } from "@/utils";
import { computed } from "vue";

const props = withDefaults(
  defineProps<{
    countries: [Country];
    src: Country;
    group: string;
  }>(),
  {}
);

const dispCountries = computed(() => {
  if(props.group == "Worldwide")
    return props.countries.filter((item: Country) => (item.top_currency == 1 || item.display == "main") && item.latest_currency['balance'] > 0)   
  else 
    return props.countries.filter((item: Country) => item.continent === props.group && item.latest_currency['balance'] > 0)
})
</script>