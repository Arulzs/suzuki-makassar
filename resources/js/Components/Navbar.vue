<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

defineProps({
  currentPage: {
    type: String,
    default: 'home'
  }
});

const isMobileMenuOpen = ref(false);
const isPassengerOpen = ref(false);
const isCommercialOpen = ref(false);
</script>

<template>
  <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-200 shadow-sm">
    <!-- CONTAINER DIPERLEBAR AGAR TIDAK SESAK / MEPET -->
    <div class="max-w-[96rem] mx-auto px-4 sm:px-8 xl:px-12 h-20 flex items-center justify-between gap-6">
      <!-- LOGO -->
      <Link href="/" class="flex items-center gap-3 group shrink-0">
        <img src="/images/suzuki-logo.png" alt="Suzuki Logo" class="h-8 sm:h-10 w-auto object-contain" />
        <div class="flex flex-col">
          <span class="font-extrabold text-base sm:text-lg leading-tight uppercase tracking-tight text-slate-900 group-hover:text-red-600 transition-colors">Suzuki Megahputra Sejahtera</span>
          <span class="text-[9px] sm:text-[10px] text-slate-500 tracking-wider font-semibold uppercase">Authorized Partner Makassar</span>
        </div>  
      </Link>

      <!-- MENU DESKTOP DENGAN JARAK LEGA -->
      <nav class="hidden xl:flex items-center gap-8 2xl:gap-10 text-sm font-semibold mx-4">
        <!-- 1. HOME -->
        <Link href="/" :class="['transition-colors pb-1', currentPage === 'home' ? 'text-red-600 border-b-2 border-red-600 font-bold' : 'text-slate-600 hover:text-red-600']">
          Home
        </Link>

        <!-- 2. PASSENGER CAR (DROPDOWN MENU) -->
        <div class="relative" @mouseenter="isPassengerOpen = true" @mouseleave="isPassengerOpen = false">
          <button type="button" :class="['flex items-center gap-1.5 transition-colors pb-1 outline-none cursor-pointer', currentPage === 'passenger' ? 'text-red-600 border-b-2 border-red-600 font-bold' : 'text-slate-600 hover:text-red-600']">
            <span>Passenger Car</span>
            <span class="material-symbols-outlined text-[16px] transition-transform duration-200" :class="{ 'rotate-180': isPassengerOpen }">expand_more</span>
          </button>
          
          <div v-show="isPassengerOpen" class="absolute top-full left-0 w-64 bg-white border border-slate-200 rounded-xl shadow-xl py-2 z-50">
            <Link href="/mobil/ertiga" class="flex items-center justify-between px-4 py-2.5 text-xs font-semibold text-slate-700 hover:bg-red-50 hover:text-red-600 transition-colors">
              <span>All New Ertiga</span><span class="text-[10px] bg-emerald-100 text-emerald-700 px-1.5 py-0.5 rounded font-bold">Hybrid</span>
            </Link>
            <Link href="/mobil/xl7" class="flex items-center justify-between px-4 py-2.5 text-xs font-semibold text-slate-700 hover:bg-red-50 hover:text-red-600 transition-colors">
              <span>Suzuki XL7</span><span class="text-[10px] text-slate-400">SUV</span>
            </Link>
            <Link href="/mobil/fronx" class="flex items-center justify-between px-4 py-2.5 text-xs font-semibold text-slate-700 hover:bg-red-50 hover:text-red-600 transition-colors">
              <span>Suzuki Fronx</span><span class="text-[10px] bg-red-100 text-red-600 px-1.5 py-0.5 rounded font-bold">New</span>
            </Link>
            <Link href="/mobil/jimny" class="flex items-center justify-between px-4 py-2.5 text-xs font-semibold text-slate-700 hover:bg-red-50 hover:text-red-600 transition-colors">
              <span>Suzuki Jimny</span><span class="text-[10px] text-slate-400">4x4</span>
            </Link>
            <Link href="/mobil/grand-vitara" class="flex items-center justify-between px-4 py-2.5 text-xs font-semibold text-slate-700 hover:bg-red-50 hover:text-red-600 transition-colors">
              <span>Grand Vitara</span><span class="text-[10px] text-slate-400">Flagship</span>
            </Link>
            <Link href="/mobil/spresso" class="flex items-center justify-between px-4 py-2.5 text-xs font-semibold text-slate-700 hover:bg-red-50 hover:text-red-600 transition-colors">
              <span>Suzuki S-Presso</span><span class="text-[10px] text-slate-400">City Car</span>
            </Link>
          </div>
        </div>

        <!-- 3. COMMERCIAL CAR (DROPDOWN MENU) -->
        <div class="relative" @mouseenter="isCommercialOpen = true" @mouseleave="isCommercialOpen = false">
          <button type="button" :class="['flex items-center gap-1.5 transition-colors pb-1 outline-none cursor-pointer', currentPage === 'commercial' ? 'text-red-600 border-b-2 border-red-600 font-bold' : 'text-slate-600 hover:text-red-600']">
            <span>Commercial Car</span>
            <span class="material-symbols-outlined text-[16px] transition-transform duration-200" :class="{ 'rotate-180': isCommercialOpen }">expand_more</span>
          </button>
          
          <div v-show="isCommercialOpen" class="absolute top-full left-0 w-60 bg-white border border-slate-200 rounded-xl shadow-xl py-2 z-50">
            <Link href="/mobil/carry" class="flex items-center justify-between px-4 py-2.5 text-xs font-semibold text-slate-700 hover:bg-red-50 hover:text-red-600 transition-colors">
              <span>Carry Pick Up</span><span class="text-[10px] bg-emerald-100 text-emerald-700 px-1.5 py-0.5 rounded font-bold">Best Niaga</span>
            </Link>
            <Link href="/mobil/apv" class="flex items-center justify-between px-4 py-2.5 text-xs font-semibold text-slate-700 hover:bg-red-50 hover:text-red-600 transition-colors">
              <span>Suzuki APV</span><span class="text-[10px] text-slate-400">Van & MPV</span>
            </Link>
          </div>
        </div>

        <!-- 4. GALERY -->
        <a href="/#galery-section" class="text-slate-600 hover:text-red-600 transition-colors pb-1">
          Galery Serah Terima
        </a>

        <!-- 5. SIMULASI KREDIT -->
        <a href="/#kredit-calculator" class="text-slate-600 hover:text-red-600 transition-colors pb-1">
          Simulasi Kredit
        </a>
      </nav>

      <!-- PROFIL SALES & CTA DENGAN JARAK LONGGAR -->
      <div class="flex items-center gap-4 sm:gap-6 shrink-0">
        <!-- Kartu Sales CHAE SUZUKI -->
        <a href="https://wa.me/6285299837635" target="_blank" class="hidden md:flex items-center gap-2.5 bg-slate-50 hover:bg-slate-100 py-2 px-3.5 rounded-xl border border-slate-200 transition-all hover:shadow-sm">
          <img src="/images/chae.jpeg" class="w-8 h-8 rounded-full object-cover object-top" alt="CHAE SUZUKI" />
          <div class="flex flex-col text-left">
            <span class="text-xs font-bold text-slate-800 leading-none">CHAE SUZUKI</span>
            <span class="text-[10px] text-slate-500 font-medium mt-0.5">Sales Executive</span>
          </div>
        </a>

        <!-- Tombol Hubungi Sales -->
        <a href="https://wa.me/6285299837635?text=Halo%20CHAE%20SUZUKI,%20saya%20mau%20tanya%20promo%20Suzuki%20Makassar" target="_blank" class="h-10 px-5 bg-red-600 hover:bg-red-700 text-white font-bold text-xs uppercase tracking-wider rounded-xl shadow-md flex items-center gap-2 transition-all">
          <span class="material-symbols-outlined text-[17px]">chat</span>
          <span class="hidden sm:inline">Hubungi Sales</span>
          <span class="sm:hidden">Chat</span>
        </a>

        <!-- Tombol Hamburger Mobile -->
        <button type="button" @click="isMobileMenuOpen = !isMobileMenuOpen" class="xl:hidden w-10 h-10 flex items-center justify-center rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 transition-colors cursor-pointer">
          <span class="material-symbols-outlined text-[24px]">{{ isMobileMenuOpen ? 'close' : 'menu' }}</span>
        </button>
      </div>
    </div>

    <!-- MENU MOBILE DRAWER -->
    <div v-show="isMobileMenuOpen" class="xl:hidden bg-white border-b border-slate-200 px-4 py-4 space-y-3 shadow-xl transition-all">
      <Link href="/" @click="isMobileMenuOpen = false" class="block py-2 text-sm font-bold text-slate-800 border-b border-slate-100">
        Home
      </Link>
      <div>
        <span class="block text-[11px] font-extrabold text-slate-400 uppercase tracking-wider mb-2">Pilihan Mobil Penumpang</span>
        <div class="grid grid-cols-2 gap-2 text-xs font-semibold">
          <Link href="/mobil/ertiga" @click="isMobileMenuOpen = false" class="p-2.5 rounded-lg bg-slate-50 hover:bg-red-50 hover:text-red-600">All New Ertiga</Link>
          <Link href="/mobil/xl7" @click="isMobileMenuOpen = false" class="p-2.5 rounded-lg bg-slate-50 hover:bg-red-50 hover:text-red-600">Suzuki XL7</Link>
          <Link href="/mobil/fronx" @click="isMobileMenuOpen = false" class="p-2.5 rounded-lg bg-slate-50 hover:bg-red-50 hover:text-red-600">Suzuki Fronx</Link>
          <Link href="/mobil/jimny" @click="isMobileMenuOpen = false" class="p-2.5 rounded-lg bg-slate-50 hover:bg-red-50 hover:text-red-600">Suzuki Jimny</Link>
          <Link href="/mobil/grand-vitara" @click="isMobileMenuOpen = false" class="p-2.5 rounded-lg bg-slate-50 hover:bg-red-50 hover:text-red-600">Grand Vitara</Link>
          <Link href="/mobil/spresso" @click="isMobileMenuOpen = false" class="p-2.5 rounded-lg bg-slate-50 hover:bg-red-50 hover:text-red-600">Suzuki S-Presso</Link>
        </div>
      </div>
      <div>
        <span class="block text-[11px] font-extrabold text-slate-400 uppercase tracking-wider mb-2">Mobil Komersial & Usaha</span>
        <div class="grid grid-cols-2 gap-2 text-xs font-semibold">
          <Link href="/mobil/carry" @click="isMobileMenuOpen = false" class="p-2.5 rounded-lg bg-slate-50 hover:bg-red-50 hover:text-red-600">Carry Pick Up</Link>
          <Link href="/mobil/apv" @click="isMobileMenuOpen = false" class="p-2.5 rounded-lg bg-slate-50 hover:bg-red-50 hover:text-red-600">Suzuki APV</Link>
        </div>
      </div>
      <div class="pt-2 border-t border-slate-100 flex items-center justify-between text-xs font-bold text-slate-700">
        <a href="/#galery-section" @click="isMobileMenuOpen = false" class="hover:text-red-600">Galeri Serah Terima</a>
        <a href="/#kredit-calculator" @click="isMobileMenuOpen = false" class="hover:text-red-600">Simulasi Kredit</a>
      </div>
    </div>
  </header>
</template>