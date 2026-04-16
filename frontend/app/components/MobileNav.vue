<template>
  <div class="md:hidden sticky top-0 z-[60] w-full">
    <div class="bg-black/80 backdrop-blur-lg border-b border-white/10 px-6 py-4 flex justify-between items-center">
        <h2 class="text-1xl md:text-4xl font-bold uppercase bg-gradient-to-b from-[#f3e5ab] via-[#e6c98a] to-[#d4af37] bg-clip-text text-transparent">
            BotanicBrothers
        </h2>
      
      <button @click="isOpen = !isOpen" class="text-white p-2">
        <span class="sr-only">Menü</span>
        <svg v-if="!isOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
        </svg>
        <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>

    <transition
      enter-active-class="transition duration-300 ease-out"
      enter-from-class="opacity-0 -translate-y-4"
      enter-to-class="opacity-100 translate-y-0"
      leave-active-class="transition duration-200 ease-in"
      leave-to-class="opacity-0 -translate-y-4"
    >
      <div v-if="isOpen" class="absolute top-full left-0 w-full bg-black/95 backdrop-blur-xl border-b border-white/10 py-6 px-8 flex flex-col gap-6">
        <NuxtLink @click="isOpen = false" to="/" class="text-white text-lg uppercase tracking-widest border-b border-white/5 pb-2">Szolgáltatásaink</NuxtLink>
        <NuxtLink @click="isOpen = false" to="#" class="text-white text-lg uppercase tracking-widest border-b border-white/5 pb-2">Rólunk</NuxtLink>
        <NuxtLink @click="isOpen = false" to="#" class="text-white text-lg uppercase tracking-widest border-b border-white/5 pb-2">Ajánlatkérés</NuxtLink>
      </div>
    </transition>
  </div>
</template>

<script setup>
const isOpen = ref(false)
</script>