<script setup>
import { ref, computed } from 'vue';
import { Link } from '@inertiajs/vue3';
import Navbar from '../Components/Navbar.vue';

// 1. Data Slider Hero (3 Slide Lengkap)
const heroSlides = [
  {
    id: 1,
    tag: "PROMO SPESIAL BULAN INI • MAKASSAR",
    tagColor: "bg-red-600 text-white",
    title: "All New Ertiga Hybrid: Kenyamanan Cerdas Keluarga",
    description: "Dapatkan promo DP ringan mulai 20 Jt-an atau angsuran hemat 3 jutaan/bulan. Disertai bonus kaca film Solargard, karpet set, dan Free Service berkala s/d 50.000 KM.",
    btnPrimary: "Minta Brosur & Simulasi",
    btnSecondary: "Lihat Spesifikasi",
    image: "/images/Banner.1.1.jpg",
    waParam: "promo Ertiga Hybrid Makassar"
  },
  {
    id: 2,
    tag: "RAJANYA PICK UP SULAWESI SELATAN",
    tagColor: "bg-emerald-600 text-white",
    title: "New Carry Pick Up: Rajanya Niaga Teruji",
    description: "Daya angkut muatan tangguh hingga 1 ton dengan bak luas, mesin K15B ekstra irit dan bandel. DP super minim mulai 10 Jt-an khusus pelaku usaha Sulawesi.",
    btnPrimary: "Paket DP Usaha Murah",
    btnSecondary: "Rincian Dimensi Bak",
    image: "/images/Banner2.jpg",
    waParam: "info paket kredit New Carry Pick Up Makassar"
  },
  {
    id: 3,
    tag: "EXTRA COMFORT SUV • SULAWESI SELATAN",
    tagColor: "bg-[#06182A] text-white border border-slate-700",
    title: "Suzuki XL7 Alpha Hybrid: Gagah, Sporty & Berkelas",
    description: "SUV 7-seater tangguh dengan ground clearance 200 mm, fitur canggih Smart E-Mirror Touchscreen, DP mulai 25 Jt-an dan efisiensi teknologi Smart Hybrid SHVS.",
    btnPrimary: "Promo Spesial XL7",
    btnSecondary: "Lihat Spesifikasi",
    image: "/images/baner3.jpg",
    waParam: "promo Suzuki XL7 Hybrid Makassar"
  }
];
const currentSlide = ref(0);

const nextSlide = () => {
  currentSlide.value = (currentSlide.value + 1) % heroSlides.length;
};

const prevSlide = () => {
  currentSlide.value = (currentSlide.value - 1 + heroSlides.length) % heroSlides.length;
};

