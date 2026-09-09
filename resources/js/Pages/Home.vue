<script setup>
import { ref, computed } from 'vue';
import { Link } from '@inertiajs/vue3';
import Navbar from '../Components/Navbar.vue';

// 1. Data Slider Hero
const heroSlides = [
  {
    id: 1,
    tag: "PROMO SPESIAL BULAN INI • MAKASSAR",
    tagColor: "bg-red-600 text-white",
    title: "All New Ertiga Hybrid: Kenyamanan Cerdas Keluarga",
    description: "Dapatkan promo DP ringan mulai 10% atau angsuran hemat 3 jutaan/bulan. Disertai bonus kaca film Solargard, karpet set, dan Free Service berkala s/d 50.000 KM.",
    btnPrimary: "Minta Brosur & Simulasi",
    btnSecondary: "Lihat Spesifikasi",
    image: "https://lh3.googleusercontent.com/aida-public/AB6AXuAzR1UXcla3tDR_aSF0GtXVAMPuuBlN7Q8GY7ZVlmHsGtesn3ojDYYG4y0V3wzyDVpNsvQlFGnV1yXs5mdf8zCJtAQw-afGE0jk2Be6UmJl6wB4YPqvo537BVd5_-lryPPcwKz2nco4T4Lv1mRL3LoZWdEB96W3WZF0-GqLffEPo1VQAecO9y5NVIjsFkWX6JrlNLCOuIpxlJ0tvicwseLy2dJqhOBMN2_RkQgDtYHhC_hduX3sYoLM2w",
    waParam: "promo Ertiga Hybrid Makassar"
  },
  {
    id: 2,
    tag: "RAJANYA PICK UP SULAWESI SELATAN",
    tagColor: "bg-emerald-600 text-white",
    title: "New Carry Pick Up Wide Deck: Rajanya Niaga Teruji",
    description: "Daya angkut muatan tangguh hingga 1 ton dengan bak 3 sisi buka, mesin K15B ekstra irit dan bandel. Angsuran mulai 100 ribuan per hari khusus pelaku usaha Sulawesi.",
    btnPrimary: "Paket DP Usaha Murah",
    btnSecondary: "Rincian Dimensi Bak",
    image: "https://lh3.googleusercontent.com/aida/AEtjO1Xjm9qSUKvBnl2pWKti3zr9iVQ5kt525fD9U8iLVaxosNhTHHChv2i6yB2Cp9Hik6CRM7qhAHTGPFgRXdceQcg-jrYwOfTN2HAKpmJEpLaz6FfXu46W9RM7LxACL176W9z7-9keDWIHrUs13w-XBBftAmrkG7Lf6y-6vqD9BOKlDAabTT2GmoKs3rSMRUcXm1ZRxs4RvI2w9AoiJyqLE9vE6oUx7QsMP5NG3v8rO_KQXXEASkuzg-CoPTo",
    waParam: "info paket kredit New Carry Pick Up Makassar"
  }
];
const currentSlide = ref(0);

