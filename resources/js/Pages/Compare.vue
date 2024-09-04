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
  mode: 1,
  official: ""
});

console.log(props.mode, " :mode")

const balance = ref(props.balance)

onMounted(() => {
    balance.value = Math.pow(10, Math.floor(Math.log10(props.srcCurrency.latest_currency['balance'])));
    if(balance.value < 1) balance.value = 1;
})

const { t } = useI18n();

const title = computed(() => {
  switch(props.mode) {
    case 1:
      return t('MAIN_HEAD', { 
        src: genCurrencyFullName(props.srcCurrency),
        dest: genCurrencyFullName(props.destCurrency)
      });
      break;
    case 3:
      return t('MAIN_HEAD', { 
        src: genCurrencyFullName(props.srcCurrency), 
        dest: genCurrencyFullName(props.destCurrency)
      });
      break;
    default: return "Home";
  }
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
      <!-- Main page -->
      <div class="flex max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex bg-white shadow-sm sm:rounded-lg md:px-12 md:pb-12 min-[320px]:px-2 min-[320px]:pb-6 lg:gap-5 max-[1080px]:flex-wrap">
          <div>
            <!-- Title -->
            <div class="mb-3">
              <div class="text-md pt-6 pb-3">
                {{ $t('PAGE_TITLE', { currency: `${srcCurrency.call} ${srcCurrency.currency_name} ${srcCurrency.currency_code}`}) }}
              </div>
              <div class="text-sm">{{ $t('UPDATED_TIME', { date: moment(srcCurrency.latest_currency['date']).format('DD MMMM YYYY HH:mm [UTC]') }) }}</div>
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
                  {{ disValue(srcCurrency, country, balance, true) }}
                </div>
              </div>
            </div>

            <!-- Convert function -->
            <Converter class="pb-3 pt-3" :countries="countries" :src="srcCurrency" :dest="destCurrency" :default="1" />

            <div class="p-2 flex flex-col rounded-md border items-center">
              <div class="min-[1080px]:text-md font-medium">
                {{ 
                  $t('PAGE_EXCHANGE_RATE', { 
                    amount: 1, 
                    src: `${srcCurrency.call} ${srcCurrency.currency_name}`,
                    dest: `${destCurrency.call} ${destCurrency.currency_name}`
                  })
                }}
              </div>
              <div>
                <h2 style="color: #f96010; font-weight: 700; font-size: 1.4rem">
                  {{ disSingleValue(1) }} {{ srcCurrency.currency_code }} = {{ disValue(srcCurrency, destCurrency, 1) }} {{ destCurrency.currency_code }}
                </h2>
              </div>

              <hr class="w-full" />

              <div class="flex w-full justify-around mt-3 flex-wrap">
                <div class="flex flex-col items-center">
                  <div class="currency-flag">
                    <Link :href="genCurrencyLink(srcCurrency)">
                    {{ $t('CHECK_CURRENCY') }}</Link>
                  </div>
                  <div class="currency-flag">
                    <Link :href="genCurrencyLink(srcCurrency)">
                      {{ `${srcCurrency.call} ${srcCurrency.currency_name}` }}
                    </Link>
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
                    {{ `${destCurrency.call} ${destCurrency.currency_name}` }}</Link>
                  </div>
                  <div>
                    1 {{ `${destCurrency.call} ${destCurrency.currency_name}` }} ({{ destCurrency.currency_sign }}) = 
                    {{ disValue(destCurrency, srcCurrency) }}
                    {{ `${srcCurrency.call} ${srcCurrency.currency_name}` }} ({{ srcCurrency.currency_sign }})
                  </div>
                </div>
              </div>

              <hr class="w-full mt-4 mb-2 border" />

              <!-- Tip box -->
              <div>
                <div v-html="$t('PAGE_CONTENT', {
                  amount: disSingleValue(1),
                  src_cuname: `${srcCurrency.call} ${srcCurrency.currency_name}`,
                  src_code: srcCurrency.currency_code,
                  dest_cuname: `${ srcCurrency.call } ${ srcCurrency.currency_name }`,
                  dest_code: destCurrency.currency_code,
                  src_date: srcCurrency.latest_currency['date'],
                  link1: genCalculatorLink(srcCurrency),
                  link2: genCalculatorLink(destCurrency)
                })"></div>
              </div>
            </div>
            
            <!-- Countries tab section -->
            <div>
              <Tabs :countries="countries" :src="srcCurrency" />
            </div>

            <!-- Link section -->
            <div>
              <div class="border p-2">
                {{ $t('LINK_TEXT', { name: `${srcCurrency.call} ${srcCurrency.currency_name}`, code: srcCurrency.currency_code, countries: official })}}
              </div>
              <br />
              <div class="border p-2">
                {{ $t('LINK_TEXT', { name: `${srcCurrency.call} ${srcCurrency.currency_name}`, code: srcCurrency.currency_code})}}
              </div>
              <textarea aria-label="link-address" class="w-full"><a href="{{ SERVER_URL }}{{ genCurrencyLink(srcCurrency) }}">{{ `${srcCurrency.call} ${srcCurrency.currency_name} (${srcCurrency.currency_code})` }}  exchange rates</a></textarea>
            </div>
          </div>

          <!-- Display country categories -->
          <div>
            <CurrienciesView :countries="countries" />
          </div>
        </div>
      </div>

    </div>
  </MainLayout>
</template>
