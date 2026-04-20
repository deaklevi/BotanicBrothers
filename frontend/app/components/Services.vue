<template>
  <section class="pt-16 pb-32 md:py-24 px-6 overflow-x-hidden relative">
    <div class="max-w-7xl mx-auto">
      
      <div class="text-center mb-16 md:mb-24">
        <h2 class="text-3xl md:text-6xl font-black uppercase tracking-tighter bg-cover bg-center bg-clip-text text-transparent"
            style="background-image: url('/text-bg.jpg');">
          Így fogjuk megújjítani a kerted
        </h2>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 md:gap-16 items-center">
        
        <div class="order-2 lg:order-1 space-y-6 mt-20 md:mt-0">
          <transition name="fade" mode="out-in">
            <div :key="currentIndex">
              <h3 class=" text-3xl md:text-4xl font-bold mb-4 tracking-widest">
                {{ services[currentIndex].title }}
              </h3>
              <p class=" text-base md:text-lg leading-relaxed max-w-md">
                {{ services[currentIndex].description }}
              </p>
            </div>
          </transition>
          
          <div class="hidden md:flex gap-3 pt-8">
            <button 
              v-for="(_, index) in services" 
              :key="index"
              @click="goToSlide(index)"
              :class="['h-2 transition-all duration-300 rounded-full', currentIndex === index ? 'w-12 bg-[#FAF1E1]' : 'w-2 bg-gray-700']"
            ></button>
          </div>
        </div>

        <div class="order-1 lg:order-2 relative h-[350px] md:h-[450px]"
             @touchstart="handleTouchStart"
             @touchend="handleTouchEnd">
          
          <div class="relative w-full h-full flex items-center">
            <transition-group name="slide">
              <div 
                :key="'main-' + currentIndex"
                class="absolute left-0 w-[85%] lg:w-4/5 h-full rounded-2xl overflow-hidden shadow-2xl z-20 transition-all duration-700"
              >
                <img :src="services[currentIndex].image" class="w-full h-full object-cover" />
              </div>

              <div 
                v-if="nextIndex !== null"
                :key="'next-' + nextIndex"
                @click="nextSlide"
                class="absolute right-0 w-1/4 h-4/5 rounded-xl overflow-hidden opacity-30 z-10 scale-90 cursor-pointer hover:opacity-50 transition-all duration-300"
              >
                <img :src="services[nextIndex].image" class="w-full h-full object-cover" />
              </div>
            </transition-group>
          </div>

          <div class="flex md:hidden absolute -bottom-20 left-0 w-[85%] justify-center gap-10 z-[100]">
            <button 
              @click="prevSlide" 
              class="w-14 h-14 flex items-center justify-center bg-[#FAF1E1] text-black rounded-full shadow-2xl active:scale-95 transition-transform"
            >
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
              </svg>
            </button>

            <button 
              @click="nextSlide" 
              class="w-14 h-14 flex items-center justify-center bg-[#FAF1E1] text-black rounded-full shadow-2xl active:scale-95 transition-transform"
            >
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
              </svg>
            </button>
          </div>
        </div>

      </div>
    </div>
  </section>
</template>

<script setup>
const currentIndex = ref(0)
const touchStartX = ref(0)
const touchEndX = ref(0)

const services = [
  { title: "Karbantartás", description: "Rendszeres kertkarbantartással biztosítjuk, hogy kertje mindig rendezett, egészséges és esztétikus maradjon. Szezonális igényekhez igazodva végezzük a szükséges ápolási feladatokat.", image: "/service1.png" },
  { title: "Ültetés", description: "Az adott terület adottságaihoz és esztétikai elvárásaihoz illeszkedő növénytelepítést végzünk, hogy kertje hosszú távon harmonikus, fenntartható és jól fejlődő összképet mutasson, minden évszakban kiegyensúlyozott megjelenéssel.", image: "/service2.png" },
  { title: "Permetezés", description: "Célzott permetezési munkáinkkal elősegítjük a növényállomány egészségének megőrzését, valamint csökkentjük a kártevők és betegségek kockázatát.", image: "/service3.png" },
  { title: "Kerttisztítás", description: "Kerttisztítás során eltávolítjuk a felgyülemlett leveleket, gyomnövényeket, és egyéb kerti hulladékot, hogy a terület átláthatóbb, rendezettebb és könnyebben fenntartható legyen.", image: "/service4.png" },
  { title: "Sövényformázás", description: "Sövényformázással rendezett, ápolt és arányos megjelenést adunk kertjének, miközben a növények egészségesebb, egyenletesebb növekedését is támogatjuk.", image: "/service5.png" },
  { title: "Zöldhulladék-elszállítás", description: "A keletkezett zöldhulladékot elszállítjuk, így a munka végeztével Ön azonnal élvezheti tiszta, rendezett kertjét.", image: "/service6.png" },
  { title: "Kis traktoros fűnyírás", description: "Kistraktoros fűnyírással gyorsan és hatékonyan tesszük rendbe a nagyobb zöldfelületeket, hogy kertje vagy területe rövid idő alatt ápolt, rendezett megjelenést kapjon.", image: "/service7.png" }
]

const nextIndex = computed(() => (currentIndex.value + 1) % services.length)

const nextSlide = () => {
  currentIndex.value = nextIndex.value
}

const prevSlide = () => {
  currentIndex.value = (currentIndex.value - 1 + services.length) % services.length
}

const goToSlide = (index) => {
  currentIndex.value = index
}

// SWIPE LOGIKA
const handleTouchStart = (e) => {
  touchStartX.value = e.touches[0].clientX
}

const handleTouchEnd = (e) => {
  touchEndX.value = e.changedTouches[0].clientX
  handleSwipe()
}

const handleSwipe = () => {
  const swipeThreshold = 50 // minimum ennyit kell húzni pixelben
  if (touchStartX.value - touchEndX.value > swipeThreshold) {
    nextSlide() // Balra húzás -> Következő
  } else if (touchEndX.value - touchStartX.value > swipeThreshold) {
    prevSlide() // Jobbra húzás -> Előző
  }
}
</script>

<style scoped>
/* Szöveg animáció */
.fade-enter-active, .fade-leave-active { transition: opacity 0.4s ease; }
.fade-enter-from, .fade-leave-to { opacity: 0; }

/* Slider animáció */
.slide-enter-active, .slide-leave-active { transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1); }
.slide-enter-from { opacity: 0; transform: translateX(50px) scale(0.9); }
.slide-leave-to { opacity: 0; transform: translateX(-100px) scale(0.95); }
</style>