<template>
    <div class="flex flex-col space-y-10 md:space-y-0 md:flex-row md:space-x-10 justify-center items-center">
        <Card 
            title="KEVESEBB PROBLÉMA HOSSZÚ TÁVON" 
            img="lawn-mower" 
            :paragraphs="['A rendszeresen karbantartott kert nem válik kezelhetetlenné.',' Kevesebb gyom, kevesebb kár, kevesebb stressz.',' A megelőzés mindig könnyebb, mint az utólagos rendrakás.']"
        />
        <Card 
            title="AZ ELSŐ BENYOMÁS SOKAT SZÁMÍT" 
            img="flying-money" 
            :paragraphs="['A gondozott kert az egész ingatlan megítélését javítja.',' Növeli az értékét, és minőséget sugároz.',' A rendezetlenség viszont azonnal lerontja az összképet.']"
        />
        <Card 
            title="NYUGODT KÖRNYEZET, AMI FELTÖLT" 
            img="mindfulness" 
            :paragraphs="['Egy rendezett kert megnyugtat, lelassít, és jó érzést ad minden nap.','Nem zavaró részleteket látsz, hanem harmóniát.','Ez az a tér, ahol tényleg ki tudsz kapcsolni.']"
        />
    </div>
</template>
