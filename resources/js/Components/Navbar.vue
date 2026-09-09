<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

defineProps({
  currentPage: {
    type: String,
    default: 'home'
  }
});

const isDropdownOpen = ref(false);
</script>

<template>
  <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 h-20 flex items-center justify-between">
      <!-- LOGO -->
      <Link href="/" class="flex items-center gap-3 group">
        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBxJzqGptyZshRe4dRNSx8Nv-3gWzzQpt4l-JuvAKadBPHPwON9VxvB9gekllldhMoXfgpQ04MEJoELdoIxgl_gQRAtAQneVLYhB2Yr3oZFwMQfF8SIaQX4GWfYUNKWoGzgxi8gaS_qFBaZOv9yeBG4c2gI9KYKCwzL1nuTYD15jiMzXBhHVXZg4UiU4yN0oy77LzsaTI7G--tlylNY4Eijj09upoiEQcGCAo_PLXFOabwHGEzVS1PBdw" alt="Suzuki Logo" class="h-8 w-auto object-contain" />
        <div class="flex flex-col">
          <span class="font-bold text-lg leading-tight uppercase tracking-tight text-slate-900 group-hover:text-red-600 transition-colors">Suzuki Megah</span>
          <span class="text-[10px] text-slate-500 tracking-wider font-semibold uppercase">Authorized Partner Makassar</span>
        </div>
      </Link>

      <!-- MENU NAVIGASI (Tanpa Berita & Promo) -->
      <nav class="hidden xl:flex items-center gap-7 text-sm font-semibold">
        <!-- 1. HOME -->
        <Link href="/" :class="['transition-colors pb-1', currentPage === 'home' ? 'text-red-600 border-b-2 border-red-600 font-bold' : 'text-slate-600 hover:text-red-600']">
          Home
        </Link>

        <!-- 2. PASSENGER CAR (DROPDOWN MENU) -->
        <div class="relative" @mouseenter="isDropdownOpen = true" @mouseleave="isDropdownOpen = false">
          <button type="button" :class="['flex items-center gap-1 transition-colors pb-1 outline-none', currentPage === 'passenger' ? 'text-red-600 border-b-2 border-red-600 font-bold' : 'text-slate-600 hover:text-red-600']">
            <span>Passenger Car</span>
            <span class="material-symbols-outlined text-[16px] transition-transform duration-200" :class="{ 'rotate-180': isDropdownOpen }">expand_more</span>
          </button>

          <!-- Dropdown List -->
          <div v-show="isDropdownOpen" class="absolute top-full left-0 w-64 bg-white border border-slate-200 rounded-xl shadow-xl py-2 z-50">
            <Link href="/mobil/ertiga-hybrid" class="flex items-center justify-between px-4 py-2.5 text-xs font-semibold text-slate-700 hover:bg-red-50 hover:text-red-600 transition-colors">
              <span>All New Ertiga Hybrid</span>
              <span class="text-[10px] bg-emerald-100 text-emerald-700 px-1.5 py-0.5 rounded font-bold">Ready</span>
            </Link>
            <Link href="/#lineup-section" class="flex items-center justify-between px-4 py-2.5 text-xs font-semibold text-slate-700 hover:bg-red-50 hover:text-red-600 transition-colors">
              <span>Suzuki XL7 Alpha Hybrid</span>
              <span class="text-[10px] text-slate-400">SUV</span>
            </Link>
            <Link href="/#lineup-section" class="flex items-center justify-between px-4 py-2.5 text-xs font-semibold text-slate-700 hover:bg-red-50 hover:text-red-600 transition-colors">
              <span>Suzuki Jimny 5-Door</span>
              <span class="text-[10px] text-slate-400">4x4</span>
            </Link>
            <Link href="/#lineup-section" class="flex items-center justify-between px-4 py-2.5 text-xs font-semibold text-slate-700 hover:bg-red-50 hover:text-red-600 transition-colors">
              <span>Grand Vitara Hybrid</span>
              <span class="text-[10px] text-slate-400">Flagship</span>
            </Link>
            <Link href="/#lineup-section" class="flex items-center justify-between px-4 py-2.5 text-xs font-semibold text-slate-700 hover:bg-red-50 hover:text-red-600 transition-colors">
              <span>Suzuki S-Presso ESP</span>
              <span class="text-[10px] text-slate-400">City Car</span>
            </Link>
          </div>
        </div>

        <!-- 3. COMMERCIAL CAR -->
        <Link href="/#lineup-section" class="text-slate-600 hover:text-red-600 transition-colors pb-1">
          Commercial Car
        </Link>

        <!-- 4. GALERY SERAH TERIMA -->
        <a href="/#galery-section" class="text-slate-600 hover:text-red-600 transition-colors pb-1">
          Galery Serah Terima
        </a>

        <!-- 5. SIMULASI KREDIT -->
        <a href="/#kredit-calculator" class="text-slate-600 hover:text-red-600 transition-colors pb-1">
          Simulasi Kredit
        </a>
      </nav>

      <!-- PROFIL SALES & CTA -->
      <div class="flex items-center gap-4">
        <a href="https://wa.me/6285398217447" target="_blank" class="hidden md:flex items-center gap-2 bg-slate-50 hover:bg-slate-100 py-1.5 px-3 rounded-xl border border-slate-200 transition-colors">
          <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAYufb2n-scNSpy6meuyRWf4QJ4kiou3MNh0ZBWIHoGv2_Pwzc3zhzs49gdD8tL7pOG1ZUxF0rLqvqUHsqHrWYwZ0SxS5sEk671DCoIQ2EAfCHts_h3JtfN4JtlkZgQG22Ly4_TQoYzqxiniBNOMBmParMU8_ndHl0G4f32z--dJM3ZipKqwP7xFSnrAtjpj9-6CTfVhmVaonPzvMRMdmQQF-MD42IUVdjtxUm8QOV8rgFthFAELNtAUg" class="w-8 h-8 rounded-full object-cover" alt="Zulkifli" />
          <div class="flex flex-col text-left">
            <span class="text-xs font-bold text-slate-800 leading-none">Zulkifli Bachtiar</span>
            <span class="text-[10px] text-slate-500 font-medium">Senior Sales Executive</span>
          </div>
        </a>

        <a href="https://wa.me/6285398217447?text=Halo%20Suzuki%20Megah%20Makassar" target="_blank" class="h-10 px-5 bg-red-600 hover:bg-red-700 text-white font-bold text-xs uppercase tracking-wider rounded-xl shadow-md flex items-center transition-all">
          Hubungi Sales
        </a>
      </div>
    </div>
  </header>
</template>
