<script setup lang="ts">
import { computed } from "vue";
import { Link } from "@inertiajs/vue3";
import { Country } from "@/types";
import { genConvertLink, genFlagUrl, genCurrencyLink } from "@/utils";

const props = withDefaults(
  defineProps<{
    countries?: [Country];
  }>(),
  {
  }
);

const mainCurrencies = computed(() => {
  return (props.countries || []).filter(
    (item): item is Country =>
      item.display === "main"
  );
});

const otherCurrencies = computed(() => {
  return (props.countries || []).filter(
    (item): item is Country => item.display === "other"
  );
});

</script>

<template>
  <div class="flex flex-col whitespace-nowrap min-w-64">
    <div class="flex flex-col gap-5">
      <h1 class="mt-12 font-semibold">Main curriencies</h1>
      <div v-for="country in mainCurrencies" :key="country.id" class="flex gap-2 items-center">
        <Link :href="genCurrencyLink(country)">
        <img :src="genFlagUrl(country.country_code)" :alt="country.country_name" />
        </Link>
        <div class="currency-flag">
          <Link :href="genCurrencyLink(country)">
          <span>
            {{ country.call }} {{ country.currency_name }} ({{ country.currency_code }})
          </span>
          </Link>
        </div>
      </div>
    </div>
    <div class="flex flex-col gap-5">
      <h1 class="mt-12 font-semibold">Other curriencies</h1>
      <div v-for="country in otherCurrencies" :key="country.id" class="flex gap-2">
        <Link :href="genCurrencyLink(country)">
        <img :src="genFlagUrl(country.country_code)" :alt="country.country_name" />
        </Link>
        <div class="currency-flag">
          <Link :href="genCurrencyLink(country)">
          <span>
            {{ country.call }} {{ country.currency_name }} ({{ country.currency_code }})
          </span>
          </Link>
        </div>
      </div>
    </div>
  </div>
</template>
