<template>
  <div>
    <div class="border p-2">
      <div class="text-lg font-bold">Currency Exchange Rate calculator  {{ src.call }} {{ src.currency_name }} - {{ src.currency_name }} to all worldwide currencies.</div>
      <div>
        On the calculator page, you can find conversion of <b>{{ balance }} {{ src.call }} {{ src.currency_name }}</b> to all worldwide currencies. 
        Please find latest calculation rates between them, updated at {{ src.latest_currency['date'] }}. 
        If you want to calculate  {{ src.call }} {{ src.currency_name }} to other currencies, go to converter page  {{ src.call }} {{ src.currency_name }} , or currency page {{ src.call }} {{ src.currency_name }}.
      </div>
    </div>  
    <table class="w-full text-left rtl:text-right text-gray-500">
      <thead class="text-gray-700 bg-gray-50 font-bold">
        <tr>
          <th scope="col" class="px-1 py-2 border">
            Currency
          </th>
          <th scope="col" class="px-1 py-2 border">
            Current FX rate
          </th>
          <th scope="col" class="px-1 py-2 border text-nowrap">
            Last update
          </th>
          <th scope="col" class="px-1 py-2 border">
            Convert
          </th>
          <th scope="col" class="px-1 py-2 border text-nowrap">
            FX calculator
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th colspan="5" class="border p-2 text-md font-bold">
            Conversion table for major world currencies
          </th>
        </tr>

        <tr v-for="country in props.countries.filter((item: Country) => item.order >= 10 && item.value > 0)" :key="country.id"
          class="bg-white border-b">
          <th class="p-1 border text-md">
            <Link :href="genCurrencyLink(country)" class="text-blue-500 hover:text-gray-500">
            <img :src="genFlagUrl(country.country_code)" class="inline-block" :alt="country.country_name" />
            {{ `${country.call} ${country.currency_name} (${country.currency_code})` }}
            </Link>
          </th>
          <td class="p-1 border text-sm">
            {{ props.balance }} <Link :href="genCurrencyLink(src)" class="text-blue-500 hover:text-gray-500">
            {{ props.src?.currency_code }}</Link> = {{ props.balance * Math.round(country.value / src.value * 1e5) / 1e5
            }} <Link :href="genCurrencyLink(country)" class="text-blue-500 hover:text-gray-500">{{ country.currency_code }}</Link> 
          </td>
          <td class="p-1 border text-sm">
            {{ country.latest_currency['date'] }}
          </td>
          <td class="p-1 border text-sm">
            <Link :href="genConvertLink(src, country, balance)" class="text-blue-500 hover:text-gray-500">
            Convert {{ src.currency_code }} to {{ country.currency_code }}
            </Link>
          </td>
          <td class="p-1 border text-sm">
            <Link :href="genCalculatorLink(country)" class="text-blue-500 hover:text-gray-500">
            FX calculator {{ country.currency_code }} 
            </Link>
          </td>
        </tr>

        <tr>
          <th colspan="5" class="border p-2 text-md font-bold">
            Asia
          </th>
        </tr>

        <tr v-for="country in props.countries.filter((item: Country) => item.continent === 'Asia' && item.value > 0)" :key="country.id"
          class="bg-white border-b">
          <th class="p-1 border text-md">
            <Link :href="genCurrencyLink(country)" class="text-blue-500 hover:text-gray-500">
            <img :src="genFlagUrl(country.country_code)" class="inline-block" :alt="country.country_name" />
            {{ `${country.call} ${country.currency_name} (${country.currency_code})` }}
            </Link>
          </th>
          <td class="p-1 border text-sm">
            {{ props.balance }} <Link :href="genCurrencyLink(src)" class="text-blue-500 hover:text-gray-500">
            {{ props.src?.currency_code }}</Link> = {{ props.balance * Math.round(country.value / src.value * 1e5) / 1e5
            }} <Link :href="genCurrencyLink(country)" class="text-blue-500 hover:text-gray-500">{{ country.currency_code }}</Link> 
          </td>
          <td class="p-1 border text-sm">
            {{ country.latest_currency['date'] }}
          </td>
          <td class="p-1 border text-sm">
            <Link :href="genConvertLink(src, country, balance)" class="text-blue-500 hover:text-gray-500">
            Convert {{ src.currency_code }} to {{ country.currency_code }}
            </Link>
          </td>
          <td class="p-1 border text-sm">
            <Link :href="genCalculatorLink(country)" class="text-blue-500 hover:text-gray-500">
            FX calculator {{ country.currency_code }} 
            </Link>
          </td>
        </tr>

        <tr>
          <th colspan="5" class="border p-2 text-md font-bold">
            Africa
          </th>
        </tr>

        <tr v-for="country in props.countries.filter((item: Country) => item.continent === 'Africa' && item.value > 0)" :key="country.id"
          class="bg-white border-b">
          <th class="p-1 border text-md">
            <Link :href="genCurrencyLink(country)" class="text-blue-500 hover:text-gray-500">
            <img :src="genFlagUrl(country.country_code)" class="inline-block" :alt="country.country_name" />
            {{ `${country.call} ${country.currency_name} (${country.currency_code})` }}
            </Link>
          </th>
          <td class="p-1 border text-sm">
            {{ props.balance }} <Link :href="genCurrencyLink(src)" class="text-blue-500 hover:text-gray-500">
            {{ props.src?.currency_code }}</Link> = {{ props.balance * Math.round(country.value / src.value * 1e5) / 1e5
            }} <Link :href="genCurrencyLink(country)" class="text-blue-500 hover:text-gray-500">{{ country.currency_code }}</Link> 
          </td>
          <td class="p-1 border text-sm">
            {{ country.latest_currency['date'] }}
          </td>
          <td class="p-1 border text-sm">
            <Link :href="genConvertLink(src, country, balance)" class="text-blue-500 hover:text-gray-500">
            Convert {{ src.currency_code }} to {{ country.currency_code }}
            </Link>
          </td>
          <td class="p-1 border text-sm">
            <Link :href="genCalculatorLink(country)" class="text-blue-500 hover:text-gray-500">
            FX calculator {{ country.currency_code }} 
            </Link>
          </td>
        </tr>

        <tr>
          <th colspan="5" class="border p-2 text-md font-bold">
            Europe
          </th>
        </tr>

        <tr v-for="country in props.countries.filter((item: Country) => item.continent === 'Europe' && item.value > 0)" :key="country.id"
          class="bg-white border-b">
          <th class="p-1 border text-md">
            <Link :href="genCurrencyLink(country)" class="text-blue-500 hover:text-gray-500">
            <img :src="genFlagUrl(country.country_code)" class="inline-block" :alt="country.country_name" />
            {{ `${country.call} ${country.currency_name} (${country.currency_code})` }}
            </Link>
          </th>
          <td class="p-1 border text-sm">
            {{ props.balance }} <Link :href="genCurrencyLink(src)" class="text-blue-500 hover:text-gray-500">
            {{ props.src?.currency_code }}</Link> = {{ props.balance * Math.round(country.value / src.value * 1e5) / 1e5
            }} <Link :href="genCurrencyLink(country)" class="text-blue-500 hover:text-gray-500">{{ country.currency_code }}</Link> 
          </td>
          <td class="p-1 border text-sm">
            {{ country.latest_currency['date'] }}
          </td>
          <td class="p-1 border text-sm">
            <Link :href="genConvertLink(src, country, balance)" class="text-blue-500 hover:text-gray-500">
            Convert {{ src.currency_code }} to {{ country.currency_code }}
            </Link>
          </td>
          <td class="p-1 border text-sm">
            <Link :href="genCalculatorLink(country)" class="text-blue-500 hover:text-gray-500">
            FX calculator {{ country.currency_code }} 
            </Link>
          </td>
        </tr>

        <tr>
          <th colspan="5" class="border p-2 text-md font-bold">
            Middle East
          </th>
        </tr>

        <tr v-for="country in props.countries.filter((item: Country) => item.continent === 'MiddleEastAsia' && item.value > 0)" :key="country.id"
          class="bg-white border-b">
          <th class="p-1 border text-md">
            <Link :href="genCurrencyLink(country)" class="text-blue-500 hover:text-gray-500">
            <img :src="genFlagUrl(country.country_code)" class="inline-block" :alt="country.country_name" />
            {{ `${country.call} ${country.currency_name} (${country.currency_code})` }}
            </Link>
          </th>
          <td class="p-1 border text-sm">
            {{ props.balance }} <Link :href="genCurrencyLink(src)" class="text-blue-500 hover:text-gray-500">
            {{ props.src?.currency_code }}</Link> = {{ props.balance * Math.round(country.value / src.value * 1e5) / 1e5
            }} <Link :href="genCurrencyLink(country)" class="text-blue-500 hover:text-gray-500">{{ country.currency_code }}</Link> 
          </td>
          <td class="p-1 border text-sm">
            {{ country.latest_currency['date'] }}
          </td>
          <td class="p-1 border text-sm">
            <Link :href="genConvertLink(src, country, balance)" class="text-blue-500 hover:text-gray-500">
            Convert {{ src.currency_code }} to {{ country.currency_code }}
            </Link>
          </td>
          <td class="p-1 border text-sm">
            <Link :href="genCalculatorLink(country)" class="text-blue-500 hover:text-gray-500">
            FX calculator {{ country.currency_code }} 
            </Link>
          </td>
        </tr>

        <tr>
          <th colspan="5" class="border p-2 text-md font-bold">
            North, Central and South America
          </th>
        </tr>

        <tr v-for="country in props.countries.filter((item: Country) => item.continent === 'America' && item.value > 0)" :key="country.id"
          class="bg-white border-b">
          <th class="p-1 border text-md">
            <Link :href="genCurrencyLink(country)" class="text-blue-500 hover:text-gray-500">
            <img :src="genFlagUrl(country.country_code)" class="inline-block" :alt="country.country_name" />
            {{ `${country.call} ${country.currency_name} (${country.currency_code})` }}
            </Link>
          </th>
          <td class="p-1 border text-sm">
            {{ props.balance }} <Link :href="genCurrencyLink(src)" class="text-blue-500 hover:text-gray-500">
            {{ props.src?.currency_code }}</Link> = {{ props.balance * Math.round(country.value / src.value * 1e5) / 1e5
            }} <Link :href="genCurrencyLink(country)" class="text-blue-500 hover:text-gray-500">{{ country.currency_code }}</Link> 
          </td>
          <td class="p-1 border text-sm">
            {{ country.latest_currency['date'] }}
          </td>
          <td class="p-1 border text-sm">
            <Link :href="genConvertLink(src, country, balance)" class="text-blue-500 hover:text-gray-500">
            Convert {{ src.currency_code }} to {{ country.currency_code }}
            </Link>
          </td>
          <td class="p-1 border text-sm">
            <Link :href="genCalculatorLink(country)" class="text-blue-500 hover:text-gray-500">
            FX calculator {{ country.currency_code }} 
            </Link>
          </td>
        </tr>

        <tr>
          <th colspan="5" class="border p-2 text-md font-bold">
            Oceania & Pacific
          </th>
        </tr>

        <tr v-for="country in props.countries.filter((item: Country) => item.continent === 'Oceania' && item.value > 0)" :key="country.id"
          class="bg-white border-b">
          <th class="p-1 border text-md">
            <Link :href="genCurrencyLink(country)" class="text-blue-500 hover:text-gray-500">
            <img :src="genFlagUrl(country.country_code)" class="inline-block" :alt="country.country_name" />
            {{ `${country.call} ${country.currency_name} (${country.currency_code})` }}
            </Link>
          </th>
          <td class="p-1 border text-sm">
            {{ props.balance }} <Link :href="genCurrencyLink(src)" class="text-blue-500 hover:text-gray-500">
            {{ props.src?.currency_code }}</Link> = {{ props.balance * Math.round(country.value / src.value * 1e5) / 1e5
            }} <Link :href="genCurrencyLink(country)" class="text-blue-500 hover:text-gray-500">{{ country.currency_code }}</Link> 
          </td>
          <td class="p-1 border text-sm">
            {{ country.latest_currency['date'] }}
          </td>
          <td class="p-1 border text-sm">
            <Link :href="genConvertLink(src, country, balance)" class="text-blue-500 hover:text-gray-500">
            Convert {{ src.currency_code }} to {{ country.currency_code }}
            </Link>
          </td>
          <td class="p-1 border text-sm">
            <Link :href="genCalculatorLink(country)" class="text-blue-500 hover:text-gray-500">
            FX calculator {{ country.currency_code }} 
            </Link>
          </td>
        </tr>

      </tbody>
    </table>
  </div>
</template>

<script setup lang="ts">
import { computed } from 'vue';
import { Country } from "@/types";
import { Link } from "@inertiajs/vue3";
import { genCalculatorLink, genConvertLink, genCurrencyLink, genFlagUrl } from "@/utils";

const props = withDefaults(
  defineProps<{
    countries: [Country];
    src: Country;
    balance?: number
  }>(),
  {
    balance: 100
  }
);
</script>