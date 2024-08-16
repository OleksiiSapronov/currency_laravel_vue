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
  genCurrencyFullName, 
  SERVER_URL, 
  genCalculatorLink, 
  genConvertLink 
} from "@/utils";
import CalculatorTable from "@/Components/CalculatorTable.vue";
import moment from "moment";

const props = withDefaults(defineProps<{
  countries: [Country];
  topCountries: [Country];
  srcCurrency: Country;
  destCurrency: Country;
  balance?: number;
  mode?: number;
  past?: [Currency];
  range?: Array<Array<number>>;
}>(), {
  balance: 1,
  mode: 1
});
</script>

<template>

  <Head title="Home" />

  <MainLayout>
    <div class="py-6 flex">
      <!-- Main page -->
      <div class="flex max-w-7xl mx-auto sm:px-6 lg:px-8" v-if="props.mode == 1">
        <div class="flex bg-white overflow-hidden shadow-sm sm:rounded-lg md:px-12 md:pb-12 min-[320px]:px-2 min-[320px]:pb-6 lg:gap-5">
          <div>
            <!-- Title -->
            <div class="mb-3">
              <div class="text-2xl pt-6 pb-3 text-gray-500 font-extrabold">Convertor valutar online.</div>
              <p>Convertor valutar (Euro, Dolar, BTC), curs valutar FX și calculator.</p>
              <div class="text-2xl pt-6 pb-3 text-gray-500 font-extrabold">
                {{ `${srcCurrency.call} ${srcCurrency.currency_name}` }}
                {{ srcCurrency.currency_code }} - Current currency exchange converter page
              </div>
              <p>Last update {{ moment(srcCurrency.latest_currency['date']).format('DD MMMM YYYY HH:mm [UTC]') }}.</p>
            </div>

            <!-- Convert Flags -->
            <div class="text-gray-900 flex p-3 justify-center gap-3">
              <div v-for="(country, index) in props.topCountries" :key="country.id" :class="index == 0
                ? 'flex flex-col items-center gap-1 pr-10 text-nowrap'
                : 'flex flex-col items-center gap-1' + (index > 8 ? ' max-[1280px]:hidden' : (index > 6 ? ' max-[768px]:hidden' : (index > 4 ? ' max-sm:hidden' : '')))">
                <div v-if="index != 0">
                  <Link :href="genConvertLink(srcCurrency, country, 100)">
                    <img :src="genFlagUrl(country.country_code)" :alt="country.country_name" /></Link>
                </div>
                <div v-else><img :src="genFlagUrl(country.country_code)" :alt="country.country_name" /></div>
                <div v-if="index != 0" class="currency-flag">
                  <Link :href="genConvertLink(srcCurrency, country, 100)">
                    {{ country.currency_code }}</Link>
                </div>
                <div v-else>&nbsp;</div>
                <div v-if="index == 0">1 {{ country.currency_code }} =</div>
                <div v-else>
                  {{
                    country.currency_sign == "$"
                      ? `$${Math.round((country.latest_currency['balance'] / srcCurrency.latest_currency['balance']) * 100) / 100
                      }`
                      : `${Math.round((country.latest_currency['balance'] / srcCurrency.latest_currency['balance']) * 100) / 100
                      }${country.currency_sign}`
                  }}
                </div>
              </div>
            </div>

            <Converter class="pb-3 pt-3" :countries="countries" :src="srcCurrency" :dest="destCurrency" :default="1" />

            <div class="p-2 flex flex-col rounded-md border items-center">
              <div>
                <span>What is the exchange rate of 1
                  {{ `${srcCurrency.call} ${srcCurrency.currency_name}` }} in
                  {{ `${destCurrency.call} ${destCurrency.currency_name}` }}?</span>
              </div>
              <div>
                <h2 style="color: #f96010; font-weight: 700; font-size: 1.4rem">
                  1 {{ srcCurrency.currency_code }} =
                  {{ Math.round((destCurrency.latest_currency['balance'] / srcCurrency.latest_currency['balance']) * 1e5) / 1e5 }}
                  {{ destCurrency.currency_code }}
                </h2>
              </div>

              <hr class="w-full" />

              <div class="flex w-full justify-around mt-3 flex-wrap">
                <div class="flex flex-col items-center">
                  <div class="currency-flag">
                    <Link :href="genCurrencyLink(srcCurrency)">
                    Check this currency</Link>
                  </div>
                  <div class="currency-flag">
                    <Link :href="genCurrencyLink(srcCurrency)">
                      {{ `${srcCurrency.call} ${srcCurrency.currency_name}` }}
                    </Link>
                  </div>
                  <div>
                    1 {{ `${srcCurrency.call} ${srcCurrency.currency_name}` }} ({{
                      srcCurrency.currency_sign
                    }}) = {{ Math.round((destCurrency.latest_currency['balance'] / srcCurrency.latest_currency['balance']) * 1e5) / 1e5 }}
                    {{ `${destCurrency.call} ${destCurrency.currency_name}` }} ({{
                      destCurrency.currency_sign
                    }})
                  </div>
                </div>
                <div class="flex flex-col items-center">
                  <div class="currency-flag">
                    <Link :href="genCurrencyLink(destCurrency)">
                    Check this currency</Link>
                  </div>
                  <div class="currency-flag">
                    <Link :href="genCurrencyLink(destCurrency)">
                    {{ `${destCurrency.call} ${destCurrency.currency_name}` }}</Link>
                  </div>
                  <div>
                    1 {{ `${destCurrency.call} ${destCurrency.currency_name}` }} ({{
                      destCurrency.currency_sign
                    }}) = {{ Math.round((srcCurrency.latest_currency['balance'] / destCurrency.latest_currency['balance']) * 1e5) / 1e5 }}
                    {{ `${srcCurrency.call} ${srcCurrency.currency_name}` }} ({{
                      srcCurrency.currency_sign
                    }})
                  </div>
                </div>
              </div>

              <hr class="w-full mt-4 mb-2 border" />

              <div>
                <p v-html="$t('PAGE_CONTENT', {
                  amount: 1,
                  src_cuname: `${srcCurrency.call} ${srcCurrency.currency_name}`,
                  src_code: srcCurrency.currency_code,
                  dest_cuname: `${ srcCurrency.call } ${ srcCurrency.currency_name }`,
                  dest_code: destCurrency.currency_code,
                  src_date: srcCurrency.latest_currency['date'],
                  link1: genCalculatorLink(srcCurrency),
                  link2: genCalculatorLink(destCurrency)
                })"></p>
                
                <br />
                <p>
                  {{ $t('ABOUT_SITE') }}
                </p>
              </div>
            </div>

            <div>
              <Tabs :countries="countries" :src="srcCurrency" />
            </div>

            <div>
              <div class="border p-2">
                {{ `${srcCurrency.call} ${srcCurrency.currency_name} (${srcCurrency.currency_code})` }} is an official
                currency in the following countries: {{ srcCurrency.country_name }}
              </div>
              <br />
              <div class="border p-2">
                Link to this page. If you would like to link to <b>{{ `${srcCurrency.call} ${srcCurrency.currency_name}
                  (${srcCurrency.currency_code})` }}</b> exchange rates page, simply copy and paste the HTML from below
                into your page:
              </div>
              <textarea
                class="w-full"><a href="{{ SERVER_URL }}{{ genCurrencyLink(srcCurrency) }}">{{ `${srcCurrency.call} ${srcCurrency.currency_name} (${srcCurrency.currency_code})` }}  exchange rates</a></textarea>
            </div>
          </div>
          <div class="lg:block md:hidden sm:hidden hidden">
            <CurrienciesView :countries="countries" />
          </div>
        </div>
      </div>

      <!-- Convert src to dest -->
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" v-else-if="mode == 2">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-12 flex gap-3 pb-6">
          <div>
            <div class="mb-3">
              <h1 class="fs-22 font-bold">
                How much is {{ balance }} {{ `${srcCurrency.call} ${srcCurrency.currency_name}` }}
                ({{ srcCurrency.currency_code }}) in {{ `${srcCurrency.call} ${srcCurrency.currency_name}` }} {{ `${destCurrency.call} ${destCurrency.currency_name}` }} {{ srcCurrency.currency_name }}?
              </h1>
            </div>

            <div class="p-2 flex flex-col rounded-md border items-center mb-3">
              <div>
                <h2 style="color: #f96010; font-weight: 700; font-size: 1.4rem">
                  {{ balance }} {{ srcCurrency.currency_code }} =
                  {{ Math.round((balance * destCurrency.latest_currency['balance'] / srcCurrency.latest_currency['balance']) * 1e5) / 1e5 }}
                  {{ destCurrency.currency_code }}
                </h2>
              </div>

              <hr class="w-full" />

              <div class="flex w-full justify-around mt-3 flex-wrap">
                <div class="flex flex-col items-center">
                  <div class="currency-flag">
                    <Link :href="genCurrencyLink(srcCurrency)">
                    Check this currency</Link>
                  </div>
                  <div class="currency-flag">
                    <Link :href="genCurrencyLink(srcCurrency)">
                      {{ `${srcCurrency.call} ${srcCurrency.currency_name}` }}</Link>
                  </div>
                  <div>
                    1 {{ `${srcCurrency.call} ${srcCurrency.currency_name}` }} ({{
                      srcCurrency.currency_sign
                    }}) = {{ Math.round((destCurrency.latest_currency['balance'] / srcCurrency.latest_currency['balance']) * 1e5) / 1e5 }}
                    {{ `${destCurrency.call} ${destCurrency.currency_name}` }} ({{
                      destCurrency.currency_sign
                    }})
                  </div>
                </div>
                <div class="flex flex-col items-center">
                  <div class="currency-flag">
                    <Link :href="genCurrencyLink(destCurrency)">
                    Check this currency</Link>
                  </div>
                  <div class="currency-flag">
                    <Link :href="genCurrencyLink(destCurrency)" >
                      {{ `${destCurrency.call} ${destCurrency.currency_name}` }}
                    </Link>
                  </div>
                  <div>
                    1 {{ `${destCurrency.call} ${destCurrency.currency_name}` }} ({{
                      destCurrency.currency_sign
                    }}) = {{ Math.round((srcCurrency.latest_currency['balance'] / destCurrency.latest_currency['balance']) * 1e5) / 1e5 }}
                    {{ `${srcCurrency.call} ${srcCurrency.currency_name}` }} ({{
                      srcCurrency.currency_sign
                    }})
                  </div>
                </div>
              </div>

              <hr class="w-full mt-3 mb-2" />

              <p>Last update {{ new Date(srcCurrency.latest_currency['date']) }}.</p>
            </div>

            <Converter :countries="countries" :src="srcCurrency" :dest="destCurrency" :default="balance"/>

            <div>
              <p>
                You have just converted <b>{{ balance }} {{ srcCurrency.currency_code }} to {{ destCurrency.currency_code }} - {{ srcCurrency.currency_name }} to {{ destCurrency.currency_name }}</b>. To
                convert it, we have used value of 
                <b>1 {{ srcCurrency.currency_code }} = {{ Math.round((destCurrency.latest_currency['balance'] / srcCurrency.latest_currency['balance']) * 1e5) / 1e5 }} {{ destCurrency.currency_code }}</b>. 
                You can convert <b>{{ `${srcCurrency.call} ${srcCurrency.currency_name}` }}</b> to any other
                currency using the above form. Invert exchange - 
                How much is 1 EUR to USD ? Go to USD dollar converter and calculator.
              </p>
            </div>

            <div>
              <div class="text-lg font-bold mt-6 mb-1">Currency converter. Check the current exchange rate of {{ srcCurrency.currency_code }} to {{ destCurrency.currency_code }}</div>
              <table class="w-full text-left rtl:text-right text-gray-500">
                <thead class="text-gray-700 bg-gray-50 font-bold">
                  <tr>
                    <th scope="col" class="px-1 py-2 border">
                      {{ srcCurrency.currency_code }} to {{ destCurrency.currency_code }} ({{ srcCurrency.call }} {{ srcCurrency.currency_name }})
                    </th>
                    <th scope="col" class="px-1 py-2 border">
                      {{ destCurrency.currency_code }} to {{ srcCurrency.currency_code }} ({{ destCurrency.call }} {{ destCurrency.currency_name }})
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(item, index) in props.range" :key="index">
                    <td class="p-1 border">
                      <Link :href="genConvertLink(destCurrency, srcCurrency, Math.round(item[0] * destCurrency.latest_currency['balance'] / srcCurrency.latest_currency['balance'] * 1e5) / 1e5)" class="text-blue-500 hover:text-gray-500">{{ new Intl.NumberFormat().format(item[0]) }} {{ srcCurrency.currency_name }} ({{ srcCurrency.currency_code }}) = 
                      {{ new Intl.NumberFormat().format(Math.round(item[0] * destCurrency.latest_currency['balance'] / srcCurrency.latest_currency['balance'] * 1e5) / 1e5)  }} 
                      {{ destCurrency.currency_code }}</Link>
                    </td>
                    <td class="p-1 border">
                      <Link :href="genConvertLink(srcCurrency, destCurrency, Math.round(item[1] * srcCurrency.latest_currency['balance'] / destCurrency.latest_currency['balance'] * 1e5) / 1e5)" class="text-blue-500 hover:text-gray-500">{{ new Intl.NumberFormat().format(item[1]) }} {{ destCurrency.currency_name }} ({{ destCurrency.currency_code }}) = 
                      {{ new Intl.NumberFormat().format(Math.round(item[1] * srcCurrency.latest_currency['balance'] / destCurrency.latest_currency['balance'] * 1e5) / 1e5)  }} 
                      {{ srcCurrency.currency_code }}</Link>
                    </td>
                  </tr>
                </tbody>
              </table>

              <div class="text-lg font-bold mt-6 mb-1">Currency exchange history from {{ moment(Date.now()).format("dddd DD MMMM, YYYY") }} to {{ moment(Date.now() - 60 * 60 * 24 * 30).format("dddd DD MMMM, YYYY") }}</div>
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
                      <Link :href="genConvertLink(destCurrency, srcCurrency, balance)" class="text-blue-500 hover:text-gray-500">{{ balance }} {{ srcCurrency.currency_code }}</Link> = <Link :href="genConvertLink(destCurrency, srcCurrency, Math.ceil(Math.round(balance * destCurrency.latest_currency['balance'] / srcCurrency.latest_currency['balance'] * 1e5) / 1e5))" class="text-blue-500 hover:text-gray-500">{{ Math.round(balance * destCurrency.latest_currency['balance'] / srcCurrency.latest_currency['balance'] * 1e5) / 1e5 }} {{ destCurrency.currency_code }}</Link>
                    </td>
                  </tr>
                </tbody>
              </table>

              <!-- Other currencies -->
              <div class="text-lg font-bold mt-6 mb-1">{{ balance }} {{ srcCurrency.currency_code }} in other currencies</div>
              <div class="flex w-full flex-wrap">
                <div 
                  v-for="country in props.countries.filter((item: Country) => item.order > 10)" 
                  :key="country.id" 
                  class="w-1/2 p-2 border text-gray-500"
                  >
                  <Link :href="genConvertLink(country, srcCurrency, balance)" class="text-blue-500 hover:text-gray-500">{{ new Intl.NumberFormat().format(balance) }} {{ srcCurrency.call }} {{ srcCurrency.currency_name }} ({{ srcCurrency.currency_code }})</Link> = 
                  <Link :href="genConvertLink(country, srcCurrency, balance)" class="text-blue-500 hover:text-gray-500">{{ new Intl.NumberFormat().format(Math.round(balance * country.latest_currency['balance'] / srcCurrency.latest_currency['balance'] * 1e5) / 1e5) }} 
                  {{ country.currency_name }} {{ country.currency_code }}</Link>
                </div>
              </div>
            </div>
          </div>
          <div>
            <CurrienciesView :countries="countries" />
          </div>
        </div>
      </div>

      <!-- Calculator page -->
      <div class="flex max-w-7xl mx-auto sm:px-6 lg:px-8" v-else-if="props.mode == 4">
        <div class="flex bg-white overflow-hidden shadow-sm sm:rounded-lg px-12 pb-12 lg:gap-5 flex-col">
          <div class="mb-3">
            <div class="text-2xl pt-6 pb-3 text-gray-500 font-extrabold">
              {{ `${srcCurrency.call} ${srcCurrency.currency_name}` }}
              ({{ srcCurrency.currency_code }}) Currency Exchange Rate calculator
            </div>
            <p>Last update {{ new Date(srcCurrency.latest_currency['date']) }}.</p>
          </div>

          <div class="text-gray-900 flex p-3 gap-3 justify-between flex-wrap">
            <div v-for="(country, index) in props.topCountries" :key="country.id" :class="index == 0
              ? 'flex flex-col items-center gap-1 pr-10'
              : 'flex flex-col items-center gap-1'
              ">
              <div v-if="index != 0">
                <Link :href="genConvertLink(srcCurrency, country, 100)">
                  <img :src="genFlagUrl(country.country_code)" :alt="country.country_name" />
                </Link>
              </div>
              <div v-else><img :src="genFlagUrl(country.country_code)" :alt="country.country_name" /></div>
              <div v-if="index != 0" class="currency-flag">
                <Link :href="genConvertLink(srcCurrency, country, 100)">
                  {{ country.currency_code }}
                </Link>
              </div>
              <div v-else>&nbsp;</div>
              <div v-if="index == 0">1 {{ country.currency_code }} =</div>
              <div v-else>
                {{
                  country.currency_sign == "$"
                    ? `$${Math.round((country.latest_currency['balance'] / srcCurrency.latest_currency['balance']) * 100) / 100
                    }`
                    : `${Math.round((country.latest_currency['balance'] / srcCurrency.latest_currency['balance']) * 100) / 100
                    }${country.currency_sign}`
                }}
              </div>
            </div>
          </div>

          <Converter class="pb-3 pt-3" :countries="countries" :src="srcCurrency" :dest="destCurrency" :default="props.balance" :mode="1"/>

          <div>
            <CalculatorTable :countries="countries" :src="srcCurrency" :balance="props.balance" />
          </div>
          
          <div>
            <div class="border p-2">
              {{ `${srcCurrency.call} ${srcCurrency.currency_name} (${srcCurrency.currency_code})` }} is an official
              currency in the following countries: {{ srcCurrency.country_name }}
            </div>
            <br />
            <div class="border p-2">
              Link to this page. If you would like to link to <b>{{ `${srcCurrency.call} ${srcCurrency.currency_name}
                (${srcCurrency.currency_code})` }}</b> exchange rates page, simply copy and paste the HTML from below
              into your page:
            </div>
            <textarea
              class="w-full"><a href="{{ SERVER_URL }}{{ genCurrencyLink(srcCurrency) }}">{{ `${srcCurrency.call} ${srcCurrency.currency_name} (${srcCurrency.currency_code})` }}  exchange rates</a></textarea>
          </div>
        </div>
      </div>

      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" v-else>
        <div class="flex bg-white overflow-hidden shadow-sm sm:rounded-lg px-12 pb-12 lg:gap-5">
          <div>
            <div class="mb-3">
              <h1 class="fs-22 font-bold">
                {{ genCurrencyFullName(props.srcCurrency) }} - Current currency exchange converter page
              </h1>
              <p>Last update {{ new Date(srcCurrency.latest_currency['date']) }}</p>
            </div>

            <div class="text-gray-900 flex p-3 gap-3 justify-center flex-wrap">
              <div v-for="(country, index) in props.topCountries" :key="country.id" :class="index == 0
                ? 'flex flex-col items-center gap-1 pr-10'
                : 'flex flex-col items-center gap-1'
                ">
                <div v-if="index != 0">
                  <Link :href="genConvertLink(srcCurrency, country, 100)">
                    <img :src="genFlagUrl(country.country_code)" :alt="country.country_name" />
                  </Link>
                </div>
                <div v-else><img :src="genFlagUrl(country.country_code)" :alt="country.country_name" /></div>
                <div v-if="index != 0" class="currency-flag">
                  <Link :href="genConvertLink(srcCurrency, country, 100)">
                    {{ country.currency_code }}
                  </Link>
                </div>
                <div v-else>&nbsp;</div>
                <div v-if="index == 0">1 {{ country.currency_code }} =</div>
                <div v-else>
                  {{
                    country.currency_sign == "$"
                      ? `$${Math.round((country.latest_currency['balance'] / srcCurrency.latest_currency['balance']) * 100) / 100
                      }`
                      : `${Math.round((country.latest_currency['balance'] / srcCurrency.latest_currency['balance']) * 100) / 100
                      }${country.currency_sign}`
                  }}
                </div>
              </div>
            </div>

            <Converter class="pb-3 pt-3" :countries="countries" :src="srcCurrency" :dest="destCurrency" :default="1" />

            <div class="p-2 flex flex-col rounded-md border items-center">
              <div>
                <span>What is the exchange rate of 1
                  {{ `${srcCurrency.call} ${srcCurrency.currency_name}` }} in
                  {{ `${destCurrency.call} ${destCurrency.currency_name}` }}?</span>
              </div>
              <div>
                <h2 style="color: #f96010; font-weight: 700; font-size: 1.4rem">
                  1 {{ srcCurrency.currency_code }} =
                  {{ Math.round((destCurrency.latest_currency['balance'] / srcCurrency.latest_currency['balance']) * 1e5) / 1e5 }}
                  {{ destCurrency.currency_code }}
                </h2>
              </div>

              <hr class="w-full" />

              <div class="flex w-full justify-around mt-3 flex-wrap">
                <div class="flex flex-col items-center">
                  <div class="currency-flag">
                    <Link :href="genCurrencyLink(srcCurrency)">
                    Check this
                    currency</Link>
                  </div>
                  <div class="currency-flag">
                    <Link :href="genCurrencyLink(srcCurrency)">
                      {{ `${srcCurrency.call} ${srcCurrency.currency_name}` }}
                    </Link>
                  </div>
                  <div>
                    1 {{ `${srcCurrency.call} ${srcCurrency.currency_name}` }} ({{
                      srcCurrency.currency_sign
                    }}) = {{ Math.round((destCurrency.latest_currency['balance'] / srcCurrency.latest_currency['balance']) * 1e5) / 1e5 }}
                    {{ `${destCurrency.call} ${destCurrency.currency_name}` }} ({{
                      destCurrency.currency_sign
                    }})
                  </div>
                </div>
                <div class="flex flex-col items-center">
                  <div class="currency-flag">
                    <Link :href="genCurrencyLink(destCurrency)">
                      Check this currency
                    </Link>
                  </div>
                  <div class="currency-flag">
                    <Link :href="genCurrencyLink(destCurrency)">
                      {{ `${destCurrency.call} ${destCurrency.currency_name}` }}
                    </Link>
                  </div>
                  <div>
                    1 {{ `${destCurrency.call} ${destCurrency.currency_name}` }} ({{
                      destCurrency.currency_sign
                    }}) = {{ Math.round((srcCurrency.latest_currency['balance'] / destCurrency.latest_currency['balance']) * 1e5) / 1e5 }}
                    {{ `${srcCurrency.call} ${srcCurrency.currency_name}` }} ({{
                      srcCurrency.currency_sign
                    }})
                  </div>
                </div>
              </div>

              <hr class="w-full mt-4 mb-2 border" />

              <div>
                <p>
                  On this page, you can find conversion of
                  <b>1 {{ srcCurrency.call }} {{ srcCurrency.currency_name }} ({{ srcCurrency.currency_code }}) to
                    {{ destCurrency.call }} {{ destCurrency.currency_name }} ({{ destCurrency.currency_code }})</b>.
                  Calculator shows the exchange rate of the two currencies conversion. Please find above the latest
                  exchange rate between them, updated at {{ srcCurrency.latest_currency['date'] }}. If you want to calculate
                  <b>{{ srcCurrency.call }} {{ srcCurrency.currency_name }}</b> or to many currencies,
                  then please go to
                  <Link :href="genCalculatorLink(srcCurrency)" class="text-blue-500 hover:text-gray-500">{{
                    srcCurrency.currency_code }} calculator</Link> or
                  <Link :href="genCalculatorLink(destCurrency)" class="text-blue-500 hover:text-gray-500">{{
                    destCurrency.currency_code }} calculator</Link>. Our money
                  converter is using actual average data from different currency rates sources.
                </p>
              </div>
            </div>
            <div>
              <Tabs :countries="countries" :src="srcCurrency" />
            </div>

            <div>
              <div class="border p-2">
                {{ `${srcCurrency.call} ${srcCurrency.currency_name} (${srcCurrency.currency_code})` }} is an official
                currency in the following countries: {{ srcCurrency.country_name }}
              </div>
              <br />
              <div class="border p-2">
                Link to this page. If you would like to link to <b>{{ `${srcCurrency.call} ${srcCurrency.currency_name}
                  (${srcCurrency.currency_code})` }}</b> exchange rates page, simply copy and paste the HTML from below
                into your page:
              </div>
              <textarea
                class="w-full"><a href="{{ SERVER_URL }}{{ genCurrencyLink(srcCurrency) }}">{{ `${srcCurrency.call} ${srcCurrency.currency_name} (${srcCurrency.currency_code})` }}  exchange rates</a></textarea>
            </div>
          </div>
          <div class="lg:block md:hidden sm:hidden hidden">
            <CurrienciesView :countries="countries" />
          </div>
        </div>
      </div>
    </div>
  </MainLayout>
</template>
