// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  compatibilityDate: '2025-07-15',
  devtools: { enabled: false },
  modules: [
    '@nuxtjs/tailwindcss',
  ],
  app: {
    head: {
      title: 'BotanicBrothers | Kertrendezés',
      charset: 'utf-8',
      viewport: 'width=device-width, initial-scale=1',
      link: [
        { rel: 'icon', type: 'image/x-icon', href: '/botanicbrothers.ico' }
      ],
      meta: [
        { name: 'description', content: 'Varázsolja álmai kertjét valósággá! Professzionális kertrendezés, tervezéstől a kivitelezésig. Minőségi munka, precíz megvalósítás és elégedett ügyfelek. Kérjen ajánlatot még ma!' },
        { name: 'keywords', content: 'kertrendezés, kertépítés, kerttervezés, öntözőrendszer, gyepszőnyeg, kertgondozás, Budapest' },
        { name: 'author', content: 'BotanicBrothers Team' },
        // Open Graph
        { property: 'og:type', content: 'website' },
        { property: 'og:title', content: 'BotanicBrothers | Kertrendezés' },
        { property: 'og:description', content: 'Varázsolja álmai kertjét valósággá!' },
        { property: 'og:image', content: 'https://botanicbrothers.com/botanicbrothers.ico' },
      ],
    }
  }
})
