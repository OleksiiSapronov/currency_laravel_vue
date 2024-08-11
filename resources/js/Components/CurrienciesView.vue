<script setup lang="ts">
import { computed, onMounted, onUnmounted, ref } from "vue";
import { Link } from "@inertiajs/vue3";
import { Country } from "@/Pages/Home.vue";

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
      item !== null && item !== undefined && item.order > 10 && item.order < 30
  );
});

const otherCurrencies = computed(() => {
  return (props.countries || []).filter(
    (item): item is Country => item !== null && item !== undefined && item.order > 30
  );
});

const getFlagUrl = function (code: string) {
  return `https://flagcdn.com/32x24/${code.toLowerCase()}.png`;
};
</script>

<template>
  <div class="flex flex-col whitespace-nowrap min-w-64">
    <div class="flex flex-col gap-5">
      <h1 class="mt-12">Main curriencies</h1>
      <div v-for="country in mainCurrencies" :key="country.id" class="flex gap-2">
        <Link
          :href="`/currencies/pairs/${
            country.call == '' ? '' : country.call.toLowerCase() + '-'
          }${country.currency_name.toLowerCase()}-${country.currency_code.toLowerCase()}-page`"
          ><img :src="getFlagUrl(country.country_code)"
        /></Link>
        <div class="currency-flag">
          <Link
            :href="`/currencies/pairs/${
              country.call == '' ? '' : country.call.toLowerCase() + '-'
            }${country.currency_name.toLowerCase()}-${country.currency_code.toLowerCase()}-page`"
            ><span
              >{{ country.call }} {{ country.currency_name }} ({{
                country.currency_code
              }})</span
            >
          </Link>
        </div>
      </div>
    </div>
    <div class="flex flex-col gap-5">
      <h1 class="mt-12">Other curriencies</h1>
      <div v-for="country in otherCurrencies" :key="country.id" class="flex gap-2">
        <Link
          :href="`/currencies/pairs/${
            country.call == '' ? '' : country.call.toLowerCase() + '-'
          }${country.currency_name.toLowerCase()}-${country.currency_code.toLowerCase()}-page`"
          ><img :src="getFlagUrl(country.country_code)"
        /></Link>
        <div class="currency-flag">
          <Link
            :href="`/currencies/pairs/${
              country.call == '' ? '' : country.call.toLowerCase() + '-'
            }${country.currency_name.toLowerCase()}-${country.currency_code.toLowerCase()}-page`"
            ><span
              >{{ country.call }} {{ country.currency_name }} ({{
                country.currency_code
              }})</span
            >
          </Link>
        </div>
      </div>
    </div>
  </div>
</template>
