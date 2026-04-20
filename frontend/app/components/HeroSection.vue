<template>
  <section class="relative h-screen w-full overflow-hidden bg-black">
    <div v-for="(img, index) in images" :key="index">
      <transition
        enter-active-class="duration-1000 ease-out"
        enter-from-class="opacity-0 scale-110"
        leave-active-class="duration-1000 ease-in"
        leave-to-class="opacity-0"
      >
        <div
          v-show="currentImage === index"
          class="absolute inset-0 bg-cover bg-center"
          :style="{ backgroundImage: `url(${img})` }"
        >
          <div class="absolute inset-0 bg-black/50 backdrop-blur-[2px]"></div>
        </div>
      </transition>
    </div>

    <div class="relative z-10 flex flex-col h-full w-full">
      
      <div class="absolute top-0 left-0 w-full pt-12 flex justify-center z-20">
          <img 
            src="/botaniclogo.png" 
            alt="Botanic Logo" 
            class="h-56 md:h-72 w-auto object-contain opacity-90 hover:opacity-100 transition-opacity"
          />
        </div>

      <div class="flex-grow flex flex-col items-center justify-center text-center px-4 ]">
        <h1 class="text-6xl md:text-7xl font-extrabold tracking-tighter  mb-6 max-w-7xl">
          Készen állsz kerted megújítani?
        </h1>
        <p class="text-md md:text-base tracking-[0.4em] font-semibold uppercase font-light  max-w-7xl">
          Válaszolj meg néhány kérdést, <br> és azonnal mutatjuk a következő lépést
        </p>
      </div>

      <Nav class="hidden md:flex z-[9999]" />
    </div>
  </section>
</template>

<script setup>
// Ha a képeid a public mappában vannak, így éred el őket:
const images = [
  '/hero-image1.jpg',
  '/hero-image2.jpg',
  '/hero-image1.jpg' // Itt érdemes lehet egy harmadik, különböző képet betenni
]

const currentImage = ref(0)

onMounted(() => {
  setInterval(() => {
    currentImage.value = (currentImage.value + 1) % images.length
  }, 5000)
})
</script>
