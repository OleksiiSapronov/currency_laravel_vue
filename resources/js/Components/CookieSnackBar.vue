<script setup>
import { onMounted, ref } from 'vue'

const cookieSnackbar = ref(null)
const visible = ref(true)

onMounted(() => {
	let stat = localStorage.getItem("visible_cookie_bar")
  if(stat == null || stat == undefined) {
    localStorage.setItem("visible_cookie_bar", true)
  }
})

const close = () => {
	if(cookieSnackbar.value) {
		cookieSnackbar.value.classList.add("invisible");
    visible.value = false
    localStorage.setItem("visible_cookie_bar", visible.value)
  }
}
</script>

<template>
	<div
		ref="cookieSnackbar"
		:class="'CookieConsent fixed bottom-0 left-0 w-full z-50 flex items-center justify-center flex-wrap bg-black text-white border-gray-700 text-sm px-0 py-0 opacity-80 shadow-sm ' + (visible.value ? '' : ' invisible')">
    >
		<div class="flex-1 flex-shrink-0 w-full sm:w-auto mx-5 my-3 sm:my-0">
			<span class="dark">
				This site uses cookies. By continuing to browse the site, you are agreeing to our use of cookies. To find out
				more, please click 
				<a href="/cookies-policy" class="underline">Cookies Policy</a>.
			</span>
		</div>
		<div class="flex-shrink-0 p-2">
			<button 
				@click="close"
				id="rcc-confirm-button" aria-label="Accept cookies"
				class="px-2 py-1 bg-black border border-white rounded-md text-white cursor-pointer">I understand</button>
		</div>
	</div>
</template>