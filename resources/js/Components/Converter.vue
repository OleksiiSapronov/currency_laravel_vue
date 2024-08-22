<template>
  <div class="flex gap-3 mb-3 max-[768px]:flex-col" v-if="mode == 0">
    <input
      type="number"
      name="balance"
      id="balance"
      autocomplete="balance"
      class="rounded-md border py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
      :placeholder="$t('CONVERT_QUANTITY')"
      v-model="quantity"
    />

    <select
      aria-label="source-currency"
      class="rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-white sm:text-sm sm:leading-6 w-full"
      v-model="srcValue"
    >
      <optgroup label="Main currencies">
        <option
          v-for="country in mainCurrencies"
          :key="country.id"
          :value="country.id"
        >
          {{ country.currency_code }} - {{ country.call }} {{ country.currency_name }}
        </option>
      </optgroup>
      <optgroup label="All currencies">
        <option
          v-for="country in countries"
          :key="country.id"
          :value="country.id"
        >
          {{ country.currency_code }} - {{ country.call }} {{ country.currency_name }}
        </option>
      </optgroup>
    </select>

    <select
      aria-label="dest-currency"
      class="rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-white sm:text-sm sm:leading-6 w-full"
      v-model="destValue"
    >
      <optgroup label="Main currencies">
        <option
          v-for="country in mainCurrencies"
          :key="country.id"
          :value="country.id"
        >
          {{ country.currency_code }} - {{ country.call }} {{ country.currency_name }}
        </option>
      </optgroup>
      <optgroup label="All currencies">
        <option
          v-for="country in countries"
          :key="country.id"
          :value="country.id"
        >
          {{ country.currency_code }} - {{ country.call }} {{ country.currency_name }}
        </option>
      </optgroup>
    </select>

    <button
      type="button"
      class="rounded-md border-0 bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-md hover:bg-gray-50 convert"
      @click="handleSwitch"
    >
      {{ $t('SWITCH').toUpperCase() }}
    </button>

    <button
      type="button"
      class="rounded-md border-0 bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-md hover:bg-gray-50 convert"
      @click="handleRedirect"
    >
      {{ $t('CONVERT').toUpperCase() }}
    </button>
  </div>
  <div class="flex gap-3 mb-3 max-[768px]:flex-col" v-else>
    <input
      type="number"
      name="balance"
      id="balance"
      autocomplete="balance"
      class="rounded-md border py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6 w-full"
      :placeholder="$t('CONVERT_QUANTITY')"
      v-model="quantity"
    />

    <select
      aria-label="source-currency"
      class="rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-white w-full sm:text-sm sm:leading-6"
      v-model="destValue"
    >
      <optgroup label="Main currencies">
        <option
          v-for="country in mainCurrencies"
          :key="country.id"
          :value="country.id"
        >
          {{ country.currency_code }} - {{ country.call }} {{ country.currency_name }}
        </option>
      </optgroup>
      <optgroup label="All currencies">
        <option
          v-for="country in countries"
          :key="country.id"
          :value="country.id"
        >
          {{ country.currency_code }} - {{ country.call }} {{ country.currency_name }}
        </option>
      </optgroup>
    </select>

    <button
      type="button"
      class="rounded-md border-0 bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-md hover:bg-gray-50 convert w-full"
      @click="handleRedirectCalculator"
    >
      {{ $t('CONVERT').toUpperCase() }}
    </button>
  </div>
</template>

<script setup lang="ts">
import { computed, onMounted, ref } from "vue";
import { Country } from "@/types";
import { router } from "@inertiajs/vue3";
import { genConvertLink, genCalculatorLink } from "@/utils";

const props = withDefaults(
  defineProps<{
    countries: [Country];
    src: Country;
    dest: Country;
    default: number;
    mode?: number;
  }>(),
  {
    default: 1,
    mode: 0
  }
);
const quantity = ref(props.default);
const srcValue = ref(props.src.id);
const destValue = ref(props.dest.id);

let countriesTable: Country[] = []

onMounted(() => {
  props.countries.map((item: Country) => {
    countriesTable[item.id] = item
  });
})


const mainCurrencies = computed(() => {
  return (props.countries || []).filter(
    (item): item is Country =>
      item !== null && item !== undefined && item.order > 10 && item.order < 30
  );
});

const handleRedirect = (): void => {
  router.visit(genConvertLink(countriesTable[srcValue.value], countriesTable[destValue.value], quantity.value));
}

const handleRedirectCalculator = (): void => {
  router.visit(genCalculatorLink(countriesTable[destValue.value], quantity.value));
}

const handleSwitch = (): void => {
  const temp = destValue.value;
  destValue.value = srcValue.value;
  srcValue.value = temp;
}
</script>
