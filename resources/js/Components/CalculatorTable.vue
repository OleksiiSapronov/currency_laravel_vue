<template>
  <div>
    <div class="border p-2">
      <div class="min-[1024px]:text-lg font-bold">
        {{ $t('CALCULATOR_TABLE_TITLE', { name: `${src.call} ${src.currency_name}`, code: src.currency_name }) }}
      </div>
      <div v-html="$t('CALCULATOR_TABLE_DESCRIPTION', {
        amount: disSingleValue(balance),
        date: src.latest_currency['date'],
        name: `${src.call} ${src.currency_name}`,
      })" />
    </div>  
    <table class="w-full text-left rtl:text-right text-gray-500">
      <thead class="text-gray-700 bg-gray-50 font-bold">
        <tr>
          <th scope="col" class="px-1 py-2 border">
            {{ $t('CURRENCY') }}
          </th>
          <th scope="col" class="px-1 py-2 border">
            {{ $t('CURRENT_FX_RATE') }}
          </th>
          <th scope="col" class="px-1 py-2 border text-nowrap max-[768px]:hidden">
            {{ $t('LAST_UPDATE') }}
          </th>
          <th scope="col" class="px-1 py-2 border">
            {{ $t('CONVERT') }}
          </th>
          <th scope="col" class="px-1 py-2 border text-nowrap max-[768px]:hidden">
            {{ $t('FX_CALCULATOR') }}
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th colspan="5" class="border p-2 text-md font-bold">
            {{ $t('PAGE_CONVERT_MAJOR_CURRENCIES') }}
          </th>
        </tr>

        <tr v-for="country in props.countries.filter((item: Country) => item.top_currency == 1 && item.latest_currency['balance'] > 0)" :key="country.id"
          class="bg-white border-b">
          <th class="p-1 border text-md">
            <Link :href="genCurrencyLink(country)" class="text-blue-500 hover:text-gray-500">
              <img height="24" width="32" :src="genFlagUrl(country.country_code)" class="inline-block" :alt="country.country_name" />
              {{ `${country.call} ${country.currency_name} (${country.currency_code})` }}
            </Link>
          </th>
          <td class="p-1 border text-sm">
            {{ disSingleValue(props.balance) }} 
            <Link :href="genCurrencyLink(src)" class="text-blue-500 hover:text-gray-500">
              {{ props.src?.currency_code }}
            </Link> = 
            {{ disValue(src, country) }}
            <Link :href="genCurrencyLink(country)" class="text-blue-500 hover:text-gray-500">{{ country.currency_code }}</Link> 
          </td>
          <td class="p-1 border text-sm max-[768px]:hidden">
            {{ country.latest_currency['date'] }}
          </td>
          <td class="p-1 border text-sm">
            <Link :href="genConvertLink(src, country, balance)" class="text-blue-500 hover:text-gray-500">
            {{ $t('CONVERT') }} {{ src.currency_code }} {{ $t('TO') }} {{ country.currency_code }}
            </Link>
          </td>
          <td class="p-1 border text-sm max-[768px]:hidden">
            <Link :href="genCalculatorLink(country)" class="text-blue-500 hover:text-gray-500">
              {{ $t('FX_CALCULATOR') }} {{ country.currency_code }} 
            </Link>
          </td>
        </tr>

        <tr>
          <th colspan="5" class="border p-2 text-md font-bold">
            {{ $t('TAB_ASIA') }}
          </th>
        </tr>

        <tr v-for="country in props.countries.filter((item: Country) => item.continent === 'Asia' && item.latest_currency['balance'] > 0)" :key="country.id"
          class="bg-white border-b">
          <th class="p-1 border text-md">
            <Link :href="genCurrencyLink(country)" class="text-blue-500 hover:text-gray-500">
            <img height="24" width="32" :src="genFlagUrl(country.country_code)" class="inline-block" :alt="country.country_name" />
            {{ `${country.call} ${country.currency_name} (${country.currency_code})` }}
            </Link>
          </th>
          <td class="p-1 border text-sm">
            {{ disSingleValue(props.balance) }} 
            <Link :href="genCurrencyLink(src)" class="text-blue-500 hover:text-gray-500">
              {{ props.src?.currency_code }}
            </Link> = 
            {{ disValue(src, country) }}
            <Link :href="genCurrencyLink(country)" class="text-blue-500 hover:text-gray-500">{{ country.currency_code }}</Link> 
          </td>
          <td class="p-1 border text-sm max-[768px]:hidden">
            {{ country.latest_currency['date'] }}
          </td>
          <td class="p-1 border text-sm">
            <Link :href="genConvertLink(src, country, balance)" class="text-blue-500 hover:text-gray-500">
            {{ $t('CONVERT') }} {{ src.currency_code }} {{ $t('TO') }} {{ country.currency_code }}
            </Link>
          </td>
          <td class="p-1 border text-sm max-[768px]:hidden">
            <Link :href="genCalculatorLink(country)" class="text-blue-500 hover:text-gray-500">
              {{ $t('FX_CALCULATOR') }} {{ country.currency_code }} 
            </Link>
          </td>
        </tr>

        <tr>
          <th colspan="5" class="border p-2 text-md font-bold">
            {{ $t('TAB_AFRICA') }}
          </th>
        </tr>

        <tr v-for="country in props.countries.filter((item: Country) => item.continent === 'Africa' && item.latest_currency['balance'] > 0)" :key="country.id"
          class="bg-white border-b">
          <th class="p-1 border text-md">
            <Link :href="genCurrencyLink(country)" class="text-blue-500 hover:text-gray-500">
            <img height="24" width="32" :src="genFlagUrl(country.country_code)" class="inline-block" :alt="country.country_name" />
            {{ `${country.call} ${country.currency_name} (${country.currency_code})` }}
            </Link>
          </th>
          <td class="p-1 border text-sm">
            {{ disSingleValue(props.balance) }} 
            <Link :href="genCurrencyLink(src)" class="text-blue-500 hover:text-gray-500">
              {{ props.src?.currency_code }}
            </Link> = 
            {{ disValue(src, country) }}
            <Link :href="genCurrencyLink(country)" class="text-blue-500 hover:text-gray-500">{{ country.currency_code }}</Link> 
          </td>
          <td class="p-1 border text-sm max-[768px]:hidden">
            {{ country.latest_currency['date'] }}
          </td>
          <td class="p-1 border text-sm">
            <Link :href="genConvertLink(src, country, balance)" class="text-blue-500 hover:text-gray-500">
            {{ $t('CONVERT') }} {{ src.currency_code }} {{ $t('TO') }} {{ country.currency_code }}
            </Link>
          </td>
          <td class="p-1 border text-sm max-[768px]:hidden">
            <Link :href="genCalculatorLink(country)" class="text-blue-500 hover:text-gray-500">
            {{ $t('FX_CALCULATOR') }} {{ country.currency_code }} 
            </Link>
          </td>
        </tr>

        <tr>
          <th colspan="5" class="border p-2 text-md font-bold">
            {{ $t('TAB_EUROPE') }}
          </th>
        </tr>

        <tr v-for="country in props.countries.filter((item: Country) => item.continent === 'Europe' && item.latest_currency['balance'] > 0)" :key="country.id"
          class="bg-white border-b">
          <th class="p-1 border text-md">
            <Link :href="genCurrencyLink(country)" class="text-blue-500 hover:text-gray-500">
            <img height="24" width="32" :src="genFlagUrl(country.country_code)" class="inline-block" :alt="country.country_name" />
            {{ `${country.call} ${country.currency_name} (${country.currency_code})` }}
            </Link>
          </th>
          <td class="p-1 border text-sm">
            {{ disSingleValue(props.balance) }} 
            <Link :href="genCurrencyLink(src)" class="text-blue-500 hover:text-gray-500">
              {{ props.src?.currency_code }}
            </Link> = 
            {{ disValue(src, country) }}
            <Link :href="genCurrencyLink(country)" class="text-blue-500 hover:text-gray-500">{{ country.currency_code }}</Link> 
          </td>
          <td class="p-1 border text-sm max-[768px]:hidden">
            {{ country.latest_currency['date'] }}
          </td>
          <td class="p-1 border text-sm">
            <Link :href="genConvertLink(src, country, balance)" class="text-blue-500 hover:text-gray-500">
            {{ $t('CONVERT') }} {{ src.currency_code }} {{ $t('TO') }} {{ country.currency_code }}
            </Link>
          </td>
          <td class="p-1 border text-sm max-[768px]:hidden">
            <Link :href="genCalculatorLink(country)" class="text-blue-500 hover:text-gray-500">
            {{ $t('FX_CALCULATOR') }} {{ country.currency_code }} 
            </Link>
          </td>
        </tr>

        <tr>
          <th colspan="5" class="border p-2 text-md font-bold">
            {{ $t('TAB_MIDDLE_EAST_ASIA') }}
          </th>
        </tr>

        <tr v-for="country in props.countries.filter((item: Country) => item.continent === 'MiddleEastAsia' && item.latest_currency['balance'] > 0)" :key="country.id"
          class="bg-white border-b">
          <th class="p-1 border text-md">
            <Link :href="genCurrencyLink(country)" class="text-blue-500 hover:text-gray-500">
            <img height="24" width="32" :src="genFlagUrl(country.country_code)" class="inline-block" :alt="country.country_name" />
            {{ `${country.call} ${country.currency_name} (${country.currency_code})` }}
            </Link>
          </th>
          <td class="p-1 border text-sm">
            {{ disSingleValue(props.balance) }} 
            <Link :href="genCurrencyLink(src)" class="text-blue-500 hover:text-gray-500">
              {{ props.src?.currency_code }}
            </Link> = 
            {{ disValue(src, country) }}
            <Link :href="genCurrencyLink(country)" class="text-blue-500 hover:text-gray-500">{{ country.currency_code }}</Link> 
          </td>
          <td class="p-1 border text-sm max-[768px]:hidden">
            {{ country.latest_currency['date'] }}
          </td>
          <td class="p-1 border text-sm">
            <Link :href="genConvertLink(src, country, balance)" class="text-blue-500 hover:text-gray-500">
            {{ $t('CONVERT') }} {{ src.currency_code }} {{ $t('TO') }} {{ country.currency_code }}
            </Link>
          </td>
          <td class="p-1 border text-sm max-[768px]:hidden">
            <Link :href="genCalculatorLink(country)" class="text-blue-500 hover:text-gray-500">
            {{ $t('FX_CALCULATOR') }} {{ country.currency_code }} 
            </Link>
          </td>
        </tr>

        <tr>
          <th colspan="5" class="border p-2 text-md font-bold">
            {{ $t('TAB_AMERICA') }}
          </th>
        </tr>

        <tr v-for="country in props.countries.filter((item: Country) => item.continent === 'America' && item.latest_currency['balance'] > 0)" :key="country.id"
          class="bg-white border-b">
          <th class="p-1 border text-md">
            <Link :href="genCurrencyLink(country)" class="text-blue-500 hover:text-gray-500">
            <img height="24" width="32" :src="genFlagUrl(country.country_code)" class="inline-block" :alt="country.country_name" />
            {{ `${country.call} ${country.currency_name} (${country.currency_code})` }}
            </Link>
          </th>
          <td class="p-1 border text-sm">
            {{ disSingleValue(props.balance) }} 
            <Link :href="genCurrencyLink(src)" class="text-blue-500 hover:text-gray-500">
              {{ props.src?.currency_code }}
            </Link> = 
            {{ disValue(src, country) }}
            <Link :href="genCurrencyLink(country)" class="text-blue-500 hover:text-gray-500">{{ country.currency_code }}</Link> 
          </td>
          <td class="p-1 border text-sm max-[768px]:hidden">
            {{ country.latest_currency['date'] }}
          </td>
          <td class="p-1 border text-sm">
            <Link :href="genConvertLink(src, country, balance)" class="text-blue-500 hover:text-gray-500">
            {{ $t('CONVERT') }} {{ src.currency_code }} {{ $t('TO') }} {{ country.currency_code }}
            </Link>
          </td>
          <td class="p-1 border text-sm max-[768px]:hidden">
            <Link :href="genCalculatorLink(country)" class="text-blue-500 hover:text-gray-500">
            {{ $t('FX_CALCULATOR') }} {{ country.currency_code }} 
            </Link>
          </td>
        </tr>

        <tr>
          <th colspan="5" class="border p-2 text-md font-bold">
            {{ $t('TAB_OCEANIA') }}
          </th>
        </tr>

        <tr v-for="country in props.countries.filter((item: Country) => item.continent === 'Oceania' && item.latest_currency['balance'] > 0)" :key="country.id"
          class="bg-white border-b">
          <th class="p-1 border text-md">
            <Link :href="genCurrencyLink(country)" class="text-blue-500 hover:text-gray-500">
            <img height="24" width="32" :src="genFlagUrl(country.country_code)" class="inline-block" :alt="country.country_name" />
            {{ `${country.call} ${country.currency_name} (${country.currency_code})` }}
            </Link>
          </th>
          <td class="p-1 border text-sm">
            {{ disSingleValue(props.balance) }} 
            <Link :href="genCurrencyLink(src)" class="text-blue-500 hover:text-gray-500">
              {{ props.src?.currency_code }}
            </Link> = 
            {{ disValue(src, country) }}
            <Link :href="genCurrencyLink(country)" class="text-blue-500 hover:text-gray-500">{{ country.currency_code }}</Link> 
          </td>
          <td class="p-1 border text-sm max-[768px]:hidden">
            {{ country.latest_currency['date'] }}
          </td>
          <td class="p-1 border text-sm">
            <Link :href="genConvertLink(src, country, balance)" class="text-blue-500 hover:text-gray-500">
            {{ $t('CONVERT') }} {{ src.currency_code }} {{ $t('TO') }} {{ country.currency_code }}
            </Link>
          </td>
          <td class="p-1 border text-sm max-[768px]:hidden">
            <Link :href="genCalculatorLink(country)" class="text-blue-500 hover:text-gray-500">
            {{ $t('FX_CALCULATOR') }} {{ country.currency_code }} 
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
import { disSingleValue, disValue, genCalculatorLink, genConvertLink, genCurrencyLink, genFlagUrl } from "@/utils";

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