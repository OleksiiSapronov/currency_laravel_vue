<script setup lang="ts">
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import Tabs from "@/Components/Tabs.vue";
import Converter from "@/Components/Converter.vue";
import CurrienciesView from "@/Components/CurrienciesView.vue";
import { Country, Currency } from "@/types";
import {
  genCurrencyLink,
  genFlagUrl,
  SERVER_URL,
  genCalculatorLink,
  genConvertLink,
  disValue,
  disHValue,
  disSingleValue,
  genCurrencyFullName
} from "@/utils";
import CalculatorTable from "@/Components/CalculatorTable.vue";
import moment from "moment-mini";
import { computed, onMounted, ref } from "vue";
import { useI18n } from 'vue-i18n';

const props = withDefaults(defineProps<{
  countries: [Country];
  topCountries: [Country];
  srcCurrency: Country;
  destCurrency: Country;
  balance?: number;
  mode?: number;
  past?: [Currency];
  range?: Array<Array<number>>;
  official?: string;
}>(), {
  balance: 1,
  mode: 4,
  official: ""
});

console.log(props.mode, " :mode")

const balance = ref(props.balance)

const { t } = useI18n();

const title = computed(() => {
  return t('CALCULATOR_HEAD', {
    src: genCurrencyFullName(props.srcCurrency),
    currency_name: props.srcCurrency.currency_name
  })
})
</script>

<template>

  <Head>
    <title>{{ title }}</title>
    <meta property="og:title" :content="title">
    <meta name="description" :content="$t('ABOUT_SITE')">
  </Head>

  <MainLayout>
    <div class="min-[640px]:py-6">

      <!-- Calculator page -->
      <div class="flex max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div
          class="flex bg-white overflow-hidden shadow-sm sm:rounded-lg min-[1080px]:px-12 min-[640px]:px-6 min-[320px]:px-3 pb-6 lg:gap-5 flex-col">
          <!-- Page title section -->
          <div class="mb-3">
            <div class="min-[1080px]:text-md pt-6 pb-3 font-medium">
              {{ $t('CALCULATOR_TITLE', {
                name: `${srcCurrency.call} ${srcCurrency.currency_name}`, code:
                  srcCurrency.currency_code })}}
            </div>
            <div>
              {{ $t('UPDATED_TIME', { date: moment(srcCurrency.latest_currency['date']).format('DD MMMM YYYY HH:mm [UTC]') }) }}
            </div>
          </div>

            <!-- Display Main currencies -->
            <div class="text-gray-900 flex p-3 justify-center gap-3">
              <div v-for="(country, index) in props.topCountries" :key="country.id" :class="index == 0
                ? 'flex flex-col items-center gap-1 pr-10 text-nowrap'
                : 'flex flex-col items-center gap-1' + (index > 8 ? ' max-[1280px]:hidden' : (index > 6 ? ' max-[768px]:hidden' : (index > 4 ? ' max-sm:hidden' : '')))">
                <div v-if="index != 0">
                  <Link :href="genConvertLink(srcCurrency, country, 100)">
                    <img height="24" width="32" :src="genFlagUrl(country.country_code)" :alt="country.country_name"/>
                  </Link>
                  <div class="currency-flag">
                    <Link :href="genConvertLink(srcCurrency, country, 100)">
                      {{ country.currency_code }}</Link>
                  </div>
                </div>
                <div v-else>
                  <img height="24" width="32" :src="genFlagUrl(country.country_code)" :alt="country.country_name" :class="country.country_code == 'WW' ? 'img-btc': ''" />
                  <div>&nbsp;</div>
                  <div>{{ disSingleValue(balance) }} {{ country.currency_code }} =</div>
                </div>
                <div v-else>
                  {{ disValue(srcCurrency, country, 1, true) }}
                </div>
              </div>
            </div>

          <!-- Convert function -->
          <Converter class="pb-3 pt-3" :countries="countries" :src="srcCurrency" :dest="destCurrency"
            :default="props.balance" :mode="1" />

          <!-- Calculator table -->
          <div>
            <CalculatorTable :countries="countries" :src="srcCurrency" :balance="props.balance" />
          </div>

          <!-- Link section -->
          <div>
            <div class="border p-2">
              {{ $t('LINK_TEXT', {
                name: `${srcCurrency.call} ${srcCurrency.currency_name}`, code:
                  srcCurrency.currency_code, countries: official })}}
            </div>
            <br />
            <div class="border p-2">
              {{ $t('LINK_TEXT', {
                name: `${srcCurrency.call} ${srcCurrency.currency_name}`, code:
                  srcCurrency.currency_code})}}
            </div>
            <textarea aria-label="link-address"
              class="w-full"><a href="{{ SERVER_URL }}{{ genCurrencyLink(srcCurrency) }}">{{ `${srcCurrency.call} ${srcCurrency.currency_name} (${srcCurrency.currency_code})` }}  exchange rates</a></textarea>
          </div>
        </div>
      </div>

    </div>
  </MainLayout>
</template>
