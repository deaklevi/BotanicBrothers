<template>
  <footer class="relative w-full py-12 px-6 overflow-hidden">
    <div class="absolute inset-0 z-0">
      <img 
        src="/text-bg.jpg" 
        alt="Footer background" 
        class="w-full h-full object-cover"
      />
      <div class="absolute inset-0 bg-black/70 backdrop-blur-[2px]"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-10 items-center">
        
        <div class="flex justify-center md:justify-start">
          <img src="/botaniclogo.png" alt="BotanicBrothers Logo" class="h-32 w-auto" />
        </div>

        <div class="flex flex-col items-center text-center space-y-3 text-gray-200">
          <h3 class="text-white font-bold tracking-widest uppercase mb-2">Kapcsolat</h3>
          
          <a href="mailto:contact.botanicbrothers@gmail.com" class="hover:text-green-400 transition-colors flex items-center gap-2">
            <span class="text-xs">✉</span> contact.botanicbrothers@gmail.com
          </a>
          
          <a href="tel:+36301311556" class="hover:text-green-400 transition-colors flex items-center gap-2">
            <span class="text-xs">📞</span> +36 30 131 1556
          </a>
          
          <p class="flex items-center gap-2">
            <span class="text-xs">📍</span> Budapest és környéke
          </p>
        </div>

        <div class="text-center md:text-right text-gray-400 text-sm tracking-wider">
          <p>Copyright © {{ currentYear }} - BotanicBrothers</p>
          <p class="mt-1 text-[10px] uppercase opacity-50">Minden jog fenntartva.</p>
        </div>

      </div>
    </div>
  </footer>
</template>

<script setup>
const currentYear = new Date().getFullYear()
</script>

<style scoped>
footer {
  /* Biztosítja, hogy a footer mindig a tartalom alján legyen, 
     ha kevés a szöveg az oldalon */
  margin-top: auto;
}
</style>