// 2. Data Mobil Showroom
const cars = [
  {
    id: 1,
    name: "All New Ertiga Hybrid",
    category: ["passenger", "hybrid"],
    badgeTopLeft: "Smart Hybrid SHVS",
    badgeTopLeftColor: "bg-emerald-600",
    badgeTopRight: "Ready Unit",
    badgeTopRightColor: "bg-red-600",
    segment: "LMPV 7-SEATER UNGGULAN",
    price: 269700000,
    formattedPrice: "Rp 269.700.000",
    tags: ["1.500cc SHVS", "7 Penumpang", "AT & MT"],
    detailUrl: "/mobil/ertiga-hybrid",
    image: "https://lh3.googleusercontent.com/aida-public/AB6AXuAzR1UXcla3tDR_aSF0GtXVAMPuuBlN7Q8GY7ZVlmHsGtesn3ojDYYG4y0V3wzyDVpNsvQlFGnV1yXs5mdf8zCJtAQw-afGE0jk2Be6UmJl6wB4YPqvo537BVd5_-lryPPcwKz2nco4T4Lv1mRL3LoZWdEB96W3WZF0-GqLffEPo1VQAecO9y5NVIjsFkWX6JrlNLCOuIpxlJ0tvicwseLy2dJqhOBMN2_RkQgDtYHhC_hduX3sYoLM2w"
  },
  {
    id: 2,
    name: "Suzuki XL7 Alpha Hybrid",
    category: ["passenger", "hybrid"],
    badgeTopLeft: "SUV Family Gagah",
    badgeTopLeftColor: "bg-[#06182A]",
    segment: "EXTRA COMFORT SUV",
    price: 298600000,
    formattedPrice: "Rp 298.600.000",
    tags: ["Ground Clearance 200mm", "E-Mirror Touchscreen", "Cruise Control"],
    detailUrl: "https://wa.me/6285398217447?text=Halo%20Zulkifli,%20minta%20brosur%20dan%20detail%20XL7%20Alpha%20Hybrid",
    image: "https://lh3.googleusercontent.com/aida-public/AB6AXuDUcIQzDXUUTfPb-JvK9lSmoBb3zwGxziSoRToU0btHP2S72EpztjQ1kpcqQLR0XXDVYXY8tJ9j_NRnpXzjlIo-TnRTDI5cjnO6HC-W6PEV26Ehc-86hhyndJNU2ov749Acbp6snx_90CcjJL0vJRQcWZjgZqKSYjMZ-0zeT0oHghRw-o8lifNY1Y1ie7UXMf469ZxnN5aiHP6dIYjMKxwJrAsYEG23FchJZK4Buo_fIsWeHECizvdoAA"
  },
  {
    id: 3,
    name: "Suzuki Jimny 5-Door",
    category: ["passenger"],
    badgeTopLeft: "Legendary 4x4 Offroad",
    badgeTopLeftColor: "bg-red-600",
    segment: "THE AUTHENTIC 4WD ICON",
    price: 465000000,
    formattedPrice: "Rp 465.000.000",
    tags: ["AllGrip Pro 4WD", "Ladder Frame Chassis", "9\" Headunit HD"],
    detailUrl: "https://wa.me/6285398217447?text=Halo%20Zulkifli,%20minta%20info%20detail%20mobil%20Suzuki%20Jimny%205-Door",
    image: "https://lh3.googleusercontent.com/aida-public/AB6AXuDstxcMhzkqKbQRVpBKfiRV8Aa0Ppd7MN1kNn5ttdu7FZIl0s5BOel9HwrttMIKcSUbFyz08CCFD-oOhCMygOoSfs7O4xoC25nHDHo08cVPQglysa_tM76EnQQgtWHwlJIob3NGJQYJ5hjGGNlSf15EcxAFDfMjHAoghzELdxBMQC8MgkEzlSZiqw2WCX0GfMGUdxKx1XnLOhrXFZ8ZLEMX8SA8Lrn-KTro86-rDaPbt2w8UZln9Ic0MQ"
  },
  {
    id: 4,
    name: "New Carry Pick Up Wide Deck",
    category: ["commercial"],
    badgeTopLeft: "Rajanya Niaga",
    badgeTopLeftColor: "bg-emerald-600",
    segment: "SOLUSI BISNIS & LOGISTIK",
    price: 198700000,
    formattedPrice: "Rp 198.700.000",
    tags: ["Daya Muat 1 Ton", "Buka Bak 3 Sisi", "Mesin K15B-C Irit"],
    detailUrl: "https://wa.me/6285398217447?text=Halo%20Zulkifli,%20minta%20spesifikasi%20detail%20New%20Carry%20Pick%20Up",
    image: "https://lh3.googleusercontent.com/aida/AEtjO1Xjm9qSUKvBnl2pWKti3zr9iVQ5kt525fD9U8iLVaxosNhTHHChv2i6yB2Cp9Hik6CRM7qhAHTGPFgRXdceQcg-jrYwOfTN2HAKpmJEpLaz6FfXu46W9RM7LxACL176W9z7-9keDWIHrUs13w-XBBftAmrkG7Lf6y-6vqD9BOKlDAabTT2GmoKs3rSMRUcXm1ZRxs4RvI2w9AoiJyqLE9vE6oUx7QsMP5NG3v8rO_KQXXEASkuzg-CoPTo"
  },
  {
    id: 5,
    name: "Suzuki S-Presso ESP",
    category: ["passenger"],
    badgeTopLeft: "City Compact SUV",
    badgeTopLeftColor: "bg-[#49607e]",
    segment: "LINCAH & SUPER HEMAT BBM",
    price: 178500000,
    formattedPrice: "Rp 178.500.000",
    tags: ["Irit s/d 21 km/L", "Transmisi AGS/MT", "Dual SRS Airbag"],
    detailUrl: "https://wa.me/6285398217447?text=Halo%20Zulkifli,%20minta%20detail%20mobil%20Suzuki%20S-Presso",
    image: "https://lh3.googleusercontent.com/aida-public/AB6AXuDtcR9tJZOTPYFFRJkkCQjt0Jb_WVVS72YaEWNuAAZDdqPIpxBkGDFUV_Nxb3gjJe-rrkHzbXJnlUrJz8Sm22Ue69GXhIsd_LrpUeZmxhNgWiML8wtMT2Bgcfd-PxrINMNhNJpCwhjmHU39CcT6TLUYVZTcdbAVNTN3FKaqWv_M-RNAIvotpyn68i1KGntLf1Db3NSpM71WIdDq8BSgcgcoKD_ADHSVoF0jfvZ9Vm5LUQukrICHRQ5CwQ"
  },
  {
    id: 6,
    name: "Grand Vitara Hybrid",
    category: ["passenger", "hybrid"],
    badgeTopLeft: "Flagship Hybrid SUV",
    badgeTopLeftColor: "bg-[#06182A]",
    segment: "THE INTELLIGENT PREMIUM SUV",
    price: 388000000,
    formattedPrice: "Rp 388.000.000",
    tags: ["Panoramic Sunroof", "360 View Camera", "Wireless Charger"],
    detailUrl: "https://wa.me/6285398217447?text=Halo%20Zulkifli,%20minta%20info%20detail%20fitur%20Grand%20Vitara%20Hybrid",
    image: "https://lh3.googleusercontent.com/aida-public/AB6AXuBayBns8aNsSkeVIy4-lXb09Miup1f-PeI2TOpQ7suisLzWpzZB4S9t_WqI2J1oeYEEg55lwAyrzoVAen4tAUnFpsDILuwzMxiSVYX_ThFpl6p20muc091bGWe6_SjYUDz7kmlJevjO-FusejJn7jS7lrHPbr7HpN5tVO97mYP1pENorwZ7W7j64rNeSUTNMqtNiP-1Wuery4SM7z0ukRzMrSu2ckbBJxcdTOz1FjYRIcQPEOnlhLjokw"
  }
];

const selectedCategory = ref('all');
const filteredCars = computed(() => {
  if (selectedCategory.value === 'all') return cars;
  return cars.filter(c => c.category.includes(selectedCategory.value));
});

// 3. Kalkulator Kredit Instan
const formatIDR = (num) => 'Rp ' + Math.round(num).toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');

const calcCarPrice = ref(269700000);
const calcDpPercent = ref(20);
const calcTenor = ref(5);

const calcDpAmount = computed(() => calcCarPrice.value * (calcDpPercent.value / 100));
const calcLoan = computed(() => calcCarPrice.value - calcDpAmount.value);
const calcMonthly = computed(() => {
  const annualRate = 0.032;
  const totalInterest = calcLoan.value * annualRate * calcTenor.value;
  return (calcLoan.value + totalInterest) / (calcTenor.value * 12);
});

const selectedCarName = computed(() => {
  const match = cars.find(c => c.price === Number(calcCarPrice.value));
  return match ? match.name : "All New Ertiga Hybrid";
});

const calcWhatsAppUrl = computed(() => {
  const text = `Halo Zulkifli Bachtiar, saya sudah simulasi kredit di website untuk ${selectedCarName.value} dengan DP ${calcDpPercent.value}% (${formatIDR(calcDpAmount.value)}) tenor ${calcTenor.value} tahun. Mohon info promo diskonnya.`;
  return `https://wa.me/6285398217447?text=${encodeURIComponent(text)}`;
});
</script>

