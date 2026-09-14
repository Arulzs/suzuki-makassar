<script setup>
import { ref } from 'vue';

defineProps({
  currentPage: {
    type: String,
    default: 'home'
  }
});

const isMobileMenuOpen = ref(false);
const isPassengerOpen = ref(false);
const isCommercialOpen = ref(false);

const navigateToCar = (slug) => {
  isMobileMenuOpen.value = false;
  isPassengerOpen.value = false;
  isCommercialOpen.value = false;
  window.location.href = `/?car=${slug}`;
};
</script>

<template>
  <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-200 shadow-sm w-full">
    <div class="max-w-7xl mx-auto px-3 sm:px-6 h-16 sm:h-20 flex items-center justify-between gap-2 sm:gap-4">
      <!-- LOGO (Ukuran teks fleksibel agar tidak menekan tombol di HP) -->
      <a href="/" class="flex items-center gap-2 sm:gap-3 group shrink min-w-0">
        <img src="/images/suzuki-logo.png" alt="Suzuki Logo" class="h-7 sm:h-9 w-auto object-contain shrink-0" />
        <div class="flex flex-col truncate">
          <span class="font-extrabold text-xs sm:text-base leading-tight uppercase tracking-tight text-slate-900 truncate group-hover:text-red-600 transition-colors">
            Suzuki Megahputra
          </span>
          <span class="text-[8px] sm:text-[10px] text-slate-500 tracking-wider font-semibold uppercase truncate">
            Partner Makassar
          </span>
        </div>  
      </a>

      <!-- MENU DESKTOP -->
      <nav class="hidden xl:flex items-center gap-7 text-sm font-semibold">
        <a href="/" :class="['transition-colors pb-1', currentPage === 'home' ? 'text-red-600 border-b-2 border-red-600 font-bold' : 'text-slate-600 hover:text-red-600']">
          Home
        </a>

        <!-- PASSENGER CAR -->
        <div class="relative" @mouseenter="isPassengerOpen = true" @mouseleave="isPassengerOpen = false">
          <button type="button" class="flex items-center gap-1.5 text-slate-600 hover:text-red-600 transition-colors pb-1 outline-none cursor-pointer">
            <span>Passenger Car</span>
            <span class="material-symbols-outlined text-[16px] transition-transform duration-200" :class="{ 'rotate-180': isPassengerOpen }">expand_more</span>
          </button>
          
          <div v-show="isPassengerOpen" class="absolute top-full left-0 w-60 bg-white border border-slate-200 rounded-xl shadow-xl py-2 z-50">
            <button type="button" @click="navigateToCar('ertiga')" class="w-full flex items-center justify-between px-4 py-2.5 text-xs font-semibold text-slate-700 hover:bg-red-50 hover:text-red-600 transition-colors text-left cursor-pointer">
              <span>All New Ertiga</span><span class="text-[10px] bg-emerald-100 text-emerald-700 px-1.5 py-0.5 rounded font-bold">Hybrid</span>
            </button>
            <button type="button" @click="navigateToCar('xl7')" class="w-full flex items-center justify-between px-4 py-2.5 text-xs font-semibold text-slate-700 hover:bg-red-50 hover:text-red-600 transition-colors text-left cursor-pointer">
              <span>Suzuki XL7</span><span class="text-[10px] text-slate-400">SUV</span>
            </button>
            <button type="button" @click="navigateToCar('fronx')" class="w-full flex items-center justify-between px-4 py-2.5 text-xs font-semibold text-slate-700 hover:bg-red-50 hover:text-red-600 transition-colors text-left cursor-pointer">
              <span>Suzuki Fronx</span><span class="text-[10px] bg-red-100 text-red-600 px-1.5 py-0.5 rounded font-bold">New</span>
            </button>
            <button type="button" @click="navigateToCar('jimny')" class="w-full flex items-center justify-between px-4 py-2.5 text-xs font-semibold text-slate-700 hover:bg-red-50 hover:text-red-600 transition-colors text-left cursor-pointer">
              <span>Suzuki Jimny</span><span class="text-[10px] text-slate-400">4x4</span>
            </button>
            <button type="button" @click="navigateToCar('grand-vitara')" class="w-full flex items-center justify-between px-4 py-2.5 text-xs font-semibold text-slate-700 hover:bg-red-50 hover:text-red-600 transition-colors text-left cursor-pointer">
              <span>Grand Vitara</span><span class="text-[10px] text-slate-400">Flagship</span>
            </button>
            <button type="button" @click="navigateToCar('spresso')" class="w-full flex items-center justify-between px-4 py-2.5 text-xs font-semibold text-slate-700 hover:bg-red-50 hover:text-red-600 transition-colors text-left cursor-pointer">
              <span>Suzuki S-Presso</span><span class="text-[10px] text-slate-400">City Car</span>
            </button>
          </div>
        </div>

        <!-- COMMERCIAL CAR -->
        <div class="relative" @mouseenter="isCommercialOpen = true" @mouseleave="isCommercialOpen = false">
          <button type="button" class="flex items-center gap-1.5 text-slate-600 hover:text-red-600 transition-colors pb-1 outline-none cursor-pointer">
            <span>Commercial Car</span>
            <span class="material-symbols-outlined text-[16px] transition-transform duration-200" :class="{ 'rotate-180': isCommercialOpen }">expand_more</span>
          </button>
          
          <div v-show="isCommercialOpen" class="absolute top-full left-0 w-56 bg-white border border-slate-200 rounded-xl shadow-xl py-2 z-50">
            <button type="button" @click="navigateToCar('carry')" class="w-full flex items-center justify-between px-4 py-2.5 text-xs font-semibold text-slate-700 hover:bg-red-50 hover:text-red-600 transition-colors text-left cursor-pointer">
              <span>Carry Pick Up</span><span class="text-[10px] bg-emerald-100 text-emerald-700 px-1.5 py-0.5 rounded font-bold">Niaga</span>
            </button>
            <button type="button" @click="navigateToCar('apv')" class="w-full flex items-center justify-between px-4 py-2.5 text-xs font-semibold text-slate-700 hover:bg-red-50 hover:text-red-600 transition-colors text-left cursor-pointer">
              <span>Suzuki APV</span><span class="text-[10px] text-slate-400">MPV/Van</span>
            </button>
          </div>
        </div>

        <a href="/#galery-section" class="text-slate-600 hover:text-red-600 transition-colors pb-1">Galery Serah Terima</a>
        <a href="/#kredit-calculator" class="text-slate-600 hover:text-red-600 transition-colors pb-1">Simulasi Kredit</a>
      </nav>

      <!-- PROFIL & CTA BUTTONS (Tersusun pas tanpa over-width di HP) -->
      <div class="flex items-center gap-2 sm:gap-3 shrink-0">
        <a href="https://wa.me/6285299837635" target="_blank" class="hidden md:flex items-center gap-2 bg-slate-50 hover:bg-slate-100 py-1.5 px-3 rounded-xl border border-slate-200">
          <img src="/images/chae.jpeg" class="w-7 h-7 rounded-full object-cover object-top" alt="CHAE SUZUKI" />
          <div class="flex flex-col text-left">
            <span class="text-xs font-bold text-slate-800 leading-none">CHAE SUZUKI</span>
            <span class="text-[9px] text-slate-500 font-medium">Sales Executive</span>
          </div>
        </a>

        <!-- Tombol Chat WA: Tampil Ikon di Mobile, Teks di Desktop -->
        <a href="https://wa.me/6285299837635?text=Halo%20CHAE%20SUZUKI,%20saya%20mau%20tanya%20promo%20Suzuki%20Makassar" target="_blank" class="h-9 sm:h-10 px-3 sm:px-4 bg-red-600 hover:bg-red-700 text-white font-bold text-xs uppercase tracking-wider rounded-xl shadow-md flex items-center gap-1.5 transition-all">
          <span class="material-symbols-outlined text-[16px] sm:text-[18px]">chat</span>
          <span class="hidden sm:inline">Hubungi Sales</span>
          <span class="sm:hidden text-[10px]">Chat</span>
        </a>

        <!-- Tombol Hamburger Mobile -->
        <button type="button" @click="isMobileMenuOpen = !isMobileMenuOpen" class="xl:hidden w-9 h-9 sm:w-10 sm:h-10 flex items-center justify-center rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 transition-colors cursor-pointer shrink-0">
          <span class="material-symbols-outlined text-[20px] sm:text-[24px]">{{ isMobileMenuOpen ? 'close' : 'menu' }}</span>
        </button>
      </div>
    </div>

    <!-- MOBILE MENU DRAWER -->
    <div v-show="isMobileMenuOpen" class="xl:hidden bg-white border-b border-slate-200 px-4 py-4 space-y-3 shadow-xl w-full">
      <a href="/" class="block py-2 text-sm font-bold text-slate-800 border-b border-slate-100">Home</a>
      <div>
        <span class="block text-[11px] font-extrabold text-slate-400 uppercase tracking-wider mb-2">Pilihan Mobil Penumpang</span>
        <div class="grid grid-cols-2 gap-2 text-xs font-semibold">
          <button type="button" @click="navigateToCar('ertiga')" class="p-2.5 rounded-lg bg-slate-50 hover:bg-red-50 hover:text-red-600 text-left">All New Ertiga</button>
          <button type="button" @click="navigateToCar('xl7')" class="p-2.5 rounded-lg bg-slate-50 hover:bg-red-50 hover:text-red-600 text-left">Suzuki XL7</button>
          <button type="button" @click="navigateToCar('fronx')" class="p-2.5 rounded-lg bg-slate-50 hover:bg-red-50 hover:text-red-600 text-left">Suzuki Fronx</button>
          <button type="button" @click="navigateToCar('jimny')" class="p-2.5 rounded-lg bg-slate-50 hover:bg-red-50 hover:text-red-600 text-left">Suzuki Jimny</button>
          <button type="button" @click="navigateToCar('grand-vitara')" class="p-2.5 rounded-lg bg-slate-50 hover:bg-red-50 hover:text-red-600 text-left">Grand Vitara</button>
          <button type="button" @click="navigateToCar('spresso')" class="p-2.5 rounded-lg bg-slate-50 hover:bg-red-50 hover:text-red-600 text-left">Suzuki S-Presso</button>
        </div>
      </div>
      <div>
        <span class="block text-[11px] font-extrabold text-slate-400 uppercase tracking-wider mb-2">Mobil Niaga</span>
        <div class="grid grid-cols-2 gap-2 text-xs font-semibold">
          <button type="button" @click="navigateToCar('carry')" class="p-2.5 rounded-lg bg-slate-50 hover:bg-red-50 hover:text-red-600 text-left">Carry Pick Up</button>
          <button type="button" @click="navigateToCar('apv')" class="p-2.5 rounded-lg bg-slate-50 hover:bg-red-50 hover:text-red-600 text-left">Suzuki APV</button>
        </div>
      </div>
      <div class="pt-2 border-t border-slate-100 flex items-center justify-between text-xs font-bold text-slate-700">
        <a href="/#galery-section" @click="isMobileMenuOpen = false" class="hover:text-red-600">Galeri Serah Terima</a>
        <a href="/#kredit-calculator" @click="isMobileMenuOpen = false" class="hover:text-red-600">Simulasi Kredit</a>
      </div>
    </div>
  </header>
</template>