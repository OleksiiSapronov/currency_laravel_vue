<script setup lang="ts">
import { ref } from "vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { Link } from "@inertiajs/vue3";
import ScrollUp from "@/Components/ScrollUp.vue";
import CookieSnackBar from "@/Components/CookieSnackBar.vue";
import { useI18n } from 'vue-i18n'

const { locale } = useI18n()
const showingNavigationDropdown = ref(false);
const cLanguage = ref(localStorage.getItem('lang') || "en");
const languages = ref([
        {lang: "en", label: "English"},
        {lang: "id", label: "Bahasa Indonesia"},
        {lang: "nl", label: "Nederlands"},
        {lang: "cs", label: "Čeština"},
        {lang: "it", label: "Italiano"},
        {lang: "pl", label: "Polski"},
        {lang: "pt", label: "Português"},
        {lang: "sv", label: "Svenska"},
        {lang: "fr", label: "Français"},
        {lang: "de", label: "Deutsch"},
        {lang: "ro", label: "Limba Română"},
        {lang: "hi", label: "हिन्दी"},
        {lang: "tr", label: "Türkçe"},
        {lang: "bn", label: " বাংলা"}
      ]);
  function cLanguageChange() {
    localStorage.setItem('lang', cLanguage.value);
    locale.value = localStorage.getItem('lang') || "en";
  }
</script>

<template>
  <div>
    <div class="min-h-screen bg-gray-100">
      <nav class="bg-nav shadow-lg">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="flex justify-between h-20">
            <div class="flex">
              <!-- Logo -->
              <div class="shrink-0 flex items-center">
                <Link :href="route('home')">
                <span class="logo-font">AZconvert.com</span>
                </Link>
              </div>
            </div>
            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex uppercase">
              <select
                class="h-[2rem] self-center rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-white sm:text-sm sm:leading-6"
                placeholder="Select A Language"
                v-model="cLanguage"
                v-on:change="cLanguageChange"
              >
                <option v-for="language in languages" :key="language.lang" :value="language.lang">
                  {{ language.label }}
                </option>
              </select>
              <NavLink :href="route('home')" :active="route().current('home')">
                Home
              </NavLink>
              <NavLink :href="route('contact')" :active="route().current('contact')">
                Contact
              </NavLink>
              <NavLink :href="route('cookies-policy')" :active="route().current('cookies-policy')">
                Cookies policy
              </NavLink>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
              <select
                class="h-[2rem] self-center rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-white sm:text-sm sm:leading-6 mr-3"
                placeholder="Select A Language"
                v-model="cLanguage"
                v-on:change="cLanguageChange"
              >
                <option v-for="language in languages" :key="language.lang" :value="language.lang">
                  {{ language.label }}
                </option>
              </select>
              <button @click="showingNavigationDropdown = !showingNavigationDropdown"
                name="open-menu" type="button"
                aria-label="open-menu"
                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                  <path :class="{
                    hidden: showingNavigationDropdown,
                    'inline-flex': !showingNavigationDropdown,
                  }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                  <path :class="{
                    hidden: !showingNavigationDropdown,
                    'inline-flex': showingNavigationDropdown,
                  }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
          </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{
          block: showingNavigationDropdown,
          hidden: !showingNavigationDropdown,
        }" class="sm:hidden">
          <div class="pt-2 pb-3 space-y-1">
            <ResponsiveNavLink :href="route('home')" :active="route().current('home')">
              Home
            </ResponsiveNavLink>
            <ResponsiveNavLink :href="route('contact')" :active="route().current('contact')">
              Contact
            </ResponsiveNavLink>
            <ResponsiveNavLink :href="route('cookies-policy')" :active="route().current('cookies-policy')">
              Cookies Policy
            </ResponsiveNavLink>
          </div>
        </div>
      </nav>

      <!-- Page Heading -->
      <header class="bg-white shadow" v-if="$slots.header">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
          <slot name="header" />
        </div>
      </header>

      <!-- Page Content -->
      <main>
        <slot />
      </main>

      <ScrollUp />

      <CookieSnackBar />
    </div>
  </div>
</template>
