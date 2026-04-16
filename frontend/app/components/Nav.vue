<template>
  <nav
    :class="[
      'left-0 w-full z-50 transition-all duration-500 ease-in-out px-8 py-5 flex justify-center items-center',
      isSticky 
        ? 'fixed top-0 bg-black/60 backdrop-blur-lg border-b border-white/10' 
        : 'absolute bottom-0 bg-transparent'
    ]"
  >
    <div class="flex gap-10">
      <NuxtLink to="/" class="text-white text-sm uppercase tracking-widest hover:text-gray-400 transition">Szolgáltatásaink</NuxtLink>
      <NuxtLink to="#" class="text-white text-sm uppercase tracking-widest hover:text-gray-400 transition">Rólunk</NuxtLink>
      <NuxtLink to="#" class="text-white text-sm uppercase tracking-widest hover:text-gray-400 transition">Ajánlatkérés</NuxtLink>
    </div>
  </nav>
</template>

<script setup>
const isSticky = ref(false)

const handleScroll = () => {
  // Megnézzük, mennyit görgettünk. Ha elértük a képernyő magasságát (mínusz a nav magassága), rögzítjük.
  const threshold = window.innerHeight - 66 
  isSticky.value = window.scrollY >= threshold
}

onMounted(() => {
  window.addEventListener('scroll', handleScroll)
})

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll)
})
</script>