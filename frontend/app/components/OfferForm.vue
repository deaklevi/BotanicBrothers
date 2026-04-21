<template>
  <div class="relative overflow-hidden rounded-lg border border-white p-6 md:p-8 bg-[url('/text-bg.jpg')] bg-cover bg-center bg-no-repeat shadow-lg">
    
    <div class="absolute inset-0 bg-black/60 z-0"></div>
    
    <form @submit.prevent="submitForm" class="relative z-10">
      
      <div class="flex flex-col sm:flex-row gap-4 mb-4">
        <input 
          type="text" 
          v-model="form.lastName" 
          placeholder="Vezetéknév" 
          required 
          class="w-full bg-transparent border border-white rounded px-4 py-3 text-white placeholder-gray-300 focus:outline-none focus:ring-1 focus:ring-white transition-shadow" 
        />
        <input 
          type="text" 
          v-model="form.firstName" 
          placeholder="Keresztnév" 
          required 
          class="w-full bg-transparent border border-white rounded px-4 py-3 text-white placeholder-gray-300 focus:outline-none focus:ring-1 focus:ring-white transition-shadow" 
        />
      </div>

      <input 
        type="email" 
        v-model="form.email" 
        placeholder="E-mail cím" 
        required 
        class="w-full bg-transparent border border-white rounded px-4 py-3 text-white placeholder-gray-300 focus:outline-none focus:ring-1 focus:ring-white mb-4 transition-shadow" 
      />

      <input 
        type="tel" 
        v-model="form.phone" 
        placeholder="Telefonszám" 
        class="w-full bg-transparent border border-white rounded px-4 py-3 text-white placeholder-gray-300 focus:outline-none focus:ring-1 focus:ring-white mb-4 transition-shadow" 
      />

      <textarea 
        v-model="form.message" 
        placeholder="Miben segíthetünk?" 
        rows="4" 
        required 
        class="w-full bg-transparent border border-white rounded px-4 py-3 text-white placeholder-gray-300 focus:outline-none focus:ring-1 focus:ring-white mb-4 transition-shadow resize-y"
      ></textarea>

      <div class="flex justify-between items-center border border-white rounded px-4 py-2 mb-6">
        <span class="text-gray-300 text-sm truncate pr-4">{{ fileName || 'Fájl feltöltése' }}</span>
        <label for="file-upload" class="bg-white text-black px-4 py-1.5 rounded text-sm font-bold cursor-pointer whitespace-nowrap hover:bg-gray-200 transition-colors">
          Kiválasztás
        </label>
        <input type="file" id="file-upload" @change="handleFileUpload" class="hidden" />
      </div>

      <button 
        type="submit" 
        class="w-full bg-[#a4c9a8] hover:bg-[#8fb593] text-[#1a1a1a] font-bold py-3 px-4 rounded flex justify-center items-center gap-2 transition-colors"
      >
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
          <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
        </svg>
        Üzenet küldése
      </button>

    </form>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const form = ref({
  lastName: '',
  firstName: '',
  email: '',
  phone: '',
  message: '',
  file: null
});

const fileName = ref('');

const handleFileUpload = (event) => {
  const file = event.target.files[0];
  if (file) {
    form.value.file = file;
    fileName.value = file.name;
  }
};

const submitForm = async () => {
  try {
    const response = await $fetch('https://botanicbrothers-backend.saavatar.xyz/api/contact', {
      method: 'POST',
      body: {
        lastName: form.value.lastName,
        firstName: form.value.firstName,
        email: form.value.email,
        phone: form.value.phone,
        message: form.value.message,
      }
    });
    
    alert('Köszönjük! Az üzenetet sikeresen elküldtük.');
    
  } catch (error) {
    console.error('Hiba történt a küldés során:', error);
    alert('Sajnos hiba történt az elküldés során. Próbálja újra később!');
  }
};
</script>