<template>
  <div class="min-h-screen bg-[#f9f9ff] text-[#111c2d] antialiased">
    <!-- TOP NOTIFICATION STRIP -->
    <div class="bg-[#06182A] text-white hidden lg:block border-b border-slate-800">
      <div class="max-w-7xl mx-auto px-6 h-10 flex items-center justify-between text-xs font-medium">
        <div class="flex items-center gap-6">
          <a href="tel:04118539821" class="flex items-center gap-1.5 text-slate-300 hover:text-white transition-colors">
            <span class="material-symbols-outlined text-[16px]">call</span> (0411) 853-9821
          </a>
          <a href="https://wa.me/6285398217447" target="_blank" class="flex items-center gap-1.5 text-slate-300 hover:text-white transition-colors">
            <span class="material-symbols-outlined text-[16px]">chat</span> +62 853-9821-7447
          </a>
          <a href="mailto:sales@suzukimakassar.co.id" class="flex items-center gap-1.5 text-slate-300 hover:text-white transition-colors">
            <span class="material-symbols-outlined text-[16px]">mail</span> sales@suzukimakassar.co.id
          </a>
        </div>
        <div class="flex items-center gap-4">
          <div class="flex items-center gap-2 bg-slate-800/80 px-3 py-0.5 rounded-full border border-slate-700">
            <span class="relative flex h-2 w-2">
              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
              <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
            </span>
            <span class="text-slate-300">Senin - Sabtu: 08:30 - 17:00 WITA</span>
          </div>
          <span class="text-slate-400">|</span>
          <span class="text-slate-300 font-semibold">Dealer Resmi 3S Makassar</span>
        </div>
      </div>
    </div>

    <!-- NAVBAR AKTIF -->
    <Navbar currentPage="home" />

    <main class="w-full">
      <!-- 1. HERO SLIDER BANNER -->
      <section class="relative w-full overflow-hidden bg-[#06182A] text-white">
        <div class="relative w-full h-[580px] lg:h-[650px]">
          <div v-for="(slide, index) in heroSlides" :key="slide.id"
               :class="['absolute inset-0 transition-opacity duration-700', currentSlide === index ? 'opacity-100 z-10' : 'opacity-0 z-0 pointer-events-none']">
            <img :src="slide.image" :alt="slide.title" class="w-full h-full object-cover object-center" />
            <div class="absolute inset-0 bg-gradient-to-r from-[#06182A]/95 via-[#06182A]/75 to-transparent"></div>
            <div class="relative max-w-7xl mx-auto h-full px-6 flex flex-col justify-center">
              <div class="max-w-2xl space-y-4">
                <span :class="['inline-flex items-center gap-1.5 text-xs font-bold px-3 py-1 rounded-full shadow-md tracking-wider uppercase', slide.tagColor]">
                  <span class="material-symbols-outlined text-[14px]">local_fire_department</span>
                  {{ slide.tag }}
                </span>
                <h1 class="text-3xl lg:text-5xl font-extrabold leading-tight tracking-tight text-white">
                  {{ slide.title }}
                </h1>
                <p class="text-slate-300 text-sm lg:text-base leading-relaxed">
                  {{ slide.description }}
                </p>
                <div class="pt-2 flex flex-wrap items-center gap-4">
                  <a :href="`https://wa.me/6285398217447?text=${encodeURIComponent(slide.waParam)}`" target="_blank" class="h-12 px-6 bg-red-600 hover:bg-red-700 text-white font-bold text-sm rounded-xl shadow-lg flex items-center gap-2 transition-all">
                    <span class="material-symbols-outlined text-[18px]">request_quote</span>
                    {{ slide.btnPrimary }}
                  </a>
                  <a href="#lineup-section" class="h-12 px-6 bg-white/15 hover:bg-white/25 text-white font-bold text-sm rounded-xl backdrop-blur-sm flex items-center gap-2 transition-all">
                    {{ slide.btnSecondary }}
                    <span class="material-symbols-outlined text-[18px]">arrow_downward</span>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <!-- Slider Controls -->
          <div class="absolute bottom-16 left-0 right-0 z-20">
            <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">
              <div class="flex items-center gap-3">
                <button v-for="(_, idx) in heroSlides" :key="idx" @click="currentSlide = idx"
                        :class="['h-2.5 transition-all rounded-full', currentSlide === idx ? 'w-10 bg-red-600' : 'w-3 bg-white/40']"></button>
              </div>
              <div class="flex items-center gap-2">
                <div class="bg-[#06182A]/80 backdrop-blur-md px-3 py-1.5 rounded-full text-xs font-mono text-slate-300">
                  <strong class="text-white">0{{ currentSlide + 1 }}</strong> / 02
                </div>
                <button @click="currentSlide = currentSlide === 0 ? 1 : 0" class="w-9 h-9 rounded-full bg-white/20 hover:bg-white text-white hover:text-slate-900 transition-all flex items-center justify-center">
                  <span class="material-symbols-outlined text-[20px]">chevron_left</span>
                </button>
                <button @click="currentSlide = currentSlide === 1 ? 0 : 1" class="w-9 h-9 rounded-full bg-white/20 hover:bg-white text-white hover:text-slate-900 transition-all flex items-center justify-center">
                  <span class="material-symbols-outlined text-[20px]">chevron_right</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- 2. QUICK ACTION STRIP -->
      <section class="relative z-30 -mt-12 max-w-7xl mx-auto px-4 sm:px-6 w-full">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
          <a href="https://wa.me/6285398217447?text=Halo%20Zulkifli,%20saya%20mau%20booking%20test%20drive" target="_blank" class="group bg-white rounded-xl p-5 shadow-md hover:shadow-xl transition-all border border-slate-200 flex flex-col justify-between">
            <div class="space-y-2">
              <div class="w-10 h-10 rounded-lg bg-red-50 flex items-center justify-center text-red-600 group-hover:bg-red-600 group-hover:text-white transition-colors">
                <span class="material-symbols-outlined text-[22px]">airline_seat_recline_extra</span>
              </div>
              <h3 class="font-bold text-slate-900 group-hover:text-red-600 transition-colors">Booking Test Drive</h3>
              <p class="text-xs text-slate-500 leading-relaxed">Jadwal fleksibel. Mobil diantar langsung ke alamat rumah atau kantor Anda di Makassar.</p>
            </div>
            <div class="pt-4 flex items-center gap-1 text-xs font-bold text-red-600">
              <span>Reservasi Sekarang</span>
              <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
            </div>
          </a>

          <a href="#kredit-calculator" class="group bg-white rounded-xl p-5 shadow-md hover:shadow-xl transition-all border border-slate-200 flex flex-col justify-between">
            <div class="space-y-2">
              <div class="w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center text-slate-900 group-hover:bg-slate-900 group-hover:text-white transition-colors">
                <span class="material-symbols-outlined text-[22px]">calculate</span>
              </div>
              <h3 class="font-bold text-slate-900 group-hover:text-red-600 transition-colors">Simulasi Kredit Instan</h3>
              <p class="text-xs text-slate-500 leading-relaxed">Hitung estimasi DP 10%-50% & tenor 1-5 tahun dengan skema bunga ringan leasing resmi.</p>
            </div>
            <div class="pt-4 flex items-center gap-1 text-xs font-bold text-slate-900">
              <span>Hitung Angsuran</span>
              <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
            </div>
          </a>

          <a href="https://wa.me/6285398217447?text=Halo%20Zulkifli,%20saya%20mau%20konsultasi%20tukar%20tambah%20mobil%20bekas" target="_blank" class="group bg-white rounded-xl p-5 shadow-md hover:shadow-xl transition-all border border-slate-200 flex flex-col justify-between">
            <div class="space-y-2">
              <div class="w-10 h-10 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                <span class="material-symbols-outlined text-[22px]">sync_alt</span>
              </div>
              <h3 class="font-bold text-slate-900 group-hover:text-red-600 transition-colors">Tukar Tambah (Trade-In)</h3>
              <p class="text-xs text-slate-500 leading-relaxed">Tukar mobil lama segala merk dengan unit Suzuki baru. Taksiran harga appraisal tertinggi.</p>
            </div>
            <div class="pt-4 flex items-center gap-1 text-xs font-bold text-emerald-600">
              <span>Konsultasi Trade-In</span>
              <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
            </div>
          </a>

          <a href="https://wa.me/6285398217447?text=Halo%20Zulkifli,%20boleh%20minta%20brosur%20dan%20daftar%20harga%20OTR%20Makassar%20terbaru?" target="_blank" class="group bg-white rounded-xl p-5 shadow-md hover:shadow-xl transition-all border border-slate-200 flex flex-col justify-between">
            <div class="space-y-2">
              <div class="w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center text-slate-600 group-hover:bg-slate-700 group-hover:text-white transition-colors">
                <span class="material-symbols-outlined text-[22px]">download</span>
              </div>
              <h3 class="font-bold text-slate-900 group-hover:text-red-600 transition-colors">Katalog Harga OTR</h3>
              <p class="text-xs text-slate-500 leading-relaxed">Pricelist OTR resmi Makassar & Sulawesi Selatan edisi terbaru lengkap paket promo.</p>
            </div>
            <div class="pt-4 flex items-center gap-1 text-xs font-bold text-slate-600">
              <span>Kirim PDF ke WhatsApp</span>
              <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
            </div>
          </a>
        </div>
      </section>

      <!-- 3. VEHICLE LINEUP SHOWCASE -->
      <section class="w-full py-16" id="lineup-section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 space-y-8">
          <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
              <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-red-600">
                <span class="w-2 h-2 rounded-full bg-red-600"></span>
                <span>Showroom Resmi Suzuki Makassar</span>
              </div>
              <h2 class="text-2xl lg:text-3xl font-extrabold text-slate-900 mt-1">
                Daftar Harga & Model Suzuki Terbaru OTR Makassar
              </h2>
              <p class="text-sm text-slate-500">Pilihan unit ready stock dengan penawaran bunga kompetitif, DP minim, dan bonus aksesoris original.</p>
            </div>

            <!-- Filter Tabs -->
            <div class="flex items-center gap-1 bg-slate-100 p-1 rounded-xl self-start md:self-auto">
              <button @click="selectedCategory = 'all'" :class="['px-4 py-2 text-xs font-bold rounded-lg transition-all', selectedCategory === 'all' ? 'bg-white text-slate-900 shadow-sm' : 'text-slate-600 hover:text-slate-900']">Semua Model</button>
              <button @click="selectedCategory = 'passenger'" :class="['px-4 py-2 text-xs font-bold rounded-lg transition-all', selectedCategory === 'passenger' ? 'bg-white text-slate-900 shadow-sm' : 'text-slate-600 hover:text-slate-900']">Passenger Car</button>
              <button @click="selectedCategory = 'commercial'" :class="['px-4 py-2 text-xs font-bold rounded-lg transition-all', selectedCategory === 'commercial' ? 'bg-white text-slate-900 shadow-sm' : 'text-slate-600 hover:text-slate-900']">Commercial Niaga</button>
              <button @click="selectedCategory = 'hybrid'" :class="['px-4 py-2 text-xs font-bold rounded-lg transition-all', selectedCategory === 'hybrid' ? 'bg-white text-slate-900 shadow-sm' : 'text-slate-600 hover:text-slate-900']">Smart Hybrid</button>
            </div>
          </div>

          <!-- Car Grid -->
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div v-for="car in filteredCars" :key="car.id" class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all border border-slate-200 flex flex-col justify-between">
              <div>
                <div class="relative bg-slate-50 aspect-[16/10] overflow-hidden flex items-center justify-center p-3">
                  <span :class="['absolute top-3 left-3 text-white text-[10px] font-bold px-2.5 py-1 rounded shadow-sm z-10', car.badgeTopLeftColor]">
                    {{ car.badgeTopLeft }}
                  </span>
                  <span v-if="car.badgeTopRight" :class="['absolute top-3 right-3 text-white text-[10px] font-bold px-2.5 py-1 rounded shadow-sm z-10', car.badgeTopRightColor]">
                    {{ car.badgeTopRight }}
                  </span>
                  <img :src="car.image" :alt="car.name" class="w-full h-full object-contain hover:scale-105 transition-transform duration-300" />
                </div>

                <div class="p-5 space-y-3">
                  <div>
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">{{ car.segment }}</span>
                    <h3 class="text-xl font-bold text-slate-900 leading-snug">{{ car.name }}</h3>
                  </div>
                  <div>
                    <span class="text-xs text-slate-400">Harga OTR Makassar mulai:</span>
                    <p class="text-xl font-extrabold text-red-600">{{ car.formattedPrice }}</p>
                  </div>
                  <div class="flex flex-wrap gap-1.5 pt-1">
                    <span v-for="(tag, i) in car.tags" :key="i" class="text-[11px] font-semibold bg-slate-100 text-slate-600 px-2.5 py-1 rounded">
                      {{ tag }}
                    </span>
                  </div>
                </div>
              </div>

              <!-- Tombol Detail Mobil & Hitung DP -->
              <div class="p-5 pt-0 grid grid-cols-2 gap-2">
                <Link v-if="car.detailUrl.startsWith('/')" :href="car.detailUrl"
                      class="h-10 bg-[#06182A] hover:bg-slate-800 text-white text-xs font-bold rounded-lg flex items-center justify-center transition-colors">
                  Detail Mobil
                </Link>
                <a v-else :href="car.detailUrl" target="_blank"
                   class="h-10 bg-[#06182A] hover:bg-slate-800 text-white text-xs font-bold rounded-lg flex items-center justify-center transition-colors">
                  Detail Mobil
                </a>

                <a :href="`https://wa.me/6285398217447?text=Halo%20Zulkifli,%20saya%20mau%20hitung%20DP%20dan%20promo%20${encodeURIComponent(car.name)}`" target="_blank"
                   class="h-10 bg-red-600 hover:bg-red-700 text-white text-xs font-bold rounded-lg flex items-center justify-center gap-1 transition-colors shadow-sm">
                  <span class="material-symbols-outlined text-[15px]">chat</span>
                  <span>Hitung DP</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- 4. INTERACTIVE CREDIT SIMULATOR -->
      <section class="w-full py-16 bg-slate-50 border-y border-slate-200" id="kredit-calculator">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
          <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-200 grid grid-cols-1 lg:grid-cols-12">
            <!-- Left Controls -->
            <div class="lg:col-span-7 p-6 lg:p-10 space-y-6">
              <div>
                <span class="text-xs font-bold text-red-600 uppercase tracking-wider">Transparansi Pembiayaan</span>
                <h2 class="text-2xl lg:text-3xl font-extrabold text-slate-900 mt-1">Simulasi Kredit Instan Suzuki</h2>
                <p class="text-sm text-slate-500">Sesuaikan uang muka (DP) dan jangka waktu angsuran sesuai kemampuan anggaran Anda.</p>
              </div>

              <div class="space-y-4">
                <div>
                  <label class="block text-sm font-semibold text-slate-800 mb-1.5">Pilih Model Kendaraan</label>
                  <select v-model.number="calcCarPrice" class="w-full h-12 px-4 rounded-xl bg-slate-100 border border-slate-200 text-sm font-semibold text-slate-800 outline-none focus:bg-white focus:ring-2 focus:ring-[#06182A]">
                    <option v-for="car in cars" :key="car.id" :value="car.price">
                      {{ car.name }} - {{ car.formattedPrice }}
                    </option>
                  </select>
                </div>

                <div>
                  <div class="flex items-center justify-between text-sm mb-2">
                    <span class="font-semibold text-slate-800">Besaran Uang Muka (DP): <strong class="text-red-600">{{ calcDpPercent }}%</strong></span>
                    <span class="text-slate-500 font-bold">{{ formatIDR(calcDpAmount) }}</span>
                  </div>
                  <input type="range" min="10" max="50" step="5" v-model.number="calcDpPercent" class="w-full h-2 bg-slate-200 rounded-lg cursor-pointer accent-red-600" />
                  <div class="flex justify-between text-[11px] font-semibold text-slate-400 mt-1">
                    <span>10% (DP Minim)</span>
                    <span>25%</span>
                    <span>40%</span>
                    <span>50%</span>
                  </div>
                </div>

                <div>
                  <label class="block text-sm font-semibold text-slate-800 mb-1.5">Jangka Waktu (Tenor)</label>
                  <div class="grid grid-cols-5 gap-2">
                    <button v-for="yr in [1, 2, 3, 4, 5]" :key="yr" type="button" @click="calcTenor = yr"
                            :class="['py-2.5 rounded-lg text-sm font-bold transition-all', calcTenor === yr ? 'bg-red-600 text-white shadow-md' : 'bg-slate-100 hover:bg-slate-200 text-slate-700']">
                      {{ yr }} Thn
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Right Results -->
            <div class="lg:col-span-5 bg-[#06182A] text-white p-6 lg:p-10 flex flex-col justify-between">
              <div class="space-y-4">
                <div class="flex items-center justify-between">
                  <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Estimasi Pembiayaan</span>
                  <span class="text-xs font-bold text-emerald-400 bg-emerald-500/20 px-2.5 py-0.5 rounded">Bunga Spesial 3.2%</span>
                </div>

                <div class="bg-white/10 rounded-xl p-4 space-y-1">
                  <span class="text-xs text-slate-300">Estimasi Angsuran Per Bulan:</span>
                  <p class="text-3xl font-extrabold tracking-tight text-white">
                    {{ formatIDR(calcMonthly) }}<span class="text-sm font-normal text-slate-300"> / bln</span>
                  </p>
                  <p class="text-[11px] text-slate-300">*Perhitungan estimasi include asuransi & biaya administrasi leasing rekanan resmi.</p>
                </div>

                <div class="space-y-2 text-sm text-slate-300 border-t border-slate-700 pt-4">
                  <div class="flex justify-between"><span>Harga Mobil (OTR):</span><strong class="text-white">{{ formatIDR(calcCarPrice) }}</strong></div>
                  <div class="flex justify-between"><span>Total DP:</span><strong class="text-white">{{ formatIDR(calcDpAmount) }}</strong></div>
                  <div class="flex justify-between"><span>Tenor Dipilih:</span><strong class="text-white">{{ calcTenor * 12 }} Bulan ({{ calcTenor }} Tahun)</strong></div>
                  <div class="flex justify-between"><span>Mitra Leasing Resmi:</span><span class="text-slate-200">BCA Finance, Mandiri, SFI</span></div>
                </div>
              </div>

              <div class="pt-6 space-y-2">
                <a :href="calcWhatsAppUrl" target="_blank" class="w-full h-12 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl flex items-center justify-center gap-2 shadow-lg transition-all">
                  <span class="material-symbols-outlined text-[20px]">chat</span>
                  <span>Ajukan Kredit ke WhatsApp Sales</span>
                </a>
                <p class="text-center text-[10px] text-slate-400">Data persyaratan dibantu hingga 100% Approval oleh Zulkifli Bachtiar.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- 5. DEALER ADVANTAGES -->
      <section class="w-full py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 space-y-10">
          <div class="text-center max-w-2xl mx-auto space-y-1">
            <span class="text-xs font-bold uppercase tracking-wider text-red-600">Keuntungan Resmi Suzuki Megah</span>
            <h2 class="text-2xl lg:text-3xl font-extrabold text-slate-900">Mengapa Membeli di Dealer Kami?</h2>
            <p class="text-sm text-slate-500">Memberikan kemudahan kepemilikan mobil baru Suzuki dengan pelayanan terstandarisasi PT Megahputra Sejahtera Makassar.</p>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm space-y-3">
              <div class="w-12 h-12 rounded-xl bg-red-50 flex items-center justify-center text-red-600">
                <span class="material-symbols-outlined text-[28px]">speed</span>
              </div>
              <h3 class="font-bold text-slate-900 text-lg">Proses Cepat 24 Jam</h3>
              <p class="text-xs text-slate-500 leading-relaxed">Persyaratan kredit mudah dan fleksibel, berkas persyaratan dijemput langsung ke lokasi, dan jaminan persetujuan leasing rekanan.</p>
            </div>

            <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm space-y-3">
              <div class="w-12 h-12 rounded-xl bg-slate-100 flex items-center justify-center text-[#06182A]">
                <span class="material-symbols-outlined text-[28px]">verified</span>
              </div>
              <h3 class="font-bold text-slate-900 text-lg">Jaringan 3S & SGP Resmi</h3>
              <p class="text-xs text-slate-500 leading-relaxed">Didukung fasilitas Sales, Service & Spareparts original Suzuki Genuine Parts dengan teknisi bersertifikasi nasional di Makassar.</p>
            </div>

            <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm space-y-3">
              <div class="w-12 h-12 rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-600">
                <span class="material-symbols-outlined text-[28px]">percent</span>
              </div>
              <h3 class="font-bold text-slate-900 text-lg">Bunga Rendah Mulai 2.9%</h3>
              <p class="text-xs text-slate-500 leading-relaxed">Bekerja sama dengan pembiayaan terkemuka: BCA Finance, Mandiri Tunas Finance, Maybank, Adira, dan Suzuki Finance Indonesia.</p>
            </div>

            <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm space-y-3">
              <div class="w-12 h-12 rounded-xl bg-slate-100 flex items-center justify-center text-slate-700">
                <span class="material-symbols-outlined text-[28px]">home_repair_service</span>
              </div>
              <h3 class="font-bold text-slate-900 text-lg">Home Service & Derek 24 Jam</h3>
              <p class="text-xs text-slate-500 leading-relaxed">Kemudahan servis berkala teknisi datang ke rumah Anda di Makassar serta perlindungan layanan darurat towing 24 jam nonstop.</p>
            </div>
          </div>
        </div>
      </section>

      <!-- 6. DELIVERY GALLERY -->
      <section class="w-full py-16 bg-slate-50 border-t border-slate-200" id="galery-section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 space-y-8">
          <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
              <span class="text-xs font-bold uppercase tracking-wider text-emerald-600">Kepercayaan Pelanggan</span>
              <h2 class="text-2xl lg:text-3xl font-extrabold text-slate-900 mt-1">Bukti Kepuasan Pelanggan Suzuki Megah Makassar</h2>
              <p class="text-sm text-slate-500">Momen penyerahan unit mobil impian bersama Senior Sales Executive Zulkifli Bachtiar kepada konsumen setia kami.</p>
            </div>
            <a href="https://wa.me/6285398217447" target="_blank" class="text-sm font-bold text-red-600 hover:text-red-700 flex items-center gap-1">
              <span>Lihat Semua 100+ Galery Serah Terima</span>
              <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
            </a>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Testimonial 1 -->
            <div class="bg-white rounded-xl overflow-hidden border border-slate-200 shadow-sm flex flex-col justify-between">
              <div>
                <div class="relative aspect-[4/3] bg-slate-100 overflow-hidden">
                  <img src="https://lh3.googleusercontent.com/aida/AEtjO1Wp5wpsc3N3z6HUPa_1FuxNYTdh537dDiH8O_P9zSzq2iowODmXA7FqRpUQUUCi7RMkYuYuxgaQpkluTVKi5xLcPm5V0AQnvmsZIuO_F7Vrulf9PjtGRahUwTnaXEuS9urfx6KLdjAZnr0rIapl4OArLF64_HJNgD2sKLaMfnCfdcdkaN4JW6aGPz2d9vJojsnMBuHO9DKbaJZnTwJdAaOHslXegN0-FQUSTrAG2_vc-FWGAofkbLIUeqI" alt="Delivery Jimny" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" />
                  <span class="absolute top-3 left-3 bg-[#06182A]/90 text-white text-[10px] font-bold px-2.5 py-1 rounded">Unit Serah Terima</span>
                </div>
                <div class="p-5 space-y-2">
                  <div class="flex items-center gap-1 text-emerald-600 text-xs font-bold">
                    <span class="material-symbols-outlined text-[16px]">verified</span> Verified Buyer • Makassar
                  </div>
                  <h3 class="font-bold text-slate-900 text-base">Serah Terima Suzuki Jimny 5-Door • Bpk. Irfan</h3>
                  <p class="text-xs text-slate-500 leading-relaxed">"Alhamdulillah proses indent dan pengiriman unit Jimny 5-Door sangat transparan dan cepat dibantu Mas Zulkifli. Sangat puas!"</p>
                </div>
              </div>
              <div class="p-5 pt-0 text-[11px] font-semibold text-slate-400">Tanggal Serah Terima: 14 Februari 2026</div>
            </div>

            <!-- Testimonial 2 -->
            <div class="bg-white rounded-xl overflow-hidden border border-slate-200 shadow-sm flex flex-col justify-between">
              <div>
                <div class="relative aspect-[4/3] bg-slate-100 overflow-hidden">
                  <img src="https://lh3.googleusercontent.com/aida/AEtjO1XFmvatPs4qh6PAZ7UX6Qmmxgmgzn6WWiBcYZTsbIS45V6vD2Tl4SlVtLmhhkUX3dXIF-YuXXr197BSGE59vmkimL5NbO4GKItowZl2bFJjYo6RQUVQWsamTVIJWAwbuBagnxuC4aY5GYljJBDIWLvnY936DH5nBAk6CpFGioantPyenNpO9OivSNnYcXkX2U5--7hUA9_w1xBwvwer9l6Hn85Z2Uc1_-2DsB_CYjKUMnb_8QIrrGUDbBfu" alt="Delivery XL7" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" />
                  <span class="absolute top-3 left-3 bg-[#06182A]/90 text-white text-[10px] font-bold px-2.5 py-1 rounded">Unit Serah Terima</span>
                </div>
                <div class="p-5 space-y-2">
                  <div class="flex items-center gap-1 text-emerald-600 text-xs font-bold">
                    <span class="material-symbols-outlined text-[16px]">verified</span> Verified Buyer • Gowa
                  </div>
                  <h3 class="font-bold text-slate-900 text-base">All New XL7 Hybrid • Keluarga Bpk. Ridwan</h3>
                  <p class="text-xs text-slate-500 leading-relaxed">"Pilihan tepat untuk mobil keluarga. Konsumsi BBM irit untuk mudik luar kota, bonus aksesorisnya lengkap dari Suzuki Megah Makassar."</p>
                </div>
              </div>
              <div class="p-5 pt-0 text-[11px] font-semibold text-slate-400">Tanggal Serah Terima: 08 Februari 2026</div>
            </div>

            <!-- Testimonial 3 -->
            <div class="bg-white rounded-xl overflow-hidden border border-slate-200 shadow-sm flex flex-col justify-between">
              <div>
                <div class="relative aspect-[4/3] bg-slate-100 overflow-hidden">
                  <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCpNGUfFrtO-XXGnJN5S87xx8lEF1ozBPl3DRu9OlSrVyRL4MYbDVzGkDJGiCGHA6ppxKVR5RCOwVCdqSsJ-TJJvWbsNmd6mfOLQ-TviZm-ebFCcWLm-3TTz9DKU3UsnWv2d9CNXRDyV2u_DHIuCilAdjUf4psD9DepW2LH68te4U7MFyNPQ0AXFSO1PjMmrNbs1Qf21AY5jkZQ6Dfw45zs8l_nemIpEkV8yk1SJc00piC3t_8sQcrcCw" alt="Delivery Carry" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" />
                  <span class="absolute top-3 left-3 bg-[#06182A]/90 text-white text-[10px] font-bold px-2.5 py-1 rounded">Unit Usaha Niaga</span>
                </div>
                <div class="p-5 space-y-2">
                  <div class="flex items-center gap-1 text-emerald-600 text-xs font-bold">
                    <span class="material-symbols-outlined text-[16px]">verified</span> Verified SME • Maros
                  </div>
                  <h3 class="font-bold text-slate-900 text-base">New Carry Pick Up Wide Deck • Bpk. Herman</h3>
                  <p class="text-xs text-slate-500 leading-relaxed">"DP sangat terjangkau, proses survei leasing cuma 1 hari langsung ACC. Mobil langsung beroperasi lancar untuk pengiriman bahan pokok."</p>
                </div>
              </div>
              <div class="p-5 pt-0 text-[11px] font-semibold text-slate-400">Tanggal Serah Terima: 02 Februari 2026</div>
            </div>
          </div>
        </div>
      </section>

      <!-- 7. SALES CTA BANNER -->
      <section class="w-full py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
          <div class="relative rounded-2xl overflow-hidden bg-[#06182A] text-white p-8 lg:p-12 shadow-2xl">
            <div class="relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
              <div class="lg:col-span-8 space-y-4">
                <div class="inline-flex items-center gap-2 bg-slate-800 px-3 py-1 rounded-full text-xs font-bold text-slate-300">
                  <span class="material-symbols-outlined text-[16px] text-emerald-400">support_agent</span>
                  <span>KONSULTAN PENJUALAN RESMI SUZUKI MAKASSAR</span>
                </div>
                <h2 class="text-2xl lg:text-4xl font-extrabold leading-tight">
                  Ingin Diskon Maksimal & Hitungan Kredit Paling Terjangkau?
                </h2>
                <p class="text-slate-300 text-sm lg:text-base leading-relaxed max-w-2xl">
                  Hubungi langsung <strong class="text-white">Zulkifli Bachtiar</strong> (Senior Sales Executive Suzuki Megah Makassar). Konsultasi 100% gratis, siap melayani penawaran harga terbaik, simulasi kredit menyesuaikan budget, tukar tambah, hingga test drive ke rumah.
                </p>
                <div class="pt-2 flex flex-wrap items-center gap-4">
                  <a href="https://wa.me/6285398217447?text=Halo%20Zulkifli%20Bachtiar,%20saya%20mau%20konsultasi%20promo%20Suzuki%20Makassar" target="_blank" class="h-12 px-6 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm rounded-xl shadow-lg flex items-center gap-2 transition-all">
                    <span class="material-symbols-outlined text-[20px]">chat</span>
                    <span>Chat WhatsApp (0853-9821-7447)</span>
                  </a>
                  <a href="tel:04118539821" class="h-12 px-6 bg-white/15 hover:bg-white/25 text-white font-bold text-sm rounded-xl backdrop-blur-sm flex items-center gap-2 transition-all">
                    <span class="material-symbols-outlined text-[20px]">call</span>
                    <span>Hubungi (0411) 853-9821</span>
                  </a>
                </div>
              </div>

              <div class="lg:col-span-4 flex justify-center lg:justify-end">
                <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl border border-slate-700 text-center space-y-3 max-w-xs w-full">
                  <div class="relative w-24 h-24 mx-auto">
                    <img src="https://lh3.googleusercontent.com/aida/AEtjO1XrL9-1II7AkqoQKgoB9BHhsn6eSlwF4OzeQfLN8hZNrPtc9DVzK1nCBHTT2Z0JrH5R8vlaNUNcpzLixOWdL_KYh08PHghAmyOHB5p3mQIUWVKvy_rBuUsLe9yvF3gB-K-E7MPxr3XbqfnV8_7B93LV6nJoeDdF8MhpIhOX7KdN7Bc1ijuYXACbK73ADDo2bAtDUiQNHnRspzYNkb5jqETOObYThKKkZs0l3xTHHhI_Tzq4Uu_6OOvnnYM9" class="w-full h-full rounded-full object-cover border-2 border-red-600 shadow-md" alt="Zulkifli Bachtiar" />
                    <span class="absolute bottom-0 right-0 w-6 h-6 rounded-full bg-emerald-500 border-2 border-[#06182A] flex items-center justify-center text-white text-xs font-bold">?</span>
                  </div>
                  <div>
                    <h3 class="font-bold text-white text-lg">Zulkifli Bachtiar</h3>
                    <p class="text-xs text-red-400 font-bold uppercase tracking-wider">Senior Sales Executive</p>
                    <p class="text-xs text-slate-400">PT Megahputra Sejahtera (3S)</p>
                  </div>
                  <p class="text-[11px] text-slate-300 italic">"Komitmen melayani Bapak/Ibu dengan ramah, cepat, jujur dan transparan di seluruh Sulawesi Selatan."</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- FLOATING QUICK BOTTOM BAR -->
    <aside class="fixed bottom-6 left-1/2 -translate-x-1/2 z-40 w-[92%] max-w-xl">
      <div class="bg-white/90 backdrop-blur-xl border border-slate-200 shadow-2xl rounded-full p-1.5 flex items-center justify-between gap-1.5">
        <a href="tel:04118539821" class="flex-1 h-11 bg-[#06182A] hover:bg-slate-800 text-white rounded-full text-xs font-bold flex items-center justify-center gap-1.5 transition-all">
          <span class="material-symbols-outlined text-[18px]">call</span>
          <span class="hidden sm:inline">Fast Call</span>
        </a>
        <a href="https://wa.me/6285398217447" target="_blank" class="flex-[1.3] h-11 bg-emerald-600 hover:bg-emerald-700 text-white rounded-full text-xs font-bold flex items-center justify-center gap-1.5 shadow-sm transition-all">
          <span class="relative flex h-2 w-2">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-80"></span>
            <span class="relative inline-flex rounded-full h-2 w-2 bg-white"></span>
          </span>
          <span class="material-symbols-outlined text-[18px]">forum</span>
          <span>WhatsApp</span>
        </a>
        <a href="#kredit-calculator" class="flex-1 h-11 bg-slate-100 hover:bg-slate-200 text-slate-900 border border-slate-300 rounded-full text-xs font-bold flex items-center justify-center gap-1.5 transition-all">
          <span class="material-symbols-outlined text-[18px]">calculate</span>
          <span class="hidden sm:inline">Simulasi</span>
        </a>
        <button @click="window.scrollTo({top: 0, behavior: 'smooth'})" class="w-11 h-11 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-600 flex items-center justify-center transition-colors shrink-0">
          <span class="material-symbols-outlined text-[20px]">arrow_upward</span>
        </button>
      </div>
    </aside>

    <!-- FOOTER -->
    <footer class="w-full bg-[#06182A] text-white pt-16 pb-12 border-t border-slate-800">
      <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 pb-12 border-b border-slate-800">
          <div class="space-y-4">
            <div class="flex items-center gap-3">
              <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBxJzqGptyZshRe4dRNSx8Nv-3gWzzQpt4l-JuvAKadBPHPwON9VxvB9gekllldhMoXfgpQ04MEJoELdoIxgl_gQRAtAQneVLYhB2Yr3oZFwMQfF8SIaQX4GWfYUNKWoGzgxi8gaS_qFBaZOv9yeBG4c2gI9KYKCwzL1nuTYD15jiMzXBhHVXZg4UiU4yN0oy77LzsaTI7G--tlylNY4Eijj09upoiEQcGCAo_PLXFOabwHGEzVS1PBdw" class="h-8 w-auto object-contain brightness-0 invert" alt="Suzuki Emblem" />
              <span class="font-bold text-lg uppercase tracking-tight">Megah Makassar</span>
            </div>
            <p class="text-xs text-slate-400 leading-relaxed">
              Dealer resmi 3S (Sales, Service, Sparepart) Suzuki Mobil wilayah Makassar dan Sulawesi Selatan dengan layanan purnajual terstandarisasi Suzuki Indonesia.
            </p>
            <div class="flex items-center gap-2">
              <span class="text-[10px] font-bold bg-slate-800 border border-slate-700 px-2.5 py-1 rounded-full text-slate-300">SGP GENUINE</span>
              <span class="text-[10px] font-bold bg-slate-800 border border-slate-700 px-2.5 py-1 rounded-full text-slate-300">ECSTAR LUBRICANTS</span>
            </div>
          </div>

          <div class="space-y-3">
            <h4 class="font-bold text-sm text-white">Showroom & Bengkel 3S</h4>
            <p class="text-xs text-slate-400 flex items-start gap-2">
              <span class="material-symbols-outlined text-[18px] text-red-500 shrink-0">location_on</span>
              <span>Jl. Urip Sumoharjo No. 88, Panaikang, Kec. Panakkukang, Kota Makassar, Sulawesi Selatan 90231</span>
            </p>
            <p class="text-xs text-slate-400 flex items-center gap-2">
              <span class="material-symbols-outlined text-[18px] text-red-500 shrink-0">schedule</span>
              <span>Senin - Sabtu: 08:30 - 17:00 WITA<br/>Minggu / Libur: Siaga Booking</span>
            </p>
          </div>

          <div class="space-y-3">
            <h4 class="font-bold text-sm text-white">Layanan Penjualan</h4>
            <ul class="space-y-2 text-xs text-slate-400">
              <li><a href="#" class="hover:text-white transition-colors">Katalog Passenger Car (Fronx, Grand Vitara, XL7)</a></li>
              <li><a href="#" class="hover:text-white transition-colors">Katalog Komersial (New Carry Pick Up)</a></li>
              <li><a href="#" class="hover:text-white transition-colors">Program Promo & Diskon DP Ringan</a></li>
              <li><a href="#" class="hover:text-white transition-colors">Trade-in / Tukar Tambah Mobil Bekas</a></li>
              <li><a href="#" class="hover:text-white transition-colors">Test Drive ke Rumah / Kantor</a></li>
            </ul>
          </div>

          <div class="space-y-3">
            <h4 class="font-bold text-sm text-white">Kontak Konsultan Resmi</h4>
            <div class="bg-slate-800/80 p-4 rounded-xl border border-slate-700 space-y-1">
              <div class="flex items-center gap-1 text-emerald-400 text-xs font-bold">
                <span class="material-symbols-outlined text-[16px]">verified</span> Zulkifli Bachtiar
              </div>
              <p class="text-xs text-slate-300">Senior Sales Executive Suzuki Megah</p>
              <a href="https://wa.me/6285398217447" target="_blank" class="text-xs font-bold text-emerald-400 hover:text-emerald-300 flex items-center gap-1 pt-1">
                <span class="material-symbols-outlined text-[14px]">chat</span> Chat Personal WhatsApp
              </a>
            </div>
            <div class="text-xs text-slate-400">
              <span class="block font-semibold text-white">Customer Care:</span>
              (0411) 853-9821 / 0853-9821-7447
            </div>
          </div>
        </div>

        <div class="pt-6 flex flex-col md:flex-row items-center justify-between text-xs text-slate-500 gap-4">
          <p>© 2026 PT Megahputra Sejahtera (Suzuki Megah Makassar). Hak Cipta Dilindungi Undang-Undang.</p>
          <div class="flex items-center gap-6">
            <a href="#" class="hover:text-white transition-colors">Kebijakan Privasi</a>
            <a href="#" class="hover:text-white transition-colors">Syarat & Ketentuan Kredit</a>
            <a href="#" class="hover:text-white transition-colors">Jaringan Bengkel Resmi</a>
          </div>
        </div>
      </div>
    </footer>
  </div>
</template>
