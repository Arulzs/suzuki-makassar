<script setup>
import { ref, computed } from 'vue';
import { Link } from '@inertiajs/vue3';
import Navbar from '../Components/Navbar.vue';

const exteriorColors = [
  { name: "Pearl Snow White", hex: "#FFFFFF" },
  { name: "Magma Gray Metallic", hex: "#595B60" },
  { name: "Cool Black", hex: "#171718" },
  { name: "Burgundy Red Pearl", hex: "#631B2A" },
];
const activeColor = ref(exteriorColors[0]);

const variants = [
  {
    id: "ga-mt",
    name: "Ertiga GA MT",
    subtitle: "Varian dasar berkarakter fungsional & tangguh.",
    transmission: "MANUAL (5-MT)",
    statusTag: "Ready Stock",
    statusColor: "text-emerald-600",
    price: 269700000,
    formattedPrice: "Rp 269.700.000",
    dpStart: "DP Mulai Rp 25 Jt-an",
    isFlagship: false,
    specs: [
      "Mesin 1.5L K15B Bertenaga",
      "AC Digital Double Blower",
      "Dual SRS Airbag & Rem ABS",
      "Tilt Steering & Power Window"
    ]
  },
  {
    id: "gl-mt",
    name: "Ertiga GL MT",
    subtitle: "Pilihan keluarga modern seimbang & stylish.",
    transmission: "MANUAL (5-MT)",
    statusTag: "Paling Diminati",
    statusColor: "text-emerald-600",
    price: 280500000,
    formattedPrice: "Rp 280.500.000",
    dpStart: "DP Mulai Rp 27 Jt-an",
    isFlagship: false,
    specs: [
      "Velg Alloy Wheel 15 Inch Two-tone",
      "Head Unit Touchscreen Bluetooth",
      "Rear Parking Sensor & Kamera",
      "Audio Switch Steering Control"
    ]
  },
  {
    id: "gl-at",
    name: "Ertiga GL AT",
    subtitle: "Kenyamanan matic sempurna lalu lintas kota.",
    transmission: "AUTOMATIC (AT)",
    statusTag: "Ready Stock",
    statusColor: "text-emerald-600",
    price: 291200000,
    formattedPrice: "Rp 291.200.000",
    dpStart: "DP Mulai Rp 28 Jt-an",
    isFlagship: false,
    specs: [
      "Transmisi Otomatis Halus",
      "Hill Hold Control (HHC) Aman di Tanjakan",
      "Electronic Stability Programme (ESP)",
      "Sistem Suspensi MacPherson Stasioner"
    ]
  },
  {
    id: "cruise-hybrid-at",
    name: "Cruise Hybrid AT",
    subtitle: "Edisi paling sporty, elegan & fitur terkomplit.",
    transmission: "SHVS + CRUISE AT",
    statusTag: "10Ah Lithium Battery",
    statusColor: "text-emerald-600 font-bold",
    price: 308200000,
    formattedPrice: "Rp 308.200.000",
    dpStart: "DP Mulai Rp 32 Jt-an",
    isFlagship: true,
    specs: [
      "Baterai Lebih Besar 10Ah (Daya tahan lama)",
      "Sporty Bodykit Depan, Belakang & Side Under",
      "Fitur Cruise Control & Auto Light with Guide Me",
      "LED DRL Modern & Dual Tone Exterior Body"
    ]
  }
];

const formatIDR = (num) => 'Rp ' + Math.round(num).toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');

const selectedPrice = ref(308200000);
const dpPercent = ref(20);
const selectedTenor = ref(5);

const currentVariantName = computed(() => {
  const match = variants.find(v => v.price === Number(selectedPrice.value));
  return match ? match.name : "Suzuki All New Ertiga Hybrid";
});

