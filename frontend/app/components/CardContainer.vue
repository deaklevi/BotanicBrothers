<template>
  <section class="py-20 px-6">
    <div class="max-w-7xl mx-auto">
      
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 items-stretch">
        
        <Card 
          title="KEVESEBB PROBLÉMA HOSSZÚ TÁVON" 
          img="lawn-mower" 
          :paragraphs="[
            'A rendszeresen karbantartott kert nem válik kezelhetetlenné.',
            'Kevesebb gyom, kevesebb kár, kevesebb stressz.',
            'A megelőzés mindig könnyebb, mint az utólagos rendrakás.'
          ]"
        />

        <Card 
          title="AZ ELSŐ BENYOMÁS SOKAT SZÁMÍT" 
          img="flying-money" 
          :paragraphs="[
            'A gondozott kert az egész ingatlan megítélését javítja.',
            'Növeli az értékét, és minőséget sugároz.',
            'A rendezetlenség viszont azonnal lerontja az összképet.'
          ]"
        />

        <Card 
          title="NYUGODT KÖRNYEZET, AMI FELTÖLT" 
          img="mindfulness" 
          :paragraphs="[
            'Egy rendezett kert megnyugtat, lelassít, és jó érzést ad minden nap.',
            'Nem zavaró részleteket látsz, hanem harmóniát.',
            'Ez az a tér, ahol tényleg ki tudsz kapcsolni.'
          ]"
        />

      </div>
    </div>
  </section>
</template>