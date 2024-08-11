<template>
  <div class="flex flex-wrap">
    <div class="w-full">
      <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
        <li v-for="tab in tabLabels" :key="tab.id" class="mr-1 last:mr-0 border-2 flex-auto text-center">
          <a
            class="text-xs font-bold uppercase px-5 py-3 rounded block leading-normal"
            @click="toggleTabs(tab.id)"
            :class="{
              'text-blueGray-600 bg-white': openTab !== tab.id,
              'text-white bg-blueGray-600': openTab === tab.id,
            }"
          >
            {{ tab.name }}
          </a>
        </li>
      </ul>
      <div
        class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 rounded"
      >
        <div class="px-4 py-5 flex-auto">
          <div class="tab-content tab-space">
            <div v-bind:class="{ hidden: openTab !== 1, block: openTab === 1 }">
              <p>
                Collaboratively administrate empowered markets via plug-and-play networks.
                Dynamically procrastinate B2C users after installed base benefits.
                <br />
                <br />
                Dramatically visualize customer directed convergence without revolutionary
                ROI.
              </p>
            </div>
            <div v-bind:class="{ hidden: openTab !== 2, block: openTab === 2 }">
              <p>
                Completely synergize resource taxing relationships via premier niche
                markets. Professionally cultivate one-to-one customer service with robust
                ideas.
                <br />
                <br />
                Dynamically innovate resource-leveling customer service for state of the
                art customer service.
              </p>
            </div>
            <div v-bind:class="{ hidden: openTab !== 3, block: openTab === 3 }">
              <p>
                Efficiently unleash cross-media information without cross-media value.
                Quickly maximize timely deliverables for real-time schemas.
                <br />
                <br />
                Dramatically maintain clicks-and-mortar solutions without functional
                solutions.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const tabLabels = [
  { name: "Main currencies", id: 1 },
  { name: "North, Central and South America", id: 2 },
  { name: "Europe", id: 3 },
  { name: "Middle East", id: 4 },
  { name: "Asia", id: 5 },
  { name: "Oceania & Pacific", id: 6 },
  { name: "Africa", id: 7 },
];

const openTab = ref(1);
const toggleTabs = function(tabNumber) {
  openTab.value = tabNumber;
}
</script>
