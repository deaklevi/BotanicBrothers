<template>
  <section ref="container" class="relative h-[400vh] bg-black">
    <div class="sticky top-0 h-screen w-full overflow-hidden">
      
      <video
        ref="videoPlayer"
        muted
        playsinline
        autoplay
        class="absolute inset-0 w-full h-full object-cover z-0"
      >
        <source src="/botanic-video.mp4" type="video/mp4" />
      </video>

      <div class="absolute inset-0 bg-black/50 backdrop-blur-[1px] z-10"></div>

      <div class="relative z-20 h-full w-full flex items-center justify-center overflow-hidden">
        
        <div v-for="(slide, index) in slides" :key="index"
             class="absolute w-full px-6 transition-all duration-1000 ease-in-out flex flex-col items-center text-center pointer-events-none"
             :class="getSlideClass(index)">
          
          <div class="max-w-4xl space-y-6">
            <p class="text-sm md:text-base tracking-[0.3em] uppercase font-bold">
              {{ slide.overline }}
            </p>
            <h1 class="text-5xl md:text-6xl font-extrabold tracking-tighter uppercase leading-tight drop-shadow-2xl" v-html="slide.title">
            </h1>
            <p class="text-sm md:text-base tracking-[0.3em] uppercase font-bold">
              {{ slide.underline }}
            </p>
          </div>
        </div>

      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, onMounted, onUnmounted, nextTick } from 'vue'

const container = ref(null)
const currentStep = ref(0) // Az első szöveggel kezdünk

const slides = [
  {
    overline: "Az ápoltság értéket képvisel.",
    title: "A KERTED NEM CSAK KÜLSŐ TÉR.",
    underline: "Ez az első benyomás az otthonodról."
  },
  {
    overline: "",
    title: "A káosz időt és energiát vesz el.<br>A rend nyugalmat teremt.",
    underline: ""
  },
  {
    overline: "",
    title: "Egy gondozott kert<br>visszaadja mindkettőt.",
    underline: ""
  }
]

const getSlideClass = (index) => {
  // Ha ez az aktuális slide
  if (currentStep.value === index) {
    return 'translate-x-0 opacity-100 visible'
  } 
  // Ha már elhagytuk (balra van)
  if (currentStep.value > index) {
    return '-translate-x-full opacity-0'
  }
  // Ha még előtte vagyunk (jobbra vár)
  return 'translate-x-full opacity-0'
}

const handleScroll = () => {
  if (!container.value) return
  
  const rect = container.value.getBoundingClientRect()
  const windowHeight = window.innerHeight
  
  // Ha a szekció teteje még nem érte el a képernyő tetejét
  if (rect.top > 0) {
    currentStep.value = 0
    return
  }

  // Progress kiszámítása (0-tól 1-ig)
  const totalScrollDistance = rect.height - windowHeight
  const currentScrollProgress = Math.abs(rect.top) / totalScrollDistance
  
  // Szigorúbb határok a váltáshoz
  if (currentScrollProgress < 0.3) {
    currentStep.value = 0
  } else if (currentScrollProgress < 0.6) {
    currentStep.value = 1
  } else if (currentScrollProgress < 0.95) {
    currentStep.value = 2
  }
}

onMounted(async () => {
  // Várunk egy kicsit, hogy a DOM felépüljön
  await nextTick()
  
  // Azonnal lefuttatjuk, hogy tudja hol állunk (pl. oldalfrissítésnél)
  handleScroll()
  
  window.addEventListener('scroll', handleScroll, { passive: true })
})

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll)
})
</script>

<style scoped>
/* Megakadályozza, hogy a láthatatlan szövegek bekavarjanak */
.opacity-0 {
  visibility: hidden;
  transition: visibility 0s 1s, opacity 1s linear, transform 1s ease-in-out;
}
.opacity-100 {
  visibility: visible;
  transition: opacity 1s linear, transform 1s ease-in-out;
}

h1 {
  text-shadow: 0 10px 40px rgba(0,0,0,0.6);
}
</style>