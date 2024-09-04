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
  mode: 2,
  official: ""
});

console.log(props.mode, " :mode")

const balance = ref(props.balance)

const { t } = useI18n();

const title = computed(() => {
  return t('CONVERT_HEAD', {
    src: genCurrencyFullName(props.srcCurrency),
    dest: genCurrencyFullName(props.destCurrency),
    src_amount: disSingleValue(props.srcCurrency.latest_currency['balance']),
    dest_amount: disValue(props.srcCurrency, props.destCurrency, 1)
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

      <!-- Convert src to dest page -->
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div
          class="bg-white overflow-hidden shadow-sm sm:rounded-lg min-[1080px]:px-12 min-[640px]:px-6 min-[320px]:px-3 flex gap-3 pb-6 max-[1080px]:flex-wrap">
          <div>
            <!-- Page title -->
            <div class="mb-3">
              <h1 class="text-md font-bold">
                {{ $t('CONVERT_TITLE', {
                  amount: disSingleValue(balance),
                  src_name: `${srcCurrency.call} ${srcCurrency.currency_name}`,
                  src_cuname: srcCurrency.currency_name,
                  dest_name: `${destCurrency.call} ${destCurrency.currency_name}`
                }) }}
              </h1>
            </div>

            <div class="p-2 flex flex-col rounded-md border items-center mb-3">
              <div>
                <h2 style="color: #f96010; font-weight: 700; font-size: 1.4rem">
                  {{ disSingleValue(balance) }} {{ srcCurrency.currency_code }} =
                  {{ disValue(srcCurrency, destCurrency, balance) }}
                  {{ destCurrency.currency_code }}
                </h2>
              </div>

              <hr class="w-full" />

              <div class="flex w-full justify-around mt-3 flex-wrap">
                <div class="flex flex-col items-center">
                  <div class="currency-flag">
                    <Link :href="genCurrencyLink(srcCurrency)">
                    {{ $t('CHECK_CURRENCY') }}
                    </Link>
                  </div>
                  <div class="currency-flag">
                    <Link :href="genCurrencyLink(srcCurrency)">
                    {{ `${srcCurrency.call} ${srcCurrency.currency_name}` }}</Link>
                  </div>
                  <div>
                    1 {{ `${srcCurrency.call} ${srcCurrency.currency_name}` }} ({{ srcCurrency.currency_sign }}) =
                    {{ disValue(srcCurrency, destCurrency) }}
                    {{ `${destCurrency.call} ${destCurrency.currency_name}` }} ({{ destCurrency.currency_sign }})
                  </div>
                </div>
                <div class="flex flex-col items-center">
                  <div class="currency-flag">
                    <Link :href="genCurrencyLink(destCurrency)">
                    {{ $t('CHECK_CURRENCY') }}
                    </Link>
                  </div>
                  <div class="currency-flag">
                    <Link :href="genCurrencyLink(destCurrency)">
                    {{ `${destCurrency.call} ${destCurrency.currency_name}` }}
                    </Link>
                  </div>
                  <div>
                    1 {{ `${destCurrency.call} ${destCurrency.currency_name}` }} ({{ destCurrency.currency_sign }}) =
                    {{ disValue(destCurrency, srcCurrency) }}
                    {{ `${srcCurrency.call} ${srcCurrency.currency_name}` }} ({{ srcCurrency.currency_sign }})
                  </div>
                </div>
              </div>

              <hr class="w-full mt-3 mb-2" />

              <div>
                {{ $t('UPDATED_TIME', { date: moment(srcCurrency.latest_currency['date']).format('DD MMMM YYYY HH:mm [UTC]') }) }}
              </div>
            </div>

            <Converter :countries="countries" :src="srcCurrency" :dest="destCurrency" :default="balance" />

            <div>
              <div v-html="$t('CONVERT_TEXT', {
                amount: disSingleValue(balance),
                src_name: `${srcCurrency.call} ${srcCurrency.currency_name}`,
                src_code: srcCurrency.currency_code,
                src_curname: srcCurrency.currency_name,
                dest_code: destCurrency.currency_code,
                dest_curname: destCurrency.currency_name,
                value: disValue(srcCurrency, destCurrency)
              })" />
            </div>

            <div>
              <div class="min-[1024px]:text-lg font-bold mt-6 mb-1">
                {{ $t('CONVERT_TABLE_NAME', {
                  src_code: srcCurrency.currency_code, dest_code: destCurrency.currency_code
                }) }}
              </div>
              <table class="w-full text-left rtl:text-right text-gray-500">
                <thead class="text-gray-700 bg-gray-50 font-bold">
                  <tr>
                    <th scope="col" class="px-1 py-2 border">
                      {{ srcCurrency.currency_code }} {{ $t('TO') }} {{ destCurrency.currency_code }} ({{
                      srcCurrency.call }} {{ srcCurrency.currency_name }})
                    </th>
                    <th scope="col" class="px-1 py-2 border">
                      {{ destCurrency.currency_code }} {{ $t('TO') }} {{ srcCurrency.currency_code }} ({{
                      destCurrency.call }} {{ destCurrency.currency_name }})
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(item, index) in props.range" :key="index">
                    <td class="p-1 border">
                      <Link
                        :href="genConvertLink(destCurrency, srcCurrency, Math.round(item[0] * destCurrency.latest_currency['balance'] / srcCurrency.latest_currency['balance'] * 1e5) / 1e5)"
                        class="text-blue-500 hover:text-gray-500">
                      {{ disSingleValue(item[0]) }} {{ srcCurrency.currency_name }} ({{ srcCurrency.currency_code }}) =
                      {{ disValue(srcCurrency, destCurrency, item[0]) }}
                      {{ destCurrency.currency_code }}
                      </Link>
                    </td>
                    <td class="p-1 border">
                      <Link
                        :href="genConvertLink(srcCurrency, destCurrency, Math.round(item[1] * srcCurrency.latest_currency['balance'] / destCurrency.latest_currency['balance'] * 1e5) / 1e5)"
                        class="text-blue-500 hover:text-gray-500">
                      {{ disSingleValue(item[1]) }} {{ destCurrency.currency_name }} ({{ destCurrency.currency_code }})
                      =
                      {{ disValue(destCurrency, srcCurrency, item[1]) }}
                      {{ srcCurrency.currency_code }}
                      </Link>
                    </td>
                  </tr>
                </tbody>
              </table>

              <div class="min-[1024px]:text-lg font-bold mt-6 mb-1">
                {{ $t('CONVERT_HISTORY', {
                  from: moment(Date.now()).format("dddd DD MMMM, YYYY"), to: moment(Date.now()
                    - 60 * 60 * 24 * 30).format("dddd DD MMMM, YYYY") })}}
              </div>
              <table class="w-full text-left rtl:text-right text-gray-500">
                <thead class="text-gray-700 bg-gray-50 font-bold">
                  <tr>
                    <th scope="col" class="px-1 py-2 border">
                      Date
                    </th>
                    <th scope="col" class="px-1 py-2 border">
                      {{ srcCurrency.currency_name }} = {{ destCurrency.currency_name }}
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="item in past" :key="item.id">
                    <td class="p-1 border">
                      {{ moment(item.date).format("dddd DD MMMM, YYYY") }}
                    </td>
                    <td class="p-1 border">
                      <Link :href="genConvertLink(destCurrency, srcCurrency, balance)"
                        class="text-blue-500 hover:text-gray-500">
                      {{ disSingleValue(balance) }} {{ srcCurrency.currency_code }}
                      </Link> =
                      <Link
                        :href="genConvertLink(destCurrency, srcCurrency, Math.ceil(Math.round(balance * item.balance / srcCurrency.latest_currency['balance'] * 1e5) / 1e5))"
                        class="text-blue-500 hover:text-gray-500">
                      {{ disHValue(srcCurrency, destCurrency, item, balance) }}
                      {{ destCurrency.currency_code }}
                      </Link>
                    </td>
                  </tr>
                  <tr>
                    <td class="p-1 border" colspan="2">
                      <Link :href="genCalculatorLink(srcCurrency)" class="text-blue-500 hover:text-gray-500">{{
                        $t('GOTO_CALCULATOR') }}
                      </Link>
                    </td>
                  </tr>
                </tbody>
              </table>

              <!-- Other currencies -->
              <div class="min-[1080px]:text-md font-bold mt-6 mb-1">
                {{ $t('CONVERT_OTHER_CURRENCIES', {
                  amount: disSingleValue(balance), code: srcCurrency.currency_code
                })}}
              </div>
              <div class="flex w-full flex-wrap">
                <div v-for="country in props.countries.filter((item: Country) => item.order > 10)" :key="country.id"
                  class="w-1/2 p-2 border text-gray-500">
                  <Link :href="genConvertLink(country, srcCurrency, balance)" class="text-blue-500 hover:text-gray-500">
                  {{ disSingleValue(balance) }} {{ srcCurrency.call }} {{ srcCurrency.currency_name }} ({{
                    srcCurrency.currency_code }})
                  </Link> =
                  <Link :href="genConvertLink(country, srcCurrency, balance)" class="text-blue-500 hover:text-gray-500">
                  {{ disValue(srcCurrency, country, balance) }}
                  {{ country.currency_name }} {{ country.currency_code }}
                  </Link>
                </div>
              </div>
            </div>
          </div>
          <div>
            <CurrienciesView :countries="countries" />
          </div>
        </div>
      </div>

    </div>
  </MainLayout>
</template>
