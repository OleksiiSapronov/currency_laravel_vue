<script setup lang="ts">
import { computed } from "vue";
import { Link } from "@inertiajs/vue3";
import { Country } from "@/types";
import { genFlagUrl } from "@/utils";

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

</script>

<template>
  <div class="flex flex-col whitespace-nowrap min-w-64">
    <div class="flex flex-col gap-5">
      <h1 class="mt-12 font-semibold">Main curriencies</h1>
      <div v-for="country in mainCurrencies" :key="country.id" class="flex gap-2">
        <Link
          :href="`/currencies/pairs/${
            country.call == '' ? '' : country.call.toLowerCase() + '-'
          }${country.currency_name.toLowerCase()}-${country.currency_code.toLowerCase()}-page`"
          ><img :src="genFlagUrl(country.country_code)" :alt="country.country_name" />
        </Link>
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
      <h1 class="mt-12 font-semibold">Other curriencies</h1>
      <div v-for="country in otherCurrencies" :key="country.id" class="flex gap-2">
        <Link
          :href="`/currencies/pairs/${
            country.call == '' ? '' : country.call.toLowerCase() + '-'
          }${country.currency_name.toLowerCase()}-${country.currency_code.toLowerCase()}-page`"
          ><img :src="genFlagUrl(country.country_code)" :alt="country.country_name" /></Link>
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
