<template>
  <section ref="container" class="relative h-[400vh] bg-black">
    <div class="sticky top-0 h-screen w-full overflow-hidden">
      
      <video
        ref="videoPlayer"
        muted
        playsinline
        class="absolute inset-0 w-full h-full object-cover z-0"
      >
        <source src="/botanic-video.mp4" type="video/mp4" />
      </video>

      <div class="absolute inset-0 bg-black/50 backdrop-blur-[2px] z-10"></div>

      <div class="relative z-20 h-full w-full flex items-center justify-center overflow-hidden">
        <div 
          v-for="(slide, index) in slides" 
          :key="index"
          class="absolute w-full px-6 transition-all duration-1000 ease-in-out flex flex-col items-center text-center pointer-events-none slide-wrapper"
          :class="getSlideClass(index)"
        >
          <div class="max-w-4xl space-y-6">
            <p v-if="slide.overline" class="text-sm md:text-base tracking-[0.3em] uppercase font-bold ">
              {{ slide.overline }}
            </p>
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold tracking-tighter uppercase leading-tight drop-shadow-2xl" v-html="slide.title"></h1>
            <p v-if="slide.underline" class="text-sm md:text-base tracking-[0.3em] uppercase font-bold 0">
              {{ slide.underline }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue'

const container = ref(null)
const videoPlayer = ref(null)
const currentStep = ref(0)
let observer = null

const slides = [
  { overline: "Az ápoltság értéket képvisel.", title: "A KERTED NEM CSAK KÜLSŐ TÉR.", underline: "Ez az első benyomás az otthonodról." },
  { overline: "", title: "A káosz időt és energiát vesz el.<br>A rend nyugalmat teremt.", underline: "" },
  { overline: "", title: "Egy gondozott kert<br>visszaadja mindkettőt.", underline: "" }
]

const getSlideClass = (index) => {
  if (currentStep.value === index) return 'translate-x-0 opacity-100 visible'
  if (currentStep.value > index) return '-translate-x-full opacity-0 invisible'
  return 'translate-x-full opacity-0 invisible'
}

const handleScroll = () => {
  if (!container.value) return
  const rect = container.value.getBoundingClientRect()
  const windowHeight = window.innerHeight
  
  if (rect.top > 0) {
    currentStep.value = 0
    return
  }

  const totalScrollDistance = rect.height - windowHeight
  const currentScrollProgress = Math.max(0, Math.min(1, Math.abs(rect.top) / totalScrollDistance))
  
  if (currentScrollProgress < 0.33) currentStep.value = 0
  else if (currentScrollProgress < 0.66) currentStep.value = 1
  else currentStep.value = 2
}

onMounted(() => {
  window.addEventListener('scroll', handleScroll, { passive: true })
  handleScroll()

  // INTERSECTION OBSERVER JAVÍTÁSA
  observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (videoPlayer.value) {
        if (entry.isIntersecting) {
          // Ha az 50% látszik a viewportban, elindul
          videoPlayer.value.play().catch(err => {
            console.warn("Autoplay blokkolva, próbáljuk némítva kényszeríteni...", err)
            videoPlayer.value.muted = true
            videoPlayer.value.play()
          })
        } else {
          // Ha kigördül, megáll (erőforrás spórolás)
          videoPlayer.value.pause()
        }
      }
    })
  }, {
    // A videó magassága 100vh, így az 50% (0.5) tökéletesen működik
    threshold: 0.5 
  })

  // A videót figyeltetjük, nem a 400vh-s konténert!
  if (videoPlayer.value) {
    observer.observe(videoPlayer.value)
  }
})

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll)
  if (observer) observer.disconnect()
})
</script>

<style scoped>
.slide-wrapper {
  will-change: transform, opacity;
}

.slide-wrapper.invisible {
  visibility: hidden;
  transition: visibility 0s 0.8s, opacity 0.8s ease-in, transform 0.8s ease-in;
}

.slide-wrapper.visible {
  visibility: visible;
  transition: opacity 0.8s ease-out, transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
}

h1 {
  text-shadow: 0 4px 30px rgba(0, 0, 0, 0.8);
}
</style>