<template>
  <div class="text-2xl py-6 text-gray-500 font-bold">Conversion table for major world currencies</div>
  <div class="tabs-header">
    <ul class="flex border-b flex-wrap">
      <li 
        v-for="tab in tabLabels" 
        :key="tab.id" 
        :class="openTab === tab.id ? activeClasses : inactiveClasses"
        class="-mb-px mr-1 font-semibold overflow-hidden"
        @click="openTab = tab.id"
      >
        <span :class="openTab !== tab.id && 'hover:bg-gray-100'" class="bg-white py-2 px-4 inline-flex">
          {{ tab.name }}
        </span>
      </li>
    </ul>
    <div class="p-2">
      <b>
        {{ 
          $t('TAB_TITLE', {
            src: `${src.call} ${src.currency_name}`,
            code: src.currency_code,
            date: src.latest_currency['date'],
          }) 
        }}
      </b>
      <br />
      <p v-html="$t('TAB_SUBTITLE', { name: `${src.call} ${src.currency_name}` })" />
    </div>
  </div>
  <div class="tabs-content rounded-md">
    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 rounded">
      <div class="tab-content">
        <div v-for="tab in tabLabels" v-bind:class="{ hidden: openTab !== tab.id, block: openTab === tab.id }">
          <div class="relative overflow-x-auto">
            <CurrencyTable :countries="props.countries" :src="props.src" :group="tab.label" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import { Country } from '@/types';
import CurrencyTable from './CurrencyTable.vue';
import { useI18n } from 'vue-i18n';

const { t } = useI18n();

const props = withDefaults(
  defineProps<{
    countries: [Country];
    src: Country;
  }>(), {}
);

const tabLabels = [
  { name: t("TAB_MAIN_CURRENCIES"), id: 1, label: 'Worldwide' },
  { name: t("TAB_AMERICA"), id: 2, label: 'America' },
  { name: t("TAB_EUROPE"), id: 3, label: 'Europe'},
  { name: t("TAB_MIDDLE_EAST_ASIA"), id: 4, label: 'MiddleEastAsia' },
  { name: t("TAB_ASIA"), id: 5, label: 'Asia' },
  { name: t('TAB_OCEANIA'), id: 6, label: 'Oceania' },
  { name: t('TAB_ASIA'), id: 7, label: 'Africa' },
];

const openTab = ref(1);
const activeClasses = 'border-l border-t border-r rounded-t text-blue-700 bg-gray-100';
const inactiveClasses = 'text-gray-500 hover:text-blue-700 truncate';
</script>
