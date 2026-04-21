<script setup>
const props = defineProps({
  title: String,
  img: String,
  paragraphs: Array
})
</script>

<template>
  <div class="bg-[#FAF1E1] rounded-3xl p-8 text-center shadow-sm hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 flex flex-col h-full border border-black/5">
    
    <div class="mb-6 flex justify-center">
      <div class="p-4 rounded-2xl backdrop-blur-sm">
        <img :src="`/icons/${img}.png`" :alt="img" class="h-16 w-16 object-contain grayscale-[0.2]">
      </div>
    </div>

    <h2 class=" mb-6 text-[#1A4A2B] text-xl leading-tight uppercase tracking-tight font-bold italic">
      {{ title }}
    </h2>
    
    <div class="w-12 h-1 bg-[#1A4A2B]/10 mx-auto mb-6"></div>

    <div class="space-y-4 text-gray-700 font-medium leading-relaxed flex-grow">
      <p v-for="(p, i) in paragraphs" :key="i" class="text-sm md:text-base opacity-90">
        {{ p }}
      </p>
    </div>

  </div>
</template>