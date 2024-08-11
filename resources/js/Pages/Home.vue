<script setup lang="ts">
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import Tabs from "@/Components/Tabs.vue";
import Converter from "@/Components/Converter.vue";
import CurrienciesView from "@/Components/CurrienciesView.vue";

export interface Country {
  id: number;
  country_name: string;
  country_code: string;
  currency_sign: string;
  currency_code: string;
  currency_name: String;
  call: string;
  date: Date;
  value: number;
  order: number;
}

const props = withDefaults(defineProps<{
  countries: [Country];
  topCountries: [Country];
  srcCurrency: Country;
  destCurrency: Country;
  value?: number;
}>(),{
  value: 1
});

const mode = 1;

const getFlagUrl = function (code: string) {
  return `https://flagcdn.com/32x24/${code.toLowerCase()}.png`;
};
</script>

<template>
  <Head title="Dashboard" />

  <MainLayout>
    <div class="py-6 flex">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex" v-if="mode == 1">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-12 pb-12 flex lg:gap-5">
          <div>
            <div class="mb-3">
              <h1 class="fs-22 font-bold">Convertor valutar online.</h1>
              <p>Convertor valutar (Euro, Dolar, BTC), curs valutar FX și calculator.</p>
              <h1 class="fs-22 font-bold">
                {{ `${srcCurrency.call} ${srcCurrency.currency_name}` }}
                {{ srcCurrency.currency_code }} - Current currency exchange converter page
              </h1>
              <p>Last update {{ new Date(srcCurrency.date) }}.</p>
            </div>

            <div class="text-gray-900 flex mb-6 gap-3 justify-center flex-wrap">
              <div
                v-for="(country, index) in props.topCountries"
                :key="country.id"
                :class="
                  index == 0
                    ? 'flex flex-col items-center gap-1 pr-10'
                    : 'flex flex-col items-center gap-1'
                "
              >
                <div v-if="index != 0">
                  <Link
                    :href="`/currencies/pairs/100-us-dollar-usd-to-${
                      country.call == '' ? '' : country.call.toLowerCase() + '-'
                    }${country.currency_name.toLowerCase()}-${country.currency_code.toLowerCase()}`"
                    ><img :src="getFlagUrl(country.country_code)"
                  /></Link>
                </div>
                <div v-else><img :src="getFlagUrl(country.country_code)" /></div>
                <div v-if="index != 0" class="currency-flag">
                  <Link
                    :href="`/currencies/pairs/100-us-dollar-usd-to-${
                      country.call == '' ? '' : country.call.toLowerCase() + '-'
                    }${country.currency_name.toLowerCase()}-${country.currency_code.toLowerCase()}`"
                    >{{ country.currency_code }}</Link
                  >
                </div>
                <div v-else>&nbsp;</div>
                <div v-if="index == 0">1 {{ country.currency_code }} =</div>
                <div v-else>
                  {{
                    country.currency_sign == "$"
                      ? `$${
                          Math.round((country.value / srcCurrency.value) * 100) / 100
                        }`
                      : `${
                          Math.round((country.value / srcCurrency.value) * 100) / 100
                        }${country.currency_sign}`
                  }}
                </div>
              </div>
            </div>

            <Converter
              :countries="countries"
              :src="srcCurrency"
              :dest="destCurrency"
              :default="1"
            />

            <div class="p-2 flex flex-col rounded-md border-2 items-center">
              <div>
                <span
                  >What is the exchange rate of 1
                  {{ `${srcCurrency.call} ${srcCurrency.currency_name}` }} in
                  {{ `${destCurrency.call} ${destCurrency.currency_name}` }}?</span
                >
              </div>
              <div>
                <h2 style="color: #f96010; font-weight: 700; font-size: 1.4rem">
                  1 {{ srcCurrency.currency_code }} =
                  {{ Math.round((destCurrency.value / srcCurrency.value) * 1e6) / 1e6 }}
                  {{ destCurrency.currency_code }}
                </h2>
              </div>

              <hr class="w-full" />

              <div class="flex w-full justify-around mt-3 flex-wrap">
                <div class="flex flex-col items-center">
                  <div class="currency-flag">
                    <Link
                      :href="`/currencies/pairs/${
                        srcCurrency.call == '' ? '' : srcCurrency.call.toLowerCase() + '-'
                      }${srcCurrency.currency_name.toLowerCase()}-${srcCurrency.currency_code.toLowerCase()}-page`"
                      >Check this currency</Link
                    >
                  </div>
                  <div class="currency-flag">
                    <Link
                      :href="`/currencies/pairs/${
                        srcCurrency.call == '' ? '' : srcCurrency.call.toLowerCase() + '-'
                      }${srcCurrency.currency_name.toLowerCase()}-${srcCurrency.currency_code.toLowerCase()}-page`"
                      >{{ `${srcCurrency.call} ${srcCurrency.currency_name}` }}</Link
                    >
                  </div>
                  <div>
                    1 {{ `${srcCurrency.call} ${srcCurrency.currency_name}` }} ({{
                      srcCurrency.currency_sign
                    }}) = 0.20095
                    {{ `${destCurrency.call} ${destCurrency.currency_name}` }} ({{
                      destCurrency.currency_sign
                    }})
                  </div>
                </div>
                <div class="flex flex-col items-center">
                  <div class="currency-flag">
                    <Link
                      :href="`/currencies/pairs/${
                        destCurrency.call == ''
                          ? ''
                          : destCurrency.call.toLowerCase() + '-'
                      }${destCurrency.currency_name.toLowerCase()}-${destCurrency.currency_code.toLowerCase()}-page`"
                      >Check this currency</Link
                    >
                  </div>
                  <div class="currency-flag">
                    <Link
                      :href="`/currencies/pairs/${
                        destCurrency.call == ''
                          ? ''
                          : destCurrency.call.toLowerCase() + '-'
                      }${destCurrency.currency_name.toLowerCase()}-${destCurrency.currency_code.toLowerCase()}-page`"
                      >{{ `${destCurrency.call} ${destCurrency.currency_name}` }}</Link
                    >
                  </div>
                  <div>
                    1 {{ `${destCurrency.call} ${destCurrency.currency_name}` }} ({{
                      destCurrency.currency_sign
                    }}) = 4.9765
                    {{ `${srcCurrency.call} ${srcCurrency.currency_name}` }} ({{
                      srcCurrency.currency_sign
                    }})
                  </div>
                </div>
              </div>

              <hr class="w-full mt-4 mb-2 border-2" />

              <div>
                <p>
                  On this page, you can find conversion of
                  <b>1 Romanian Leu (RON) to Euro (EUR)</b>. Calculator shows the exchange
                  rate of the two currencies conversion. Please find above the latest
                  exchange rate between them, updated at {{ srcCurrency.date }}. If you
                  want to calculate <b>Romanian Leu</b> or to many currencies, then please
                  go to <a>RON calculator</a> or <a>EUR calculator</a>. Our money
                  converter is using actual average data from different currency rates
                  sources.
                </p>
                <br />
                <p>
                  AZconvert.com is a very useful and convenient currency converter and
                  calculator. You can quickly check the current exchange rates from any
                  country in the world. You just need to put the amount of money you are
                  converting into the box and choose the necessary currencies, e.g. EUR to
                  USD, USD to GBP, EUR to GBP or INR to USD. You can also use our
                  calculator to see what amount of money specified in all the different
                  currencies at one time. Don't forget the charts, to get a quick overview
                  of FX rates in the past 30 days.
                </p>
              </div>
            </div>

            <div>
              <h1>Conversion table for major world currencies</h1>
              <Tabs />
            </div>
          </div>
          <div class="lg:block md:hidden sm:hidden hidden">
            <CurrienciesView :countries="countries" />
          </div>
        </div>
      </div>

      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" v-else-if="mode == 2">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-12 flex gap-3">
          <div>
            <div class="mb-3">
              <h1 class="fs-22 font-bold">
                How much is 100 Euro (Euro) in Euro Vanuatu Vatu Euro?
              </h1>
            </div>

            <div class="p-2 flex flex-col rounded-md border-2 items-center mb-3">
              <div>
                <span>1 RON = 0.20095 EUR</span>
              </div>

              <hr class="w-full" />

              <div class="flex w-full justify-around">
                <div class="flex flex-col items-center">
                  <div>Check this currency</div>
                  <div>Romanian Leu</div>
                  <div>1 Romanian Leu (RON) = 0.20095 Euro (€)</div>
                </div>
                <div class="flex flex-col items-center">
                  <div>Check this currency</div>
                  <div>Euro</div>
                  <div>1 Euro (€ ) = 4.9765 Romanian Leu (RON)</div>
                </div>
              </div>

              <hr class="w-full" />

              <div class="content-start w-full">Last updated at 2024-06-18 01:54:00</div>
            </div>

            <Converter :countries="countries" :src="srcCurrency" :dest="destCurrency" />

            <div>
              <p>
                You have just converted <b>100 EUR to VUV - Euro to Vanuatu Vatu</b> . To
                convert it, we have used value of <b>1 EUR = 127.38 Vanuatu Vatu</b>. You
                can convert <b>Euro</b> to any other currency using the above form. Invert
                exchange - How much is 1 EUR to USD ? Go to USD dollar converter and
                calculator.
              </p>
            </div>

            <div>
              <h1>Currency converter. Check the current exchange rate of EUR to VUV</h1>
            </div>
          </div>
          <div>
            <CurrienciesView :countries="countries" />
          </div>
        </div>
      </div>

      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" v-else>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-12">
          <div class="mb-3">
            <h1 class="fs-22 font-bold">
              Romanian Leu RON - Current currency exchange converter page
            </h1>
            <p>Last update 18 June 2024 01:06 UTC.</p>
          </div>

          <div class="text-gray-900 flex mb-6 gap-3">
            <div
              v-for="curriency in countries"
              :key="curriency.country_code"
              class="flex flex-col items-center gap-1"
            >
              <div><img :src="getFlagUrl(curriency.country_code)" /></div>
              <div>{{ curriency.currency_sign }}</div>
              <div>{{ curriency.value }}</div>
            </div>
          </div>

          <Converter :countries="countries" :src="srcCurrency" :dest="destCurrency" />

          <div class="p-2 flex flex-col rounded-md border-2 items-center">
            <div>
              <span>What is the exchange rate of 1 Romanian Leu in Euro?</span>
            </div>

            <div>
              <span>1 RON = 0.20095 EUR</span>
            </div>

            <hr class="w-full" />

            <div class="flex w-full justify-around">
              <div class="flex flex-col items-center">
                <div>Check this currency</div>
                <div>Romanian Leu</div>
                <div>1 Romanian Leu (RON) = 0.20095 Euro (€)</div>
              </div>
              <div class="flex flex-col items-center">
                <div>Check this currency</div>
                <div>Euro</div>
                <div>1 Euro (€ ) = 4.9765 Romanian Leu (RON)</div>
              </div>
            </div>

            <hr class="w-full" />

            <div>
              <p>
                On this page, you can find conversion of
                <b>1 Romanian Leu (RON) to Euro (EUR)</b>. Calculator shows the exchange
                rate of the two currencies conversion. Please find above the latest
                exchange rate between them, updated at 2024-06-18 01:54:00. If you want to
                calculate <b>Romanian Leu</b> or to many currencies, then please go to
                <a>RON calculator</a> or <a>EUR calculator</a>. Our money converter is
                using actual average data from different currency rates sources.
              </p>
              <br />
              <p>
                AZconvert.com is a very useful and convenient currency converter and
                calculator. You can quickly check the current exchange rates from any
                country in the world. You just need to put the amount of money you are
                converting into the box and choose the necessary currencies, e.g. EUR to
                USD, USD to GBP, EUR to GBP or INR to USD. You can also use our calculator
                to see what amount of money specified in all the different currencies at
                one time. Don't forget the charts, to get a quick overview of FX rates in
                the past 30 days.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </MainLayout>
</template>
