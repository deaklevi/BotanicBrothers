<template>
  <section ref="videoSection" class="relative h-screen w-full overflow-hidden bg-black z-0">
    <video
      ref="videoPlayer"
      muted
      playsinline
      class="absolute inset-0 w-full h-full object-cover z-0 transition-opacity duration-1000"
      :class="isVisible ? 'opacity-100' : 'opacity-0'"
    >
      <source src="/botanic-video.mp4" type="video/mp4" />
      Your browser does not support the video tag.
    </video>

    <div class="absolute inset-0 bg-black/40 backdrop-blur-[1px] z-10"></div>

    <div class="relative z-20 flex flex-col h-full w-full items-center justify-center text-white text-center px-6">
      <div class="max-w-4xl space-y-6">
        <p class="text-sm md:text-base text-white/80 tracking-[0.3em] uppercase font-light">
          Az ápoltság értéket képvisel.
        </p>
        <h1 class="text-5xl md:text-8xl font-thin tracking-tighter uppercase leading-tight">
          A KERTED NEM CSAK KÜLSŐ TÉR.
        </h1>
        <p class="text-sm md:text-base text-white/80 tracking-[0.3em] uppercase font-light">
          Ez az első benyomás az otthonodról.
        </p>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue'

const videoSection = ref(null)
const videoPlayer = ref(null)
const isVisible = ref(false)

let observer = null

onMounted(() => {
  // Az Observer beállítása
  observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        // Ha láthatóvá válik a szekció
        isVisible.value = true
        videoPlayer.value?.play()
      } else {
        // Ha kimegy a látótérből, megállítjuk (erőforrás kímélés)
        videoPlayer.value?.pause()
        // Ha azt akarod, hogy legközelebb elölről induljon:
        // videoPlayer.value.currentTime = 0 
      }
    })
  }, {
    threshold: 0.2 // Akkor indul, ha a szekció 20%-a már látszik
  })

  if (videoSection.value) {
    observer.observe(videoSection.value)
  }
})

onUnmounted(() => {
  if (observer) observer.disconnect()
})
</script>

<style scoped>
h1 {
  text-shadow: 0 10px 30px rgba(0,0,0,0.5);
}
</style>