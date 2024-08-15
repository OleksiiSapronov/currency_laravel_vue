<template>
  <div class="text-2xl py-6 text-gray-500 font-extrabold">Conversion table for major world currencies</div>
  <div class="tabs-header">
    <ul class="flex border-b flex-wrap">
      <li v-for="tab in tabLabels" :key="tab.id" :class="openTab === tab.id ? activeClasses : inactiveClasses"
        class="-mb-px mr-1 font-semibold overflow-hidden"
        @click="openTab = tab.id">
        <span :class="openTab !== tab.id && 'hover:bg-gray-100'" class="bg-white py-2 px-4 inline-flex">
          {{ tab.name }}
        </span>
      </li>
    </ul>
    <div class="p-2">
      <b>Currency exchange rates table of the Romanian Leu (RON), updated at 2024-06-18 01:54:00</b>
      <br />
      On this page you will find list of the mutual conversions of the <b>Romanian Leu (Romanian Leu) currency and other
        major world currencies.</b>
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
import { computed, ref } from 'vue'
import { Country } from '@/types';
import CurrencyTable from './CurrencyTable.vue';

const props = withDefaults(
  defineProps<{
    countries: [Country];
    src: Country;
  }>(),
  {
  }
);

const tabLabels = [
  { name: "Main currencies", id: 1, label: 'Worldwide' },
  { name: "North, Central and South America", id: 2, label: 'America' },
  { name: "Europe", id: 3, label: 'Europe'},
  { name: "Middle East", id: 4, label: 'MiddleEastAsia' },
  { name: "Asia", id: 5, label: 'Asia' },
  { name: "Oceania & Pacific", id: 6, label: 'Oceania' },
  { name: "Africa", id: 7, label: 'Africa' },
];

const openTab = ref(1);
const activeClasses = 'border-l border-t border-r rounded-t text-blue-700';
const inactiveClasses = 'text-gray-500 hover:text-blue-700 truncate max-w-20';
</script>