// 2. Data Mobil Showroom (8 Unit Lengkap dengan DP Promo)
const cars = [
  {
    id: 1,
    name: "All New Ertiga",
    category: ["passenger", "hybrid"],
    badgeTopLeft: "Smart Hybrid SHVS",
    badgeTopLeftColor: "bg-emerald-600",
    badgeTopRight: "Ready Unit",
    badgeTopRightColor: "bg-red-600",
    segment: "LMPV 7-SEATER UNGGULAN",
    price: 269700000,
    formattedPrice: "Rp 269.700.000",
    dpPromo: "DP Mulai Rp 20 Jt-an",
    dpValue: 20000000,
    tags: ["1.500cc SHVS", "7 Penumpang", "AT & MT"],
    detailUrl: "/mobil/ertiga",
    image: "/images/ERTIGA.jpeg"
  },
  {
    id: 2,
    name: "Suzuki XL7",
    category: ["passenger", "hybrid"],
    badgeTopLeft: "SUV Family Gagah",
    badgeTopLeftColor: "bg-[#06182A]",
    segment: "EXTRA COMFORT SUV",
    price: 305300000,
    formattedPrice: "Rp 305.300.000",
    dpPromo: "DP Mulai Rp 25 Jt-an",
    dpValue: 25000000,
    tags: ["Ground Clearance 200mm", "E-Mirror Touchscreen", "Cruise Control"],
    detailUrl: "/mobil/xl7",
    image: "/images/XL7.jpeg"
  },
  {
    id: 3,
    name: "Suzuki Fronx",
    category: ["passenger", "hybrid"],
    badgeTopLeft: "New Modern Crossover",
    badgeTopLeftColor: "bg-red-600",
    segment: "DYNAMIC COMPACT CROSSOVER",
    price: 279500000,
    formattedPrice: "Rp 279.500.000",
    dpPromo: "DP Mulai Rp 30 Jt-an",
    dpValue: 30000000,
    tags: ["Desain Coupé Gagah", "Pilihan Turbo/Hybrid", "Fitur Canggih"],
    detailUrl: "/mobil/fronx",
    image: "/images/FRONX.jpeg"
  },
  {
    id: 4,
    name: "Suzuki Jimny",
    category: ["passenger"],
    badgeTopLeft: "Legendary 4x4 Offroad",
    badgeTopLeftColor: "bg-red-600",
    segment: "THE AUTHENTIC 4WD ICON",
    price: 522100000,
    formattedPrice: "Rp 522.100.000",
    dpPromo: "DP Mulai Rp 100 Jt-an",
    dpValue: 100000000,
    tags: ["AllGrip Pro 4WD", "Ladder Frame Chassis", "Tersedia 3 & 5 Door"],
    detailUrl: "/mobil/jimny",
    image: "/images/JIMNY.jpeg"
  },
  {
    id: 5,
    name: "Grand Vitara",
    category: ["passenger", "hybrid"],
    badgeTopLeft: "Flagship Hybrid SUV",
    badgeTopLeftColor: "bg-[#06182A]",
    segment: "THE INTELLIGENT PREMIUM SUV",
    price: 434000000,
    formattedPrice: "Rp 434.000.000",
    dpPromo: "DP Mulai Rp 30 Jt-an",
    dpValue: 30000000,
    tags: ["Panoramic Sunroof", "360 View Camera", "Wireless Charger"],
    detailUrl: "/mobil/grand-vitara",
    image: "/images/GRAND VITARA.jpeg"
  },
  {
    id: 6,
    name: "Suzuki S-Presso",
    category: ["passenger"],
    badgeTopLeft: "City Compact SUV",
    badgeTopLeftColor: "bg-[#49607e]",
    segment: "LINCAH & SUPER HEMAT BBM",
    price: 193500000,
    formattedPrice: "Rp 193.500.000",
    dpPromo: "DP Mulai Rp 20 Jt-an",
    dpValue: 20000000,
    tags: ["Irit s/d 21 km/L", "Transmisi AGS/MT", "Dual SRS Airbag"],
    detailUrl: "/mobil/spresso",
    image: "/images/S-PRESSO.jpeg"
  },
  {
    id: 7,
    name: "Suzuki APV",
    category: ["passenger", "commercial"],
    badgeTopLeft: "Serbaguna & Luas",
    badgeTopLeftColor: "bg-[#06182A]",
    segment: "MULTI-PURPOSE MPV & VAN",
    price: 197100000,
    formattedPrice: "Rp 197.100.000",
    dpPromo: "DP Mulai Rp 50 Jt-an",
    dpValue: 50000000,
    tags: ["Kapasitas Lega 8 Kursi", "Tersedia Blind Van", "Mesin G15A Bandel"],
    detailUrl: "/mobil/apv",
    image: "/images/APV.jpeg"
  },
  {
    id: 8,
    name: "Carry Pick Up",
    category: ["commercial"],
    badgeTopLeft: "Rajanya Niaga",
    badgeTopLeftColor: "bg-emerald-600",
    segment: "SOLUSI BISNIS & LOGISTIK",
    price: 198200000,
    formattedPrice: "Rp 198.200.000",
    dpPromo: "DP Mulai Rp 10 Jt-an",
    dpValue: 10000000,
    tags: ["Daya Muat 1 Ton", "Bak Luas Pilihan AC/PS", "Mesin K15B-C Irit"],
    detailUrl: "/mobil/carry",
    image: "/images/CARRY.jpeg"
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
const selectedLeasing = ref("Mandiri Tunas Finance");

const leasingPartners = [
  "Mandiri Tunas Finance",
  "BCA Finance",
  "BRI Finance",
  "Suzuki Finance Indonesia",
  "Indomobil Finance",
  "Adira Finance / Lainnya"
];

const calcDpAmount = computed(() => calcCarPrice.value * (calcDpPercent.value / 100));
const calcLoan = computed(() => calcCarPrice.value - calcDpAmount.value);
const calcMonthly = computed(() => {
  const annualRate = 0.032;
  const totalInterest = calcLoan.value * annualRate * calcTenor.value;
  return (calcLoan.value + totalInterest) / (calcTenor.value * 12);
});

const selectedCarName = computed(() => {
  const match = cars.find(c => c.price === Number(calcCarPrice.value));
  return match ? match.name : "All New Ertiga";
});

const calcWhatsAppUrl = computed(() => {
  const text = `Halo CHAE SUZUKI, saya sudah simulasi kredit di website untuk ${selectedCarName.value} dengan DP ${calcDpPercent.value}% (${formatIDR(calcDpAmount.value)}) tenor ${calcTenor.value} tahun via leasing ${selectedLeasing.value}. Mohon info promo diskon dan persyaratannya.`;
  return `https://wa.me/6285299837635?text=${encodeURIComponent(text)}`;
});

// 4. Data Galeri Testimoni Serah Terima (15 Foto Pilihan)
const testimonials = [
  {
    id: 1,
    image: "/images/Testimoni/WhatsApp Image 2026-09-10 at 16.29.35.jpeg",
    tag: "Unit Serah Terima",
    badge: "Verified Buyer • Makassar",
    title: "Serah Terima Suzuki Fronx",
    quote: "Proses cepat, pelayanan ramah dan unit diantar langsung dengan kondisi prima. Terima kasih Mas CHAE SUZUKI!",
    date: "10 September 2026"
  },
  {
    id: 2,
    image: "/images/Testimoni/WhatsApp Image 2026-09-10 at 16.29.35 (5).jpeg",
    tag: "Unit Serah Terima",
    badge: "Verified Buyer • Makassar",
    title: "Serah Terima Suzuki Fronx",
    quote: "Bantuan berkas kredit sampai ACC sangat profesional dan transparan. Rekomendasi sales resmi terbaik!",
    date: "08 September 2026"
  },
  {
    id: 3,
    image: "/images/Testimoni/WhatsApp Image 2026-09-10 at 16.29.35 (3).jpeg",
    tag: "Serah Terima Showroom",
    badge: "Verified Buyer • Makassar",
    title: "Serah Terima Suzuki Fronx",
    quote: "Unit terbaru langsung siap pakai untuk keluarga. Penjelasan fitur dan kelengkapan berkas sangat detail.",
    date: "05 September 2026"
  },
  {
    id: 4,
    image: "/images/Testimoni/WhatsApp Image 2026-09-10 at 16.29.34.jpeg",
    tag: "Booking Test Drive",
    badge: "Verified Buyer • Makassar",
    title: "Test Drive Suzuki XL7 Alpha Hybrid",
    quote: "Test drive diantar langsung ke rumah, impresi berkendara mantap dan penjelasan fitur sangat ramah.",
    date: "03 September 2026"
  },
  {
    id: 6,
    image: "/images/Testimoni/WhatsApp Image 2026-09-10 at 16.29.35 (2).jpeg",
    tag: "Unit Serah Terima",
    badge: "Verified Buyer • Makassar",
    title: "Serah Terima Suzuki S-Presso",
    quote: "Mobil lincah impian akhirnya tiba. Pelayanan sangat memuaskan dari awal hingga STNK diantar ke rumah.",
    date: "28 Agustus 2026"
  },
  {
    id: 7,
    image: "/images/Testimoni/WhatsApp Image 2026-09-10 at 16.29.35 (4).jpeg",
    tag: "Unit Serah Terima",
    badge: "Verified Buyer • Makassar",
    title: "Serah Terima Suzuki Fronx",
    quote: "Didukung bengkel 3S resmi Latimojong dengan pelayanan terpercaya dan mekanik profesional.",
    date: "25 Agustus 2026"
  },
  {
    id: 8,
    image: "/images/Testimoni/WhatsApp Image 2026-09-10 at 16.29.35 (6).jpeg",
    tag: "Unit Serah Terima",
    badge: "Verified Buyer • Makassar",
    title: "Serah Terima Suzuki Jimny 4x4",
    quote: "Unit legendaris 4x4 idaman akhirnya sampai di garasi. Bonus aksesoris lengkap dan proses tanpa ribet.",
    date: "20 Agustus 2026"
  },
  {
    id: 9,
    image: "/images/Testimoni/WhatsApp Image 2026-09-10 at 16.29.35 (8).jpeg",
    tag: "Booking Test Drive",
    badge: "Verified Buyer • Makassar",
    title: "Test Drive Suzuki Fronx",
    quote: "Uji performa kenyamanan berkendara di jalanan kota Makassar sebelum memutuskan ambil unit baru.",
    date: "17 Agustus 2026"
  },
  {
    id: 10,
    image: "/images/Testimoni/WhatsApp Image 2026-09-10 at 16.29.35 (9).jpeg",
    tag: "Booking Test Drive",
    badge: "Verified Buyer • Makassar",
    title: "Test Drive Suzuki Fronx Crossover",
    quote: "Konsultasi produk sangat jelas dan ramah saat sesi test drive unit di showroom resmi Makassar.",
    date: "15 Agustus 2026"
  },
  {
    id: 11,
    image: "/images/Testimoni/WhatsApp Image 2026-09-10 at 16.29.35 (10).jpeg",
    tag: "Unit Serah Terima",
    badge: "Verified Buyer • Makassar",
    title: "Serah Terima Suzuki Fronx",
    quote: "Desain gagah dan elegan, sangat pas dipakai harian. Sukses selalu untuk Suzuki Megahputra.",
    date: "14 Agustus 2026"
  },
  {
    id: 12,
    image: "/images/Testimoni/WhatsApp Image 2026-09-10 at 16.29.35 (11).jpeg",
    tag: "Serah Terima Showroom",
    badge: "Verified Buyer • Makassar",
    title: "Pengantaran Unit Suzuki Fronx Kembar",
    quote: "Pengiriman dua unit armada mobil Suzuki bersamaan berjalan aman, cepat, dan profesional.",
    date: "10 Agustus 2026"
  },
  {
    id: 13,
    image: "/images/Testimoni/WhatsApp Image 2026-09-10 at 16.29.35 (12).jpeg",
    tag: "Serah Terima Showroom",
    badge: "Verified Buyer • Makassar",
    title: "Serah Terima Suzuki Fronx",
    quote: "Kesiapan unit cepat dan kelengkapan dokumen serah terima diproses rapi oleh Mas CHAE SUZUKI.",
    date: "08 Agustus 2026"
  },
  {
    id: 14,
    image: "/images/Testimoni/WhatsApp Image 2026-09-10 at 16.29.35 (16).jpeg",
    tag: "Unit Niaga Usaha",
    badge: "Verified Buyer • Makassar",
    title: "Serah Terima New Carry Pick Up Box",
    quote: "Mobil usaha angkut barang dengan bak tertutup langsung siap operasi untuk kelancaran bisnis logistik.",
    date: "07 Agustus 2026"
  },
  {
    id: 15,
    image: "/images/Testimoni/WhatsApp Image 2026-09-10 at 16.29.35 (17).jpeg",
    tag: "Unit Serah Terima",
    badge: "Verified Buyer • Makassar",
    title: "Serah Terima Suzuki Fronx",
    quote: "Mobil baru diantar langsung setelah pengecekan spooring & balancing standar resmi pabrikan.",
    date: "06 Agustus 2026"
  },
  {
    id: 16,
    image: "/images/Testimoni/WhatsApp Image 2026-09-10 at 16.29.35 (18).jpeg",
    tag: "Unit Serah Terima",
    badge: "Verified Buyer • Makassar",
    title: "Serah Terima Suzuki XL7 ke Rumah Konsumen",
    quote: "Layanan purna jual terbaik, berkas dibantu sampai selesai dan mobil diantar langsung ke depan rumah.",
    date: "04 Agustus 2026"
  }
];

const showAllGallery = ref(false);
const displayedTestimonials = computed(() => {
  return showAllGallery.value ? testimonials : testimonials.slice(0, 3);
});

const toggleGallery = () => {
  showAllGallery.value = !showAllGallery.value;
};
</script>

<template>
  <div class="min-h-screen bg-[#f9f9ff] text-[#111c2d] antialiased">
    <!-- TOP NOTIFICATION STRIP -->
    <div class="bg-[#06182A] text-white hidden lg:block border-b border-slate-800">
      <div class="max-w-7xl mx-auto px-6 h-10 flex items-center justify-between text-xs font-medium">
        <div class="flex items-center gap-6">
          <a href="https://wa.me/6285299837635" target="_blank" class="flex items-center gap-1.5 text-slate-300 hover:text-white transition-colors">
            <span class="material-symbols-outlined text-[16px]">chat</span> +62 852-9983-7635
          </a>
          <a href="mailto:Chaeimm87@gmail.com" class="flex items-center gap-1.5 text-slate-300 hover:text-white transition-colors">
            <span class="material-symbols-outlined text-[16px]">mail</span> Chaeimm87@gmail.com
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
      <!-- 1. HERO SLIDER BANNER (3 Slide) -->
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
                  <a :href="`https://wa.me/6285299837635?text=${encodeURIComponent(slide.waParam)}`" target="_blank" class="h-12 px-6 bg-red-600 hover:bg-red-700 text-white font-bold text-sm rounded-xl shadow-lg flex items-center gap-2 transition-all">
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
                        :class="['h-2.5 transition-all rounded-full cursor-pointer', currentSlide === idx ? 'w-10 bg-red-600' : 'w-3 bg-white/40']"></button>
              </div>
              <div class="flex items-center gap-2">
                <div class="bg-[#06182A]/80 backdrop-blur-md px-3 py-1.5 rounded-full text-xs font-mono text-slate-300">
                  <strong class="text-white">0{{ currentSlide + 1 }}</strong> / 0{{ heroSlides.length }}
                </div>
                <button @click="prevSlide" class="w-9 h-9 rounded-full bg-white/20 hover:bg-white text-white hover:text-slate-900 transition-all flex items-center justify-center cursor-pointer">
                  <span class="material-symbols-outlined text-[20px]">chevron_left</span>
                </button>
                <button @click="nextSlide" class="w-9 h-9 rounded-full bg-white/20 hover:bg-white text-white hover:text-slate-900 transition-all flex items-center justify-center cursor-pointer">
                  <span class="material-symbols-outlined text-[20px]">chevron_right</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- 2. QUICK ACTION STRIP (3 Kolom Simetris) -->
      <section class="relative z-30 -mt-12 max-w-7xl mx-auto px-4 sm:px-6 w-full">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <a href="https://wa.me/6285299837635?text=Halo%20CHAE%20SUZUKI,%20saya%20mau%20booking%20test%20drive" target="_blank" class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all border border-slate-200 flex flex-col justify-between">
            <div class="space-y-3">
              <div class="w-11 h-11 rounded-lg bg-red-50 flex items-center justify-center text-red-600 group-hover:bg-red-600 group-hover:text-white transition-colors">
                <span class="material-symbols-outlined text-[24px]">airline_seat_recline_extra</span>
              </div>
              <h3 class="font-bold text-slate-900 text-base group-hover:text-red-600 transition-colors">Booking Test Drive</h3>
              <p class="text-xs text-slate-500 leading-relaxed">Jadwal fleksibel. Mobil diantar langsung ke alamat rumah atau kantor Anda di Makassar.</p>
            </div>
            <div class="pt-5 flex items-center gap-1.5 text-xs font-bold text-red-600">
              <span>Reservasi Sekarang</span>
              <span class="material-symbols-outlined text-[15px]">arrow_forward</span>
            </div>
          </a>

          <a href="#kredit-calculator" class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all border border-slate-200 flex flex-col justify-between">
            <div class="space-y-3">
              <div class="w-11 h-11 rounded-lg bg-slate-100 flex items-center justify-center text-slate-900 group-hover:bg-slate-900 group-hover:text-white transition-colors">
                <span class="material-symbols-outlined text-[24px]">calculate</span>
              </div>
              <h3 class="font-bold text-slate-900 text-base group-hover:text-red-600 transition-colors">Simulasi Kredit Instan</h3>
              <p class="text-xs text-slate-500 leading-relaxed">Hitung skema cicilan DP ringan bersama mitra leasing terkemuka: BCA, Mandiri, BRI, dll.</p>
            </div>
            <div class="pt-5 flex items-center gap-1.5 text-xs font-bold text-slate-900">
              <span>Hitung Angsuran</span>
              <span class="material-symbols-outlined text-[15px]">arrow_forward</span>
            </div>
          </a>

          <a href="https://wa.me/6285299837635?text=Halo%20CHAE%20SUZUKI,%20saya%20mau%20konsultasi%20tukar%20tambah%20mobil%20bekas" target="_blank" class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all border border-slate-200 flex flex-col justify-between">
            <div class="space-y-3">
              <div class="w-11 h-11 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                <span class="material-symbols-outlined text-[24px]">sync_alt</span>
              </div>
              <h3 class="font-bold text-slate-900 text-base group-hover:text-red-600 transition-colors">Tukar Tambah (Trade-In)</h3>
              <p class="text-xs text-slate-500 leading-relaxed">Tukar mobil lama segala merk dengan unit Suzuki baru. Taksiran harga appraisal tertinggi.</p>
            </div>
            <div class="pt-5 flex items-center gap-1.5 text-xs font-bold text-emerald-600">
              <span>Konsultasi Trade-In</span>
              <span class="material-symbols-outlined text-[15px]">arrow_forward</span>
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
                Daftar Harga Suzuki Terbaru OTR Makassar
              </h2>
              <p class="text-sm text-slate-500">Pilihan unit ready stock dengan penawaran bunga kompetitif, DP minim promo terbaru, dan proses leasing cepat.</p>
            </div>

            <!-- Filter Tabs -->
            <div class="flex items-center gap-1 bg-slate-100 p-1 rounded-xl self-start md:self-auto">
              <button @click="selectedCategory = 'all'" :class="['px-4 py-2 text-xs font-bold rounded-lg transition-all cursor-pointer', selectedCategory === 'all' ? 'bg-white text-slate-900 shadow-sm' : 'text-slate-600 hover:text-slate-900']">Semua Model</button>
              <button @click="selectedCategory = 'passenger'" :class="['px-4 py-2 text-xs font-bold rounded-lg transition-all cursor-pointer', selectedCategory === 'passenger' ? 'bg-white text-slate-900 shadow-sm' : 'text-slate-600 hover:text-slate-900']">Passenger Car</button>
              <button @click="selectedCategory = 'commercial'" :class="['px-4 py-2 text-xs font-bold rounded-lg transition-all cursor-pointer', selectedCategory === 'commercial' ? 'bg-white text-slate-900 shadow-sm' : 'text-slate-600 hover:text-slate-900']">Commercial Niaga</button>
              <button @click="selectedCategory = 'hybrid'" :class="['px-4 py-2 text-xs font-bold rounded-lg transition-all cursor-pointer', selectedCategory === 'hybrid' ? 'bg-white text-slate-900 shadow-sm' : 'text-slate-600 hover:text-slate-900']">Smart Hybrid</button>
            </div>
          </div>

          <!-- Car Grid (8 Unit Mobil) -->
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
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
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">{{ car.name }}</h3>
                  </div>

                  <!-- AREA HARGA + BADGE DP PROMO TERBARU (Hanya Nominal DP) -->
                  <div>
                    <span class="text-xs text-slate-400">Harga OTR Makassar mulai:</span>
                    <p class="text-xl font-extrabold text-red-600 leading-none mt-0.5">{{ car.formattedPrice }}</p>
                    
                    <!-- BADGE DP PROMO RINGAN -->
                    <div class="mt-2.5 flex items-center gap-2 bg-emerald-50 border border-emerald-200 text-emerald-800 px-3 py-1.5 rounded-lg">
                      <span class="material-symbols-outlined text-[18px] text-emerald-600 shrink-0">payments</span>
                      <span class="text-xs font-extrabold">{{ car.dpPromo }}</span>
                    </div>
                  </div>

                  <!-- Tags Spesifikasi -->
                  <div class="flex flex-wrap gap-1.5 pt-1">
                    <span v-for="(tag, i) in car.tags" :key="i" class="text-[10px] font-semibold bg-slate-100 text-slate-600 px-2 py-0.5 rounded">
                      {{ tag }}
                    </span>
                  </div>
                </div>
              </div>

              <!-- Tombol Detail Mobil & Chat Sales -->
              <div class="p-5 pt-0 grid grid-cols-2 gap-2">
                <Link :href="car.detailUrl"
                      class="h-10 bg-[#06182A] hover:bg-slate-800 text-white text-xs font-bold rounded-lg flex items-center justify-center transition-colors">
                  Detail Mobil
                </Link>

                <a :href="`https://wa.me/6285299837635?text=Halo%20CHAE%20SUZUKI,%20saya%20mau%20tanya%20paket%20${encodeURIComponent(car.dpPromo)}%20untuk%20${encodeURIComponent(car.name)}`" target="_blank"
                   class="h-10 bg-red-600 hover:bg-red-700 text-white text-xs font-bold rounded-lg flex items-center justify-center gap-1 transition-colors shadow-sm">
                  <span class="material-symbols-outlined text-[15px]">chat</span>
                  <span>Hubungi Sales</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- 4. INTERACTIVE CREDIT SIMULATOR DENGAN PILIHAN LEASING -->
      <section class="w-full py-16 bg-slate-50 border-y border-slate-200" id="kredit-calculator">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
          <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-200 grid grid-cols-1 lg:grid-cols-12">
            <!-- Left Controls -->
            <div class="lg:col-span-7 p-6 lg:p-10 space-y-6">
              <div>
                <span class="text-xs font-bold text-red-600 uppercase tracking-wider">Transparansi Pembiayaan</span>
                <h2 class="text-2xl lg:text-3xl font-extrabold text-slate-900 mt-1">Simulasi Kredit Instan Suzuki</h2>
                <p class="text-sm text-slate-500">Sesuaikan uang muka (DP), jangka waktu angsuran, dan pilihan mitra finance terpercaya.</p>
              </div>

              <div class="space-y-4">
                <div>
                  <label class="block text-sm font-semibold text-slate-800 mb-1.5">Pilih Model Kendaraan</label>
                  <select v-model.number="calcCarPrice" class="w-full h-12 px-4 rounded-xl bg-slate-100 border border-slate-200 text-sm font-semibold text-slate-800 outline-none focus:bg-white focus:ring-2 focus:ring-[#06182A]">
                    <option v-for="car in cars" :key="car.id" :value="car.price">
                      {{ car.name }} - {{ car.formattedPrice }} ({{ car.dpPromo }})
                    </option>
                  </select>
                </div>

                <!-- PILIHAN METODE PEMBAYARAN CICILAN / LEASING -->
                <div>
                  <label class="block text-sm font-semibold text-slate-800 mb-1.5">
                    Pilihan Metode Pembayaran / Leasing Rekanan
                  </label>
                  <select v-model="selectedLeasing" class="w-full h-12 px-4 rounded-xl bg-slate-100 border border-slate-200 text-sm font-semibold text-slate-800 outline-none focus:bg-white focus:ring-2 focus:ring-[#06182A]">
                    <option v-for="(lease, idx) in leasingPartners" :key="idx" :value="lease">
                      {{ lease }}
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
                            :class="['py-2.5 rounded-lg text-sm font-bold transition-all cursor-pointer', calcTenor === yr ? 'bg-red-600 text-white shadow-md' : 'bg-slate-100 hover:bg-slate-200 text-slate-700']">
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
                  <p class="text-[11px] text-slate-300">*Perhitungan estimasi sudah include asuransi & administrasi resmi.</p>
                </div>

                <div class="space-y-2 text-sm text-slate-300 border-t border-slate-700 pt-4">
                  <div class="flex justify-between"><span>Harga Mobil (OTR):</span><strong class="text-white">{{ formatIDR(calcCarPrice) }}</strong></div>
                  <div class="flex justify-between"><span>Total Uang Muka (DP):</span><strong class="text-white">{{ formatIDR(calcDpAmount) }}</strong></div>
                  <div class="flex justify-between"><span>Tenor Dipilih:</span><strong class="text-white">{{ calcTenor * 12 }} Bulan ({{ calcTenor }} Tahun)</strong></div>
                  <div class="flex justify-between items-center">
                    <span>Mitra Pembiayaan:</span>
                    <span class="bg-emerald-500/20 text-emerald-300 text-xs font-bold px-2 py-0.5 rounded">{{ selectedLeasing }}</span>
                  </div>
                </div>

                <!-- Strip Daftar Seluruh Leasing -->
                <div class="pt-2 border-t border-slate-800">
                  <span class="text-[10px] text-slate-400 uppercase tracking-wider block mb-1.5 font-bold">Leasing Terdaftar Resmi:</span>
                  <div class="flex flex-wrap gap-1 text-[10px]">
                    <span class="bg-slate-800 text-slate-300 px-2 py-0.5 rounded">Mandiri Tunas Finance</span>
                    <span class="bg-slate-800 text-slate-300 px-2 py-0.5 rounded">BCA Finance</span>
                    <span class="bg-slate-800 text-slate-300 px-2 py-0.5 rounded">BRI Finance</span>
                    <span class="bg-slate-800 text-slate-300 px-2 py-0.5 rounded">Suzuki Finance</span>
                    <span class="bg-slate-800 text-slate-300 px-2 py-0.5 rounded">Indomobil Finance</span>
                  </div>
                </div>
              </div>

              <div class="pt-6 space-y-2">
                <a :href="calcWhatsAppUrl" target="_blank" class="w-full h-12 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl flex items-center justify-center gap-2 shadow-lg transition-all">
                  <span class="material-symbols-outlined text-[20px]">chat</span>
                  <span>Ajukan Kredit ke WhatsApp Sales</span>
                </a>
                <p class="text-center text-[10px] text-slate-400">Data persyaratan dibantu hingga 100% Approval oleh CHAE SUZUKI.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- 5. DEALER ADVANTAGES DENGAN DETAIL LEASING PARTNER -->
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

            <!-- LEASING & PEMBIAYAAN REKANAN -->
            <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm space-y-3">
              <div class="w-12 h-12 rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-600">
                <span class="material-symbols-outlined text-[28px]">account_balance</span>
              </div>
              <h3 class="font-bold text-slate-900 text-lg">Mitra Finance Terlengkap</h3>
              <p class="text-xs text-slate-500 leading-relaxed">
                Didukung pembiayaan terkemuka: <strong>Mandiri Tunas Finance, BCA Finance, BRI Finance, Suzuki Finance Indonesia, Indomobil Finance</strong>, dll. Bunga ringan mulai 2.9%.
              </p>
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

      <!-- 6. DELIVERY GALLERY (15 Foto, Judul & Tipe Mobil Sesuai Real Unit) -->
      <section class="w-full py-16 bg-slate-50 border-t border-slate-200" id="galery-section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 space-y-8">
          <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
              <span class="text-xs font-bold uppercase tracking-wider text-emerald-600">Kepercayaan Pelanggan</span>
              <h2 class="text-2xl lg:text-3xl font-extrabold text-slate-900 mt-1">Bukti Kepuasan Pelanggan Suzuki Megah Makassar</h2>
              <p class="text-sm text-slate-500">Momen penyerahan unit mobil impian bersama Sales Executive CHAE SUZUKI kepada konsumen setia kami.</p>
            </div>
            <!-- Tombol Toggle Galeri -->
            <button type="button" @click="toggleGallery" class="text-sm font-bold text-red-600 hover:text-red-700 flex items-center gap-1 cursor-pointer transition-colors self-start md:self-auto">
              <span>{{ showAllGallery ? 'Tampilkan Lebih Sedikit' : 'Lihat Seluruh Galery Serah Terima' }}</span>
              <span class="material-symbols-outlined text-[18px] transition-transform duration-300" :class="{ 'rotate-180': showAllGallery }">
                {{ showAllGallery ? 'expand_less' : 'arrow_forward' }}
              </span>
            </button>
          </div>

          <!-- Grid Testimoni -->
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 transition-all duration-500">
            <div v-for="item in displayedTestimonials" :key="item.id"
                 class="bg-white rounded-xl overflow-hidden border border-slate-200 shadow-sm flex flex-col justify-between hover:shadow-lg transition-all duration-300">
              <div>
                <div class="relative aspect-[4/3] bg-slate-100 overflow-hidden">
                  <img :src="item.image" :alt="item.title" class="w-full h-full object-cover object-center hover:scale-105 transition-transform duration-300" />
                  <span class="absolute top-3 left-3 bg-[#06182A]/90 text-white text-[10px] font-bold px-2.5 py-1 rounded shadow-sm">
                    {{ item.tag }}
                  </span>
                </div>
                <div class="p-5 space-y-2">
                  <div class="flex items-center gap-1 text-emerald-600 text-xs font-bold">
                    <span class="material-symbols-outlined text-[16px]">verified</span> {{ item.badge }}
                  </div>
                  <h3 class="font-bold text-slate-900 text-base leading-snug">{{ item.title }}</h3>
                  <p class="text-xs text-slate-500 leading-relaxed italic">"{{ item.quote }}"</p>
                </div>
              </div>
              <div class="p-5 pt-0 text-[11px] font-semibold text-slate-400">
                Tanggal Serah Terima: {{ item.date }}
              </div>
            </div>
          </div>

          <!-- Tombol Bawah jika galeri belum dibuka -->
          <div v-if="!showAllGallery" class="text-center pt-2">
            <button type="button" @click="toggleGallery" class="px-6 py-2.5 bg-white hover:bg-slate-100 text-slate-800 text-xs font-bold rounded-xl border border-slate-300 shadow-sm transition-all inline-flex items-center gap-2 cursor-pointer">
              <span>Buka Seluruh Galery Serah Terima ({{ testimonials.length }} Foto)</span>
              <span class="material-symbols-outlined text-[16px]">expand_more</span>
            </button>
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
                  Hubungi langsung <strong class="text-white">CHAE SUZUKI</strong> (Sales Executive Suzuki Megah Makassar). Konsultasi 100% gratis, siap melayani penawaran harga terbaik, simulasi kredit menyesuaikan budget via leasing pilihan Anda, tukar tambah, hingga test drive ke rumah.
                </p>
                <div class="pt-2 flex flex-wrap items-center gap-4">
                  <a href="https://wa.me/6285299837635?text=Halo%20CHAE%20SUZUKI,%20saya%20mau%20konsultasi%20promo%20Suzuki%20Makassar" target="_blank" class="h-12 px-6 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm rounded-xl shadow-lg flex items-center gap-2 transition-all">
                    <span class="material-symbols-outlined text-[20px]">chat</span>
                    <span>Chat WhatsApp (0852-9983-7635)</span>
                  </a>
                </div>
              </div>

              <div class="lg:col-span-4 flex justify-center lg:justify-end">
                <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl border border-slate-700 text-center space-y-3 max-w-xs w-full">
                  <div class="relative w-24 h-24 mx-auto">
                    <img src="/images/chae.jpeg" class="w-full h-full rounded-full object-cover object-top border-2 border-red-600 shadow-md" alt="CHAE SUZUKI" />
                  </div>
                  <div>
                    <h3 class="font-bold text-white text-lg">CHAE SUZUKI</h3>
                    <p class="text-xs text-red-400 font-bold uppercase tracking-wider">Sales Executive</p>
                    <p class="text-xs text-slate-400">PT Megahputra Sejahtera (3S)</p>
                  </div>
                  <p class="text-[11px] text-slate-300 italic">"Komitmen melayani Bapak/Ibu dengan ramah, cepat, jujur, dan transparan di seluruh Sulawesi Selatan."</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- FLOATING QUICK BOTTOM BAR -->
    <aside class="fixed bottom-6 left-1/2 -translate-x-1/2 z-40 w-[90%] max-w-md">
      <div class="bg-white/90 backdrop-blur-xl border border-slate-200 shadow-2xl rounded-full p-1.5 flex items-center justify-between gap-2">
        <a href="https://wa.me/6285299837635" target="_blank" class="flex-[1.5] h-11 bg-emerald-600 hover:bg-emerald-700 text-white rounded-full text-xs font-bold flex items-center justify-center gap-2 shadow-sm transition-all">
          <span class="relative flex h-2 w-2">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-80"></span>
            <span class="relative inline-flex rounded-full h-2 w-2 bg-white"></span>
          </span>
          <span class="material-symbols-outlined text-[18px]">forum</span>
          <span>Chat WhatsApp</span>
        </a>
        <a href="#kredit-calculator" class="flex-1 h-11 bg-slate-100 hover:bg-slate-200 text-slate-900 border border-slate-300 rounded-full text-xs font-bold flex items-center justify-center gap-1.5 transition-all">
          <span class="material-symbols-outlined text-[18px]">calculate</span>
          <span>Simulasi</span>
        </a>
        <button @click="window.scrollTo({top: 0, behavior: 'smooth'})" class="w-11 h-11 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-600 flex items-center justify-center transition-colors shrink-0 cursor-pointer">
          <span class="material-symbols-outlined text-[20px]">arrow_upward</span>
        </button>
      </div>
    </aside>

    <!-- FOOTER -->
    <footer class="w-full bg-[#06182A] text-white pt-16 pb-20 border-t border-slate-800">
      <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 pb-12 border-b border-slate-800">
          <div class="space-y-4">
            <div class="flex items-center gap-3">
              <div class="bg-white p-1 rounded-lg flex items-center justify-center">
                <img src="/images/suzuki-logo.png" class="h-8 w-auto object-contain" alt="Suzuki Logo" />
              </div>
              <span class="font-bold text-lg uppercase tracking-tight text-white">Megahputra Sejahtera Makassar</span>
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
              <span>Jl. Gunung Latimojong No. 96, Lajangiru, Kec. Ujung Pandang, Kota Makassar, Sulawesi Selatan 90141</span>
            </p>
            <p class="text-xs text-slate-400 flex items-center gap-2">
              <span class="material-symbols-outlined text-[18px] text-red-500 shrink-0">schedule</span>
              <span>Senin - Sabtu: 08:30 - 17:00 WITA<br/>Minggu / Libur: Siaga Booking</span>
            </p>
          </div>

          <div class="space-y-3">
            <h4 class="font-bold text-sm text-white">Mitra Pembiayaan Resmi</h4>
            <ul class="space-y-1.5 text-xs text-slate-400">
              <li>• Mandiri Tunas Finance (MTF)</li>
              <li>• BCA Finance</li>
              <li>• BRI Finance</li>
              <li>• Suzuki Finance Indonesia (SFI)</li>
              <li>• Indomobil Finance (IMFI)</li>
              <li>• Adira Finance & BSI Oto</li>
            </ul>
          </div>

          <div class="space-y-3">
            <h4 class="font-bold text-sm text-white">Kontak Konsultan Resmi</h4>
            <div class="bg-slate-800/80 p-4 rounded-xl border border-slate-700 space-y-1">
              <div class="flex items-center gap-1 text-emerald-400 text-xs font-bold">
                <span class="material-symbols-outlined text-[16px]">verified</span> CHAE SUZUKI
              </div>
              <p class="text-xs text-slate-300">Sales Executive Suzuki Megah Putra</p>
              <a href="https://wa.me/6285299837635" target="_blank" class="text-xs font-bold text-emerald-400 hover:text-emerald-300 flex items-center gap-1 pt-1">
                <span class="material-symbols-outlined text-[14px]">chat</span> Chat Personal WhatsApp
              </a>
            </div>
            <div class="text-xs text-slate-400">
              <span class="block font-semibold text-white">Customer Care WhatsApp:</span>
              0852-9983-7635
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