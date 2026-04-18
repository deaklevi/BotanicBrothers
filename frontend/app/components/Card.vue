<script setup>
const props = defineProps({
    title: String,
    img: String,
    paragraphs:Array
})
</script>

<template>

<div class="bg-[#FAF1E1] rounded-xl p-6 text-center shadow-md max-w-xs">
    <img :src="`/icons/${img}.png`" :alt="`${img}`" class="h-24 mx-auto mb-2">
    <h2 class="text-center font-bold mb-6 text-[#1A4A2B] text-lg">{{ title }}</h2>
    
    <div class="space-y-5 text-md text-green-900 mx-5 text-[#1A4A2B] font-semibold">
        <p v-for="(p,i) in paragraphs" :key="i">
            {{ p }}
        </p>
    </div>

</div>

</template>