const dpAmount = computed(() => selectedPrice.value * (dpPercent.value / 100));
const loanPrincipal = computed(() => selectedPrice.value - dpAmount.value);
const monthlyInstallment = computed(() => {
  const annualInterest = 0.032;
  const totalInterest = loanPrincipal.value * annualInterest * selectedTenor.value;
  return (loanPrincipal.value + totalInterest) / (selectedTenor.value * 12);
});

const setCalculatorVariant = (price) => {
  selectedPrice.value = price;
  const el = document.getElementById('kalkulator-section');
  if (el) el.scrollIntoView({ behavior: 'smooth' });
};

const sendCalculationWa = () => {
  const text = `Halo Mas Zulkifli, saya ingin konsultasi simulasi kredit Suzuki:\n\n• Unit: ${currentVariantName.value}\n• Pilihan DP: ${dpPercent.value}% (${formatIDR(dpAmount.value)})\n• Tenor: ${selectedTenor.value} Tahun (${selectedTenor.value * 12} Bulan)\n\nMohon dicek promo diskon dan cashback OTR Makassar untuk tipe ini.`;
  window.open(`https://wa.me/6285398217447?text=${encodeURIComponent(text)}`, '_blank');
};

const leadName = ref('');
const requestBrochure = () => {
  const clientName = leadName.value.trim() ? leadName.value.trim() : 'Bapak/Ibu Calon Konsumen';
  const text = `Halo Mas Zulkifli, saya ${clientName}, ingin minta kiriman PDF Brosur Lengkap & Tabel Angsuran OTR Makassar untuk Suzuki All New Ertiga Hybrid.`;
  window.open(`https://wa.me/6285398217447?text=${encodeURIComponent(text)}`, '_blank');
};
</script>

