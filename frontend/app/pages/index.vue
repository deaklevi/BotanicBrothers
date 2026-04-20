<script setup lang="ts">
import { V } from 'vue-router/dist/index-BzEKChPW.js';

</script>

<template>
    <Layout>

        <Services class="-z-[100]"/>

    <!-- <Video /> -->


    <div class=" pt-[10vh]">
        <div class="mt-[10vh] max-w-7xl mx-auto ">
            <CardContainer class="mb-24" />

            <OfferContainer />

        </div>
    </div>
    </Layout>
    
</template>

<style>
/* 1. Betöltjük a Montserrat összes súlyát (100-tól 900-ig) */
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

/* 2. Ráerőltetjük a betűtípust MINDEN elemre */
*, *::before, *::after {
  font-family: 'Montserrat', sans-serif !important;
}

body {
    color: #FAF1E1;
}

/* 3. Itt NEM állítunk be font-size-t és font-weight-et, 
      hogy a Tailwind osztályaid (pl. text-7xl, font-thin) 
      továbbra is tökéletesen működjenek. */
</style>