<template>
  <div class="min-h-screen bg-[#f9f9ff] text-[#111c2d] antialiased">
    <!-- TOP STRIP -->
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

    <!-- NAVBAR RESMI -->
    <Navbar currentPage="passenger" />

    <main class="w-full">
      <!-- BREADCRUMB STRIP (Kembali ke Home aktif) -->
      <section class="w-full bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-3 flex flex-wrap items-center justify-between gap-3 text-xs text-slate-500">
          <nav class="flex items-center gap-1.5 font-medium">
            <Link href="/" class="hover:text-red-600 transition-colors font-bold text-slate-700">Beranda</Link>
            <span class="material-symbols-outlined text-[14px]">chevron_right</span>
            <Link href="/#lineup-section" class="hover:text-red-600 transition-colors">Katalog Passenger Car</Link>
            <span class="material-symbols-outlined text-[14px]">chevron_right</span>
            <span class="text-slate-900 font-bold">Suzuki All New Ertiga Hybrid</span>
          </nav>
          <div class="inline-flex items-center gap-2 text-[11px] font-bold text-emerald-700 bg-emerald-50 px-3 py-1 rounded-full border border-emerald-200">
            <span class="relative flex h-2 w-2">
              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-500 opacity-75"></span>
              <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-600"></span>
            </span>
            UNIT READY STOCK DEALER URIP SUMOHARJO MAKASSAR
          </div>
        </div>
      </section>

      <!-- DETAIL HERO -->
      <section class="w-full py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
          <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            <div class="lg:col-span-7 space-y-4">
              <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-5 space-y-4">
                <div class="relative w-full aspect-[16/10] bg-gradient-to-b from-slate-50 to-slate-100 rounded-xl overflow-hidden flex items-center justify-center">
                  <div class="absolute top-4 left-4 z-10 flex flex-col gap-1.5">
                    <span class="text-[10px] font-bold uppercase tracking-wider bg-red-600 text-white px-2.5 py-1 rounded shadow-sm">
                      Smart Hybrid SHVS
                    </span>
                    <span class="text-[10px] font-bold uppercase tracking-wider bg-[#06182A] text-white px-2.5 py-1 rounded shadow-sm">
                      Garansi Baterai 8 Tahun
                    </span>
                  </div>
                  <img src="https://lh3.googleusercontent.com/aida/AEtjO1X0RC6Mk-T2Id3nyEyfOb2yTxQBW_purU93na9Lg1JT5cfSVwWl-FRO6Awi8qf0OMfi3h_2QlwFHulwTBAzS2zJ_IxjAKWAHbCCUXIZqhO-9vh4t33-VKynj_3xf0bMvBact2VP3QpV2PChJMXwWRmotTpOPQ0Z9i0uFOIk-KwCaa3VL6Yr_IBEStYyOLQ6rdHwHD8NgSjnRxSxK_YqB-jxNQ6e_4FpBmnema_6t4bIQmWZneEz4p-cmI20" alt="Ertiga Stage" class="w-full h-full object-contain p-2 hover:scale-105 transition-transform duration-500" />
                  <div class="absolute bottom-3 right-4 flex items-center gap-1 text-slate-500 text-[11px] font-medium bg-white/80 backdrop-blur-sm px-2.5 py-1 rounded-full border border-slate-200">
                    <span class="material-symbols-outlined text-[14px]">photo_camera</span>
                    <span>Foto Real Unit Dealer Megah</span>
                  </div>
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-slate-50 p-3.5 rounded-xl border border-slate-200">
                  <div>
                    <span class="text-[10px] font-bold uppercase text-slate-400 tracking-wider block">Warna Eksterior</span>
                    <span class="text-sm font-bold text-slate-900">{{ activeColor.name }}</span>
                  </div>
                  <div class="flex items-center gap-2">
                    <button v-for="(color, idx) in exteriorColors" :key="idx" @click="activeColor = color"
                            :title="color.name"
                            :style="{ backgroundColor: color.hex }"
                            :class="['w-8 h-8 rounded-full border transition-all', activeColor.name === color.name ? 'ring-2 ring-red-600 scale-110 border-white shadow-md' : 'border-slate-300 hover:scale-105']"></button>
                  </div>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 pt-1">
                  <div class="bg-slate-50 p-3 rounded-xl border border-slate-200">
                    <div class="flex items-center gap-1 text-red-600 text-xs font-bold uppercase">
                      <span class="material-symbols-outlined text-[16px]">bolt</span> Dapur Pacu
                    </div>
                    <p class="font-extrabold text-slate-900 text-base mt-1">1.462 cc</p>
                    <span class="text-[11px] text-slate-500">K15B + ISG Hybrid</span>
                  </div>
                  <div class="bg-slate-50 p-3 rounded-xl border border-slate-200">
                    <div class="flex items-center gap-1 text-red-600 text-xs font-bold uppercase">
                      <span class="material-symbols-outlined text-[16px]">local_gas_station</span> Efisiensi BBM
                    </div>
                    <p class="font-extrabold text-slate-900 text-base mt-1">21.0 KM/L</p>
                    <span class="text-[11px] text-slate-500">Hasil Uji SHVS</span>
                  </div>
                  <div class="bg-slate-50 p-3 rounded-xl border border-slate-200">
                    <div class="flex items-center gap-1 text-red-600 text-xs font-bold uppercase">
                      <span class="material-symbols-outlined text-[16px]">airline_seat_recline_normal</span> Kapasitas
                    </div>
                    <p class="font-extrabold text-slate-900 text-base mt-1">7-Seater</p>
                    <span class="text-[11px] text-slate-500">Kabin Lega & Fleksibel</span>
                  </div>
                  <div class="bg-slate-50 p-3 rounded-xl border border-slate-200">
                    <div class="flex items-center gap-1 text-red-600 text-xs font-bold uppercase">
                      <span class="material-symbols-outlined text-[16px]">settings</span> Transmisi
                    </div>
                    <p class="font-extrabold text-slate-900 text-base mt-1">AT / 5-MT</p>
                    <span class="text-[11px] text-slate-500">Responsif & Halus</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pricing Right -->
            <div class="lg:col-span-5 space-y-4">
              <div class="bg-white rounded-2xl shadow-md border border-slate-200 p-6 space-y-5">
                <div class="flex items-center gap-2">
                  <span class="text-[11px] font-bold uppercase tracking-wider bg-slate-100 text-slate-700 px-3 py-0.5 rounded-full">
                    OFFICIAL DEALER SULSEL
                  </span>
                  <span class="text-slate-400">•</span>
                  <span class="text-xs text-slate-500">Panaikang - Makassar</span>
                </div>

                <div class="space-y-1">
                  <h1 class="text-2xl lg:text-3xl font-extrabold text-slate-900 leading-tight">
                    Suzuki All New Ertiga Hybrid
                  </h1>
                  <p class="text-xs text-slate-500 leading-relaxed">
                    MPV 7-Seater keluarga berteknologi elektrifikasi pintar Suzuki (SHVS) yang nyaman, bertenaga, kabin senyap, dan super hemat bahan bakar hingga 21 KM/Liter.
                  </p>
                </div>

                <div class="bg-slate-50 border border-slate-200 rounded-xl p-4 space-y-2">
                  <span class="text-[10px] font-bold uppercase text-slate-400 tracking-wider block">HARGA OTR MAKASSAR MULAI</span>
                  <div class="flex items-baseline gap-2">
                    <span class="text-3xl font-extrabold text-red-600">Rp 269.700.000</span>
                    <span class="text-xs text-slate-500">(Tipe GA MT)</span>
                  </div>
                  <div class="grid grid-cols-2 gap-2 pt-2 border-t border-slate-200 text-xs font-semibold text-slate-700">
                    <div class="flex items-center gap-1.5">
                      <span class="material-symbols-outlined text-emerald-600 text-[18px]">payments</span>
                      <span>DP Ringan Mulai <strong>Rp 25 Jt-an</strong></span>
                    </div>
                    <div class="flex items-center gap-1.5">
                      <span class="material-symbols-outlined text-emerald-600 text-[18px]">calendar_month</span>
                      <span>Cicilan Mulai <strong>Rp 4,2 Jt/bln</strong></span>
                    </div>
                  </div>
                </div>

                <div class="space-y-2.5 text-xs text-slate-700">
                  <div class="flex items-start gap-2">
                    <span class="material-symbols-outlined text-emerald-600 text-[18px] shrink-0">check_circle</span>
                    <span><strong>Garansi Baterai Lithium-ion 8 Tahun</strong> atau 160.000 km resmi Suzuki Indonesia.</span>
                  </div>
                  <div class="flex items-start gap-2">
                    <span class="material-symbols-outlined text-emerald-600 text-[18px] shrink-0">check_circle</span>
                    <span><strong>Gratis Biaya Servis & Jasa</strong> berkala s/d 50.000 KM di seluruh bengkel Megah Makassar.</span>
                  </div>
                  <div class="flex items-start gap-2">
                    <span class="material-symbols-outlined text-emerald-600 text-[18px] shrink-0">check_circle</span>
                    <span><strong>Bonus Aksesoris Eksklusif:</strong> Kaca Film Solargard Full, Talang Air, Karpet Beludru, & Plat Sementara.</span>
                  </div>
                </div>

                <div class="space-y-2 pt-2">
                  <a href="https://wa.me/6285398217447?text=Halo%20Mas%20Zulkifli,%20saya%20tertarik%20dengan%20Suzuki%20All%20New%20Ertiga%20Hybrid" target="_blank" class="w-full h-12 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm rounded-xl flex items-center justify-center gap-2 shadow-sm transition-all">
                    <span class="material-symbols-outlined text-[20px]">chat</span>
                    <span>Tanya Promo & Diskon via WhatsApp</span>
                  </a>
                  <a href="#kalkulator-section" class="w-full h-11 bg-[#06182A] hover:bg-slate-800 text-white font-bold text-xs rounded-xl flex items-center justify-center gap-2 transition-all">
                    <span class="material-symbols-outlined text-[18px]">calculate</span>
                    <span>Simulasi Cicilan & Hitung DP</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- VARIANTS -->
      <section class="w-full py-16 bg-slate-50 border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 space-y-8">
          <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
            <div>
              <div class="flex items-center gap-2 text-red-600 text-xs font-bold uppercase tracking-wider">
                <span class="material-symbols-outlined text-[16px]">price_change</span>
                <span>DAFTAR HARGA RESMI OTR SULAWESI SELATAN</span>
              </div>
              <h2 class="text-2xl lg:text-3xl font-extrabold text-slate-900 mt-1">
                Pilihan Tipe All New Ertiga Hybrid
              </h2>
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
            <div v-for="variant in variants" :key="variant.id"
                 :class="['bg-white rounded-2xl p-5 border flex flex-col justify-between transition-all hover:shadow-lg', variant.isFlagship ? 'border-2 border-red-600 shadow-md relative' : 'border-slate-200 shadow-sm']">
              <div v-if="variant.isFlagship" class="absolute -top-3 left-1/2 -translate-x-1/2 bg-red-600 text-white text-[10px] font-bold uppercase px-3 py-0.5 rounded-full shadow-sm">
                TOP FLAGSHIP HYBRID
              </div>

              <div class="space-y-4">
                <div class="flex items-center justify-between pt-1">
                  <span class="text-[10px] font-bold bg-slate-100 text-slate-700 px-2.5 py-1 rounded uppercase">
                    {{ variant.transmission }}
                  </span>
                  <span :class="['text-[11px]', variant.statusColor]">{{ variant.statusTag }}</span>
                </div>

                <div>
                  <h3 class="text-xl font-bold text-slate-900">{{ variant.name }}</h3>
                  <p class="text-xs text-slate-500 mt-0.5">{{ variant.subtitle }}</p>
                </div>

                <div class="bg-slate-50 p-3.5 rounded-xl border border-slate-200">
                  <span class="text-[10px] font-bold uppercase text-slate-400 block">HARGA OTR MAKASSAR</span>
                  <div :class="['text-xl font-extrabold mt-0.5', variant.isFlagship ? 'text-red-600' : 'text-slate-900']">{{ variant.formattedPrice }}</div>
                  <div class="text-xs font-bold text-red-600 mt-1">{{ variant.dpStart }}</div>
                </div>

                <ul class="space-y-2 text-xs text-slate-600">
                  <li v-for="(spec, sIdx) in variant.specs" :key="sIdx" class="flex items-start gap-2">
                    <span class="material-symbols-outlined text-red-600 text-[16px] shrink-0">check</span>
                    <span>{{ spec }}</span>
                  </li>
                </ul>
              </div>

              <div class="pt-5 space-y-2 border-t border-slate-100 mt-4">
                <a :href="`https://wa.me/6285398217447?text=Halo%20Mas%20Zulkifli,%20minta%20info%20diskon%20${encodeURIComponent(variant.name)}`" target="_blank"
                   :class="['w-full h-10 text-xs font-bold rounded-lg flex items-center justify-center gap-1.5 transition-colors', variant.isFlagship ? 'bg-red-600 hover:bg-red-700 text-white shadow-sm' : 'bg-slate-100 hover:bg-slate-200 text-slate-800']">
                  <span class="material-symbols-outlined text-[16px]">chat</span>
                  <span>{{ variant.isFlagship ? 'Tanya Promo Cruise Hybrid' : 'Tanya Tipe Ini' }}</span>
                </a>
                <button type="button" @click="setCalculatorVariant(variant.price)" class="w-full h-9 bg-slate-50 hover:bg-slate-100 text-slate-600 text-xs font-semibold rounded-lg flex items-center justify-center gap-1 transition-colors">
                  <span class="material-symbols-outlined text-[14px]">calculate</span>
                  <span>Hitung Cicilan</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- FINANCIAL CALCULATOR -->
      <section class="w-full py-16 bg-white border-t border-slate-200" id="kalkulator-section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
          <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-200 grid grid-cols-1 lg:grid-cols-12">
            <div class="lg:col-span-7 p-6 lg:p-10 space-y-6">
              <div>
                <span class="text-xs font-bold text-red-600 uppercase tracking-wider">TRANSPARANSI KREDIT MOBIL</span>
                <h2 class="text-2xl lg:text-3xl font-extrabold text-slate-900 mt-1">Kalkulator Simulasi Cicilan Pintar</h2>
                <p class="text-sm text-slate-500">Sesuaikan uang muka (DP) dan tenor pembiayaan untuk mendapatkan estimasi angsuran yang sesuai kemampuan anggaran Anda.</p>
              </div>

              <div class="space-y-4 bg-slate-50 p-5 rounded-2xl border border-slate-200">
                <div>
                  <label class="block text-xs font-bold text-slate-700 mb-1.5">Tipe Mobil Yang Dipilih</label>
                  <select v-model.number="selectedPrice" class="w-full h-11 px-3 bg-white rounded-xl text-sm font-semibold border border-slate-300 outline-none focus:ring-2 focus:ring-[#06182A]">
                    <option v-for="variant in variants" :key="variant.id" :value="variant.price">
                      {{ variant.name }} - {{ variant.formattedPrice }}
                    </option>
                  </select>
                </div>

                <div>
                  <div class="flex items-center justify-between text-xs font-semibold mb-2">
                    <span class="text-slate-600">Uang Muka (DP):</span>
                    <strong class="text-slate-900">{{ dpPercent }}% ({{ formatIDR(dpAmount) }})</strong>
                  </div>
                  <input type="range" min="10" max="50" step="5" v-model.number="dpPercent" class="w-full h-2 bg-slate-200 rounded-lg cursor-pointer accent-red-600" />
                  <div class="flex justify-between text-[11px] font-semibold text-slate-400 mt-1">
                    <span>DP Minimal 10%</span>
                    <span>20%</span>
                    <span>30%</span>
                    <span>50%</span>
                  </div>
                </div>

                <div>
                  <label class="block text-xs font-bold text-slate-700 mb-1.5">Pilihan Jangka Waktu (Tenor)</label>
                  <div class="grid grid-cols-5 gap-2">
                    <button v-for="yr in [1, 2, 3, 4, 5]" :key="yr" type="button" @click="selectedTenor = yr"
                            :class="['py-2.5 rounded-lg text-xs font-bold transition-all', selectedTenor === yr ? 'bg-[#06182A] text-white shadow-md' : 'bg-white hover:bg-slate-200 text-slate-700 border border-slate-200']">
                      {{ yr }} Thn
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <div class="lg:col-span-5 bg-[#06182A] text-white p-6 lg:p-10 flex flex-col justify-between">
              <div class="space-y-4">
                <div class="flex items-center justify-between">
                  <span class="text-xs font-bold uppercase tracking-wider text-slate-400">ESTIMASI PEMBIAYAAN</span>
                  <span class="text-xs font-bold text-emerald-400 flex items-center gap-1">
                    <span class="material-symbols-outlined text-[16px]">verified</span> Bunga Spesial 3,2%
                  </span>
                </div>

                <div>
                  <span class="text-xs text-slate-400">Estimasi Angsuran Bulanan:</span>
                  <p class="text-3xl font-extrabold tracking-tight text-white mt-1">
                    {{ formatIDR(monthlyInstallment) }}<span class="text-sm font-normal text-slate-400"> / bln</span>
                  </p>
                </div>

                <div class="space-y-2 text-xs text-slate-300 border-t border-slate-700 pt-4">
                  <div class="flex justify-between"><span>Total Uang Muka (DP):</span><strong class="text-white">{{ formatIDR(dpAmount) }}</strong></div>
                  <div class="flex justify-between"><span>Tenor Dipilih:</span><strong class="text-white">{{ selectedTenor }} Tahun ({{ selectedTenor * 12 }} Bulan)</strong></div>
                  <div class="flex justify-between"><span>Asuransi:</span><span class="text-emerald-400 font-semibold">Kombinasi All Risk / TLO</span></div>
                </div>
              </div>

              <div class="pt-6 space-y-2">
                <button type="button" @click="sendCalculationWa" class="w-full h-12 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs rounded-xl flex items-center justify-center gap-2 shadow-lg transition-all">
                  <span class="material-symbols-outlined text-[18px]">chat</span>
                  <span>Kirim Hasil Hitungan ke WhatsApp Sales</span>
                </button>
                <p class="text-center text-[10px] text-slate-400">*Simulasi belum termasuk potongan diskon cashback dealer Megah Makassar.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- SALES PROFILE -->
      <section class="w-full py-16 bg-slate-50 border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
          <div class="bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden grid grid-cols-1 lg:grid-cols-12">
            <div class="lg:col-span-5 relative min-h-[360px] lg:min-h-full bg-slate-100 flex items-center justify-center">
              <img src="https://lh3.googleusercontent.com/aida/AEtjO1XISPr18GiiBLnswNhpRfYIaknWS5J-osrO9zVUEDvQimE9B_0eLw5tDWu9vWiYx53nUu4gemFcGTgAcNEabXaps8hQ9qLPM4CHbbSTm1gDB4zHxjxjxe2d3EaYbikm-USg5fMI2DzPWcLunUuya5a8a-BQ2mFKofyF0k16iS9lmazJzWdqDaVdAFEsIZHC9uC7qQ7fkIb-nlvZC3MXrr3rJFUHVe2WO1CtinSj_2SRlTRJlBxySellpXrf" class="w-full h-full object-cover object-top" alt="Zulkifli Bachtiar" />
              <div class="absolute bottom-4 left-4 right-4 bg-[#06182A]/90 backdrop-blur-md p-3.5 rounded-xl text-white flex items-center justify-between">
                <div>
                  <h4 class="font-bold text-sm">Zulkifli Bachtiar</h4>
                  <span class="text-[10px] text-slate-300 uppercase tracking-wider">Senior Sales Executive Suzuki Megah</span>
                </div>
                <div class="text-right">
                  <div class="flex items-center gap-1 text-emerald-400 justify-end text-xs font-bold">
                    <span class="material-symbols-outlined text-[16px]">star</span> 4.9 / 5.0
                  </div>
                  <span class="text-[10px] text-slate-400">250+ Pelanggan Puas</span>
                </div>
              </div>
            </div>

            <div class="lg:col-span-7 p-6 lg:p-10 flex flex-col justify-between gap-6">
              <div class="space-y-3">
                <div class="inline-flex items-center gap-2 bg-red-50 text-red-600 px-3 py-1 rounded-full text-xs font-bold">
                  <span class="material-symbols-outlined text-[16px]">workspace_premium</span>
                  <span>Konsultan Resmi Terpercaya Suzuki Megah Makassar</span>
                </div>
                <h2 class="text-2xl font-extrabold text-slate-900 leading-tight">
                  Konsultasikan Suzuki Ertiga Impian Anda Bersama Saya
                </h2>
                <p class="text-xs text-slate-500 leading-relaxed">
                  Pengalaman lebih dari 10 tahun melayani pembelian mobil Suzuki di wilayah Makassar, Gowa, Maros, dan seluruh kabupaten di Sulawesi Selatan. Siap membantu perhitungan kredit terbaik, diskon maksimal, hingga berkas dijemput langsung ke alamat Anda.
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 pt-1 text-xs font-semibold text-slate-700">
                  <div class="flex items-center gap-2"><span class="material-symbols-outlined text-emerald-600 text-[18px]">task_alt</span> Data & Berkas Dibantu Sampai Approve</div>
                  <div class="flex items-center gap-2"><span class="material-symbols-outlined text-emerald-600 text-[18px]">task_alt</span> Test Drive Diantar ke Rumah / Kantor</div>
                  <div class="flex items-center gap-2"><span class="material-symbols-outlined text-emerald-600 text-[18px]">task_alt</span> Terima Tukar Tambah Segala Merk Mobil</div>
                  <div class="flex items-center gap-2"><span class="material-symbols-outlined text-emerald-600 text-[18px]">task_alt</span> Pengiriman Aman Pakai Towing Resmi</div>
                </div>
              </div>

              <div class="space-y-3 bg-slate-50 p-4 rounded-xl border border-slate-200">
                <div class="flex items-center justify-between text-xs">
                  <div class="flex items-center gap-2 font-bold text-slate-800">
                    <span class="relative flex h-2.5 w-2.5">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-600"></span>
                    </span>
                    Online & Siap Melayani (Respon < 5 Menit)
                  </div>
                  <span class="text-slate-500 font-mono">0853-9821-7447</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                  <a href="https://wa.me/6285398217447?text=Halo%20Mas%20Zulkifli,%20saya%20ingin%20konsultasi%20pembelian%20Suzuki%20All%20New%20Ertiga%20Hybrid" target="_blank" class="h-11 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold rounded-xl flex items-center justify-center gap-2 transition-all">
                    <span class="material-symbols-outlined text-[18px]">chat</span> Chat WhatsApp Langsung
                  </a>
                  <a href="tel:085398217447" class="h-11 bg-[#06182A] hover:bg-slate-800 text-white text-xs font-bold rounded-xl flex items-center justify-center gap-2 transition-all">
                    <span class="material-symbols-outlined text-[18px]">call</span> Telepon Langsung
                  </a>
                </div>
                <div class="flex flex-col sm:flex-row items-center gap-2 pt-1">
                  <input v-model="leadName" type="text" placeholder="Ketik Nama Anda..." class="h-10 px-3 bg-white rounded-lg text-xs w-full sm:flex-1 border border-slate-300 outline-none focus:ring-2 focus:ring-red-600" />
                  <button type="button" @click="requestBrochure" class="h-10 px-4 bg-red-600 hover:bg-red-700 text-white text-xs font-bold rounded-lg w-full sm:w-auto transition-colors whitespace-nowrap">
                    Minta Brosur & Simulasi OTR
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- FLOATING ACTIONS -->
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
        <a href="#kalkulator-section" class="flex-1 h-11 bg-slate-100 hover:bg-slate-200 text-slate-900 border border-slate-300 rounded-full text-xs font-bold flex items-center justify-center gap-1.5 transition-all">
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
            <p class="text-xs text-slate-400 leading-relaxed">Dealer resmi 3S (Sales, Service, Sparepart) Suzuki Mobil wilayah Makassar dan Sulawesi Selatan dengan layanan purnajual terstandarisasi Suzuki Indonesia.</p>
          </div>

          <div class="space-y-3">
            <h4 class="font-bold text-sm text-white">Showroom & Bengkel 3S</h4>
            <p class="text-xs text-slate-400">Jl. Urip Sumoharjo No. 88, Panaikang, Kec. Panakkukang, Kota Makassar, Sulawesi Selatan 90231</p>
          </div>

          <div class="space-y-3">
            <h4 class="font-bold text-sm text-white">Layanan Penjualan</h4>
            <ul class="space-y-2 text-xs text-slate-400">
              <li><Link href="/#lineup-section" class="hover:text-white transition-colors">Katalog Passenger Car</Link></li>
              <li><Link href="/#lineup-section" class="hover:text-white transition-colors">Katalog Komersial</Link></li>
              <li><a href="#kalkulator-section" class="hover:text-white transition-colors">Simulasi Kredit DP Ringan</a></li>
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
          </div>
        </div>

        <div class="pt-6 flex flex-col md:flex-row items-center justify-between text-xs text-slate-500 gap-4">
          <p>© 2026 PT Megahputra Sejahtera (Suzuki Megah Makassar). Hak Cipta Dilindungi Undang-Undang.</p>
        </div>
      </div>
    </footer>
  </div>
</template>
