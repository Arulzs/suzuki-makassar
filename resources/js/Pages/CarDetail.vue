<script setup>
import { ref, computed, watch } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import Navbar from '../Components/Navbar.vue';

const props = defineProps({
  carSlug: {
    type: String,
    default: ''
  }
});

const page = usePage();

// Database Detail Seluruh Mobil Lengkap dengan Pilihan Warna Spesifik Masing-Masing
const carsDatabase = {
  'ertiga': {
    name: "Suzuki All New Ertiga",
    segment: "LMPV 7-SEATER UNGGULAN",
    headline: "Kenyamanan Cerdas Keluarga Modern",
    description: "MPV 7-seater keluarga berteknologi Smart Hybrid Vehicle by Suzuki (SHVS) yang ramah lingkungan, kabin lega, senyap, serta efisien bahan bakar hingga 21 km/liter.",
    image: "/images/ERTIGA.jpeg",
    brochurePdf: "/E-BROSUR MOBIL/ALL NEW ERTIGA.pdf",
    engine: "1.462 cc K15B",
    consumption: "21.0 KM/L",
    capacity: "7 Penumpang",
    transmission: "AT / 5-MT",
    batteryWarranty: "Garansi Baterai 8 Tahun",
    colors: [
      { name: "Ertiga Cool Black", hex: "#161616" },
      { name: "Ertiga Pearl Snow White", hex: "#FFFFFF" },
      { name: "Ertiga Metallic Magma Grey", hex: "#525458" },
      { name: "Ertiga Metallic Silky Silver", hex: "#D2D4D7" },
      { name: "Ertiga Pearl Burgundy Red", hex: "#5E1825" },
      { name: "Ertiga Brave Khaki", hex: "#635D50" },
      { name: "Ertiga Pearl Radiant Red", hex: "#8F1522" }
    ],
    variants: [
      { id: "ga", name: "Ertiga GA", transmission: "MANUAL (5-MT)", statusTag: "Ready Stock", price: 269700000, formattedPrice: "Rp 269.700.000", dpStart: "DP Mulai Rp 20 Jt-an", isFlagship: false, specs: ["Mesin 1.5L K15B Bertenaga", "AC Double Blower Digital", "Dual SRS Airbag & ABS", "Tilt Steering & Power Window"] },
      { id: "gl-mt", name: "Ertiga GL MT", transmission: "MANUAL (5-MT)", statusTag: "Paling Diminati", price: 289400000, formattedPrice: "Rp 289.400.000", dpStart: "DP Mulai Rp 22 Jt-an", isFlagship: false, specs: ["Velg Alloy Two-Tone 15 Inch", "Head Unit Touchscreen Bluetooth", "Rear Parking Sensor & Kamera", "Audio Switch Steering Control"] },
      { id: "gl-at", name: "Ertiga GL AT", transmission: "AUTOMATIC (AT)", statusTag: "Smart Hybrid", price: 301000000, formattedPrice: "Rp 301.000.000", dpStart: "DP Mulai Rp 24 Jt-an", isFlagship: true, specs: ["Teknologi SHVS Hybrid", "Hill Hold Control (HHC)", "Electronic Stability Programme (ESP)", "Suspensi Nyaman MacPherson"] }
    ]
  },
  'xl7': {
    name: "Suzuki XL7",
    segment: "EXTRA COMFORT SUV",
    headline: "SUV Tangguh untuk Eksplorasi Keluarga",
    description: "SUV 7-seater dengan ground clearance tinggi 200 mm, tampilan sporty maskulin, serta dilengkapi fitur modern E-Mirror Touchscreen dan teknologi Smart Hybrid.",
    image: "/images/XL7.jpeg",
    brochurePdf: "/E-BROSUR MOBIL/BROSUR XL7.pdf",
    engine: "1.462 cc K15B",
    consumption: "19.5 KM/L",
    capacity: "7 Penumpang",
    transmission: "AT / 5-MT",
    batteryWarranty: "Garansi Baterai 8 Tahun",
    colors: [
      { name: "XL7 Pearl Snow White - Black", hex: "#EAEAEA" },
      { name: "XL7 Marble Black", hex: "#1C1D21" },
      { name: "XL7 Savanna Ivory - Black", hex: "#C7BAA7" },
      { name: "XL7 Ice Grayish Blue - Black", hex: "#6D8292" }
    ],
    variants: [
      { id: "zeta-mt", name: "XL7 Zeta MT", transmission: "MANUAL (5-MT)", statusTag: "Ready Stock", price: 305300000, formattedPrice: "Rp 305.300.000", dpStart: "DP Mulai Rp 25 Jt-an", isFlagship: false, specs: ["Ground Clearance 200mm", "LED Headlamp with DRL", "Roof Rail Fungsional", "Velg Alloy 16 Inch"] },
      { id: "zeta-at", name: "XL7 Zeta AT", transmission: "AUTOMATIC (AT)", statusTag: "Ready Stock", price: 315300000, formattedPrice: "Rp 315.300.000", dpStart: "DP Mulai Rp 27 Jt-an", isFlagship: false, specs: ["Transmisi Otomatis Halus", "Electronic Stability Programme", "Rear Parking Camera", "AC Digital Auto Climate"] },
      { id: "beta-mt", name: "XL7 Beta MT (Hybrid)", transmission: "MANUAL (5-MT)", statusTag: "Smart Hybrid", price: 331400000, formattedPrice: "Rp 331.400.000", dpStart: "DP Mulai Rp 29 Jt-an", isFlagship: false, specs: ["Smart Hybrid SHVS", "Cruise Control", "Engine Push Start/Stop", "Audio Switch Steering"] },
      { id: "beta-at", name: "XL7 Beta AT (Hybrid)", transmission: "AUTOMATIC (AT)", statusTag: "Smart Hybrid", price: 342300000, formattedPrice: "Rp 342.300.000", dpStart: "DP Mulai Rp 31 Jt-an", isFlagship: false, specs: ["Transmisi AT + Hybrid SHVS", "Hill Hold Control", "Auto Light with Guide Me", "Ventilated Cup Holder"] },
      { id: "alpha-at", name: "XL7 Alpha AT (Hybrid)", transmission: "AUTOMATIC (AT)", statusTag: "Top Flagship", price: 353400000, formattedPrice: "Rp 353.400.000", dpStart: "DP Mulai Rp 33 Jt-an", isFlagship: true, specs: ["Smart E-Mirror Touchscreen", "Dual Tone Body Color", "Rear Upper Spoiler Sporty", "Emblem Alpha & Chrome Door Sill Guard"] }
    ]
  },
  'fronx': {
    name: "Suzuki Fronx",
    segment: "DYNAMIC COMPACT CROSSOVER",
    headline: "Crossover Bergaya Coupe yang Sporty & Modern",
    description: "Inovasi crossover terbaru dengan desain aerodinamis modern, ground clearance pas perkotaan, kabin futuristik, dan performa lincah yang sangat efisien.",
    image: "/images/FRONX.jpeg",
    brochurePdf: "/E-BROSUR MOBIL/FRONX.pdf",
    engine: "1.462 cc / Turbo",
    consumption: "20.5 KM/L",
    capacity: "5 Penumpang",
    transmission: "AT / MT",
    batteryWarranty: "Garansi Baterai 8 Tahun",
    colors: [
      { name: "Fronx Metallic Magma Gray", hex: "#4C4E52" },
      { name: "Fronx Savanna Ivory", hex: "#D6CABA" },
      { name: "Fronx Pearl Snow White", hex: "#FFFFFF" },
      { name: "Fronx Savanna Ivory - Black", hex: "#BAAC99" },
      { name: "Fronx Pearl Snow White - Black", hex: "#EBEBEB" },
      { name: "Fronx Ice Grayish Blue - Black", hex: "#5C7384" },
      { name: "Fronx Cool Black with Black Grille", hex: "#111111" }
    ],
    variants: [
      { id: "gl-mt", name: "Fronx GL MT", transmission: "MANUAL (5-MT)", statusTag: "Ready Unit", price: 279500000, formattedPrice: "Rp 279.500.000", dpStart: "DP Mulai Rp 30 Jt-an", isFlagship: false, specs: ["Desain Coupé Sporty", "Headlamp LED Projector", "Wireless Phone Connectivity", "Electronic Stability Program"] },
      { id: "gl-at", name: "Fronx GL AT", transmission: "AUTOMATIC (AT)", statusTag: "Ready Unit", price: 290500000, formattedPrice: "Rp 290.500.000", dpStart: "DP Mulai Rp 31 Jt-an", isFlagship: false, specs: ["Transmisi Otomatis Halus", "Hill Hold Assist", "Rear AC Vents", "Cruise Control"] },
      { id: "gx-mt", name: "Fronx GX MT (Hybrid)", transmission: "MANUAL (5-MT)", statusTag: "Smart Hybrid", price: 301900000, formattedPrice: "Rp 301.900.000", dpStart: "DP Mulai Rp 33 Jt-an", isFlagship: false, specs: ["Smart Hybrid SHVS Engine", "Head-Up Display Modern", "360 Surround View Camera", "Paddle Shift"] },
      { id: "gx-at", name: "Fronx GX AT (Hybrid)", transmission: "AUTOMATIC (AT)", statusTag: "Smart Hybrid", price: 320200000, formattedPrice: "Rp 320.200.000", dpStart: "DP Mulai Rp 35 Jt-an", isFlagship: false, specs: ["9-inch Touchscreen HD", "Wireless Smartphone Charger", "6 Airbags Protection", "Fast Dual Tone Alloy Wheel"] },
      { id: "sgx-kuro", name: "Fronx SGX Kuro", transmission: "AUTOMATIC (AT)", statusTag: "Top Flagship", price: 348800000, formattedPrice: "Rp 348.800.000", dpStart: "DP Mulai Rp 37 Jt-an", isFlagship: true, specs: ["Edisi Spesial KURO Dark Styling", "Full Aero Bodykit", "Premium Two-Tone Interior", "Advanced Telematics Suzuki Connect"] }
    ]
  },
  'jimny': {
    name: "Suzuki Jimny",
    segment: "THE AUTHENTIC 4WD ICON",
    headline: "Legenda Off-Road Tangguh Tanpa Batas",
    description: "Ikon petualang sejati dengan sistem penggerak AllGrip Pro 4WD legendaris, Ladder Frame Chassis kokoh, rigid axle suspension, dan desain retro-modern yang berkarakter kuat.",
    image: "/images/JIMNY.jpeg",
    brochurePdf: "/E-BROSUR MOBIL/JIMNY.pdf",
    engine: "1.462 cc K15B",
    consumption: "14.5 KM/L",
    capacity: "4 - 5 Penumpang",
    transmission: "AUTOMATIC (4-AT)",
    batteryWarranty: "Garansi Mesin Resmi",
    colors: [
      { name: "Jimny 5 Bluish Black 4", hex: "#171B20" },
      { name: "Jimny 5 Jungle Green 2", hex: "#2E3B32" },
      { name: "Jimny 5 Metallic Chiffon Ivory 2 + Pearl Bluish Black 4", hex: "#D2C59D" },
      { name: "Jimny 5 Metallic Sizzling Red + Pearl Bluish Black 4", hex: "#9E1E24" },
      { name: "Jimny 5 Kinetic Yellow 2 + Pearl Bluish Black 4", hex: "#D6DF23" },
      { name: "Jimny 5 Granite Gray Metallic", hex: "#4B4E51" },
      { name: "Jimny 3 Bluish Black Pearl 3", hex: "#1A1D24" },
      { name: "Jimny 3 Medium Grey", hex: "#5C6063" },
      { name: "Jimny 3 Silky Silver Metallic", hex: "#CBCDD0" },
      { name: "Jimny 3 Metallic Chiffon Ivory 2 + Pearl Bluish Black 4", hex: "#CCC09B" },
      { name: "Jimny 3 Pearl White", hex: "#F4F5F7" },
      { name: "Jimny 4 Metallic Brisk Blue + Pearl Bluish Black 3", hex: "#0066B3" },
      { name: "Jimny 3 Kinetic Yellow 2 + Pearl Bluish Black 4", hex: "#DCE528" }
    ],
    variants: [
      { id: "3d-at", name: "Jimny 3-Door AT", transmission: "AUTOMATIC 4WD", statusTag: "Ikonik 4x4", price: 522100000, formattedPrice: "Rp 522.100.000", dpStart: "DP Mulai Rp 100 Jt-an", isFlagship: false, specs: ["AllGrip Pro 4WD (2H, 4H, 4L)", "Ladder Frame Chassis Kokoh", "Brake LSD Traction Control", "Hill Descent & Hold Control"] },
      { id: "3d-at-dt", name: "Jimny 3-Door AT Dual Tone", transmission: "AUTOMATIC 4WD", statusTag: "Dual Tone", price: 525200000, formattedPrice: "Rp 525.200.000", dpStart: "DP Mulai Rp 102 Jt-an", isFlagship: false, specs: ["Warna Atap Kontras Dual Tone", "Headunit Touchscreen 7-inch", "LED Headlamp with Washer", "Cruise Control"] },
      { id: "5d-at", name: "Jimny 5-Door AT", transmission: "AUTOMATIC 4WD", statusTag: "Paling Diminati", price: 534400000, formattedPrice: "Rp 534.400.000", dpStart: "DP Mulai Rp 105 Jt-an", isFlagship: false, specs: ["Wheelbase Panjang & 5 Pintu", "Headunit 9-inch HD Touchscreen", "Rear View Camera & Sensor", "Ruang Bagasi Ekstra Luas"] },
      { id: "5d-at-dt", name: "Jimny 5-Door AT Dual Tone", transmission: "AUTOMATIC 4WD", statusTag: "Top Flagship", price: 537500000, formattedPrice: "Rp 537.500.000", dpStart: "DP Mulai Rp 108 Jt-an", isFlagship: true, specs: ["Chrome Front Grille Eksklusif", "Dual Tone Roof Sporty", "6 Titik Airbags Komplit", "Interior Utilitarian Premium"] }
    ]
  },
  'grand-vitara': {
    name: "Grand Vitara",
    segment: "THE INTELLIGENT PREMIUM SUV",
    headline: "Kemewahan dan Teknologi Elektrifikasi Canggih",
    description: "Flagship SUV premium Suzuki dengan fitur terlengkap di kelasnya: Panoramic Sunroof besar, kamera 360 derajat, Head-Up Display, dan efisiensi mesin Smart Hybrid SHVS.",
    image: "/images/GRAND VITARA.jpeg",
    brochurePdf: "/E-BROSUR MOBIL/GRAND VITARA.pdf",
    engine: "1.462 cc K15C SHVS",
    consumption: "18.5 KM/L",
    capacity: "5 Penumpang",
    transmission: "6-AT with Paddle Shift",
    batteryWarranty: "Garansi Baterai 8 Tahun",
    colors: [
      { name: "Grand Vitara Prime Splendid Silver + Black", hex: "#BFC3C7" },
      { name: "Grand Vitara Pearl Arctic White + Black", hex: "#EEEEEE" },
      { name: "Grand Vitara Pearl Midnight Black", hex: "#14171A" },
      { name: "Grand Vitara Pearl Cave Black", hex: "#0B0C0E" }
    ],
    variants: [
      { id: "gx-st", name: "Grand Vitara New MC GX Single Tone", transmission: "6-SPEED AT", statusTag: "Ready Unit", price: 434000000, formattedPrice: "Rp 434.000.000", dpStart: "DP Mulai Rp 30 Jt-an", isFlagship: false, specs: ["Panoramic Sunroof Luas", "360 Surround View Camera", "Head-Up Display (HUD)", "Wireless Charger Smartphone"] },
      { id: "gx-dt", name: "Grand Vitara New MC GX Dual Tone", transmission: "6-SPEED AT", statusTag: "Top Flagship", price: 437000000, formattedPrice: "Rp 437.000.000", dpStart: "DP Mulai Rp 33 Jt-an", isFlagship: true, specs: ["Exterior Two-Tone Warna Hitam Atap", "Paddle Shift Responsif", "6 Airbags & Cruise Control", "9-inch Smartplay Pro+ Audio"] }
    ]
  },
  'spresso': {
    name: "Suzuki S-Presso",
    segment: "LINCAH & SUPER HEMAT BBM",
    headline: "City Car Bergaya Compact SUV yang Lincah",
    description: "City car gesit dengan ground clearance tinggi khas SUV, radius putar kecil, mesin K10C Dual Jet super irit hingga 21 km/liter, sangat pas untuk mobilitas padat Kota Makassar.",
    image: "/images/S-PRESSO.jpeg",
    brochurePdf: "/E-BROSUR MOBIL/S-PRESSO.pdf",
    engine: "998 cc K10C Dual Jet",
    consumption: "21.5 KM/L",
    capacity: "5 Penumpang",
    transmission: "AGS / 5-MT",
    batteryWarranty: "Garansi Mesin Resmi",
    colors: [
      { name: "S-Presso Granite Gray Metallic", hex: "#484A4D" },
      { name: "S-Presso White", hex: "#FFFFFF" },
      { name: "S-Presso Silky Silver Metallic", hex: "#CECFD2" },
      { name: "S-Presso Solid Fire Red", hex: "#BE1E2D" },
      { name: "S-Presso Sizzle Orange", hex: "#E85D22" }
    ],
    variants: [
      { id: "mt", name: "S-Presso MT", transmission: "MANUAL (5-MT)", statusTag: "Super Irit", price: 193500000, formattedPrice: "Rp 193.500.000", dpStart: "DP Mulai Rp 20 Jt-an", isFlagship: false, specs: ["Mesin Dual Jet K10C Baru", "Dual SRS Airbag & Rem ABS", "Ground Clearance 180mm", "Headunit Touchscreen 7-inch"] },
      { id: "at", name: "S-Presso AGS / AT", transmission: "AUTO GEAR SHIFT", statusTag: "Paling Diminati", price: 205000000, formattedPrice: "Rp 205.000.000", dpStart: "DP Mulai Rp 22 Jt-an", isFlagship: true, specs: ["Transmisi Matik Praktis AGS", "Electronic Stability Programme (ESP)", "Hill Hold Control (HHC)", "Electric Mirror Control"] }
    ]
  },
  'apv': {
    name: "Suzuki APV",
    segment: "MULTI-PURPOSE MPV & COMMERCIAL",
    headline: "Kapasitas Maksimal untuk Keluarga & Operasional Bisnis",
    description: "Kendaraan multi-fungsi legendaris dengan kabin super lega hingga 8 penumpang atau kapasitas angkut muatan besar pada varian Blind Van, ditopang mesin G15A yang terkenal bandel.",
    image: "/images/APV.jpeg",
    brochurePdf: "/E-BROSUR MOBIL/APV.pdf",
    engine: "1.493 cc G15A",
    consumption: "13.5 KM/L",
    capacity: "2 - 8 Penumpang",
    transmission: "MANUAL (5-MT)",
    batteryWarranty: "Garansi Mesin Resmi",
    colors: [
      { name: "APV White", hex: "#FFFFFF" },
      { name: "APV Burgundy Red", hex: "#5C1523" },
      { name: "APV Graphite Grey Metallic", hex: "#46484B" },
      { name: "APV Silky Silver Metallic", hex: "#CACBCE" },
      { name: "APV Black", hex: "#111111" }
    ],
    variants: [
      { id: "blind-van", name: "APV Blind Van", transmission: "MANUAL (5-MT)", statusTag: "Kargo Usaha", price: 197100000, formattedPrice: "Rp 197.100.000", dpStart: "DP Mulai Rp 50 Jt-an", isFlagship: false, specs: ["Kapasitas Kargo Luas & Tertutup", "Daya Angkut Ekstra Tangguh", "Mesin G15A Bandel & Mudah Dirawat", "AC Single Blower Dingin"] },
      { id: "ge", name: "APV GE", transmission: "MANUAL (5-MT)", statusTag: "Mobil Keluarga", price: 238300000, formattedPrice: "Rp 238.300.000", dpStart: "DP Mulai Rp 52 Jt-an", isFlagship: false, specs: ["Kapasitas 8 Penumpang Luas", "Power Steering Ringan", "Velg Standar Kokoh", "Jok Nyaman Fleksibel"] },
      { id: "gl", name: "APV GL", transmission: "MANUAL (5-MT)", statusTag: "Ready Unit", price: 246600000, formattedPrice: "Rp 246.600.000", dpStart: "DP Mulai Rp 54 Jt-an", isFlagship: false, specs: ["AC Double Blower", "Power Window & Central Lock", "Velg Alloy Wheel", "Radio CD MP3 Audio"] },
      { id: "gx", name: "APV GX", transmission: "MANUAL (5-MT)", statusTag: "Paling Diminati", price: 260700000, formattedPrice: "Rp 260.700.000", dpStart: "DP Mulai Rp 56 Jt-an", isFlagship: false, specs: ["Interior Two-Tone Mewah", "Audio Switch Steering", "Foglamp & Side Body Moulding", "Sensor Parkir Belakang"] },
      { id: "sgx", name: "APV SGX", transmission: "MANUAL (5-MT)", statusTag: "Top Flagship", price: 264300000, formattedPrice: "Rp 264.300.000", dpStart: "DP Mulai Rp 58 Jt-an", isFlagship: true, specs: ["Captain Seat Baris Kedua", "Chrome Grille & Spion Lipat Elektrik", "Kenyamanan Kabin VIP", "Armrest Tiap Kursi"] }
    ]
  },
  'carry': {
    name: "Carry Pick Up",
    segment: "SOLUSI BISNIS & LOGISTIK",
    headline: "Rajanya Pick Up Sulawesi Selatan yang Teruji",
    description: "Kendaraan niaga nomor satu pilihan pengusaha Makassar. Daya angkut muatan hingga 1 ton, bak ekstra lebar pilihan 3 sisi buka, serta mesin K15B-C yang ekstra irit dan bertenaga.",
    image: "/images/CARRY.jpeg",
    brochurePdf: "/E-BROSUR MOBIL/NEW CARRY.pdf",
    engine: "1.462 cc K15B-C",
    consumption: "16.0 KM/L",
    capacity: "3 Penumpang",
    transmission: "MANUAL (5-MT)",
    batteryWarranty: "Garansi Mesin Resmi",
    colors: [
      { name: "Carry Real Black", hex: "#161616" },
      { name: "Carry Silky Silver", hex: "#D0D2D5" },
      { name: "Carry White", hex: "#FFFFFF" }
    ],
    variants: [
      { id: "fd", name: "Carry Flat Deck (FD)", transmission: "MANUAL (5-MT)", statusTag: "Ready Stock", price: 198200000, formattedPrice: "Rp 198.200.000", dpStart: "DP Mulai Rp 10 Jt-an", isFlagship: false, specs: ["Bak Standar Buka Belakang", "Daya Angkut Kuat 1 Ton", "Sasis Tebal Double Reinforcement", "Immobilizer Kunci Aman"] },
      { id: "wd", name: "Carry Wide Deck (WD)", transmission: "MANUAL (5-MT)", statusTag: "Paling Laris", price: 198700000, formattedPrice: "Rp 198.700.000", dpStart: "DP Mulai Rp 11 Jt-an", isFlagship: false, specs: ["Bak Lebar Buka 3 Sisi", "Bongkar Muat Barang Lebih Cepat", "Kait Pengikat Muatan Banyak", "Kursi Driver Dapat Digeser"] },
      { id: "fd-acps", name: "Carry FD AC PS", transmission: "MANUAL (5-MT)", statusTag: "AC & Power Steering", price: 207600000, formattedPrice: "Rp 207.600.000", dpStart: "DP Mulai Rp 12 Jt-an", isFlagship: false, specs: ["AC Dingin Nyaman Seharian", "Power Steering Ringan", "Headunit Audio Single Din", "Beban Kemudi Sangat Enteng"] },
      { id: "wd-acps", name: "Carry WD AC PS", transmission: "MANUAL (5-MT)", statusTag: "Top Flagship Niaga", price: 208100000, formattedPrice: "Rp 208.100.000", dpStart: "DP Mulai Rp 13 Jt-an", isFlagship: true, specs: ["Bak Wide Deck 3 Sisi + AC & PS", "Varian Terlengkap & Ternyaman", "Kabin Lega Muat 3 Orang", "Nilai Jual Kembali Tinggi"] }
    ]
  }
};

// Deteksi Mobil Aktif Berdasarkan Props atau URL Search Parameter
const activeSlug = computed(() => {
  if (props.carSlug) return props.carSlug.toLowerCase();
  if (typeof window !== 'undefined') {
    const params = new URLSearchParams(window.location.search);
    const q = params.get('car');
    if (q) return q.toLowerCase();
  }
  return 'ertiga';
});

const currentCar = computed(() => {
  return carsDatabase[activeSlug.value] || carsDatabase['ertiga'];
});

const variants = computed(() => currentCar.value.variants);
const availableColors = computed(() => currentCar.value.colors || []);
const activeColor = ref(availableColors.value[0] || { name: "", hex: "#FFFFFF" });

// Kalkulator Kredit Interaktif
const formatIDR = (num) => 'Rp ' + Math.round(num).toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');

const selectedPrice = ref(variants.value[0]?.price || 269700000);
const dpPercent = ref(20);
const selectedTenor = ref(5);
const selectedLeasing = ref("Mandiri Tunas Finance");

const leasingPartners = [
  "Mandiri Tunas Finance",
  "BCA Finance",
  "BRI Finance",
  "Suzuki Finance Indonesia",
  "Indomobil Finance",
  "Adira Finance / Lainnya"
];

// Update harga kalkulator dan warna default saat berganti mobil
watch(currentCar, (newCar) => {
  if (newCar) {
    if (newCar.variants && newCar.variants.length > 0) {
      selectedPrice.value = newCar.variants[0].price;
    }
    if (newCar.colors && newCar.colors.length > 0) {
      activeColor.value = newCar.colors[0];
    }
  }
}, { immediate: true });

const currentVariantName = computed(() => {
  const match = variants.value.find(v => v.price === Number(selectedPrice.value));
  return match ? `${currentCar.value.name} ${match.name}` : currentCar.value.name;
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
  const text = `Halo CHAE SUZUKI, saya ingin konsultasi simulasi kredit Suzuki:\n\n• Mobil: ${currentVariantName.value}\n• Pilihan DP: ${dpPercent.value}% (${formatIDR(dpAmount.value)})\n• Tenor: ${selectedTenor.value} Tahun (${selectedTenor.value * 12} Bulan)\n• Pilihan Leasing: ${selectedLeasing.value}\n\nMohon info diskon dan promo OTR Makassar untuk tipe ini.`;
  window.open(`https://wa.me/6285299837635?text=${encodeURIComponent(text)}`, '_blank');
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
    <Navbar currentPage="passenger" />

    <main class="w-full">
      <!-- BREADCRUMB STRIP -->
      <section class="w-full bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-3 flex flex-wrap items-center justify-between gap-3 text-xs text-slate-500">
          <nav class="flex items-center gap-1.5 font-medium">
            <button type="button" @click="$emit('back')" class="inline-flex items-center gap-2 text-xs font-bold text-slate-600 hover:text-red-600 transition-colors cursor-pointer">
              <span class="material-symbols-outlined text-[16px]">arrow_back</span>
              <span>Kembali ke Beranda</span>
            </button>
            <span class="material-symbols-outlined text-[14px]">chevron_right</span>
            <a href="/#lineup-section" class="hover:text-red-600 transition-colors">Katalog Mobil</a>
            <span class="material-symbols-outlined text-[14px]">chevron_right</span>
            <span class="text-slate-900 font-bold">{{ currentCar.name }}</span>
          </nav>
          <div class="inline-flex items-center gap-2 text-[11px] font-bold text-emerald-700 bg-emerald-50 px-3 py-1 rounded-full border border-emerald-200">
            <span class="relative flex h-2 w-2">
              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-500 opacity-75"></span>
              <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-600"></span>
            </span>
            UNIT READY STOCK PT MEGAHPUTRA SEJAHTERA MAKASSAR
          </div>
        </div>
      </section>

      <!-- DETAIL HERO -->
      <section class="w-full py-6 sm:py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
          <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 sm:gap-8 items-start">
            <div class="lg:col-span-7 space-y-4">
              <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-3 sm:p-5 space-y-4">
                
                <!-- CONTAINER GAMBAR & BADGE RESPONSIF MOBILE -->
                <div class="relative w-full aspect-[16/10] bg-gradient-to-b from-slate-50 to-slate-100 rounded-xl overflow-hidden flex items-center justify-center">
                  <!-- BADGE KIRI ATAS RESPONSIF -->
                  <div class="absolute top-2.5 left-2.5 sm:top-4 sm:left-4 z-10 flex flex-col items-start gap-1 sm:gap-1.5 max-w-[75%] sm:max-w-none">
                    <span class="text-[8px] sm:text-[10px] font-extrabold uppercase tracking-tight sm:tracking-wider bg-red-600 text-white px-1.5 py-0.5 sm:px-2.5 sm:py-1 rounded shadow-sm leading-tight">
                      {{ currentCar.segment }}
                    </span>
                    <span class="text-[8px] sm:text-[10px] font-extrabold uppercase tracking-tight sm:tracking-wider bg-[#06182A]/90 backdrop-blur-sm text-white px-1.5 py-0.5 sm:px-2.5 sm:py-1 rounded shadow-sm leading-tight">
                      {{ currentCar.batteryWarranty }}
                    </span>
                  </div>

                  <img :src="currentCar.image" :alt="currentCar.name" class="w-full h-full object-contain p-2 hover:scale-105 transition-transform duration-500" />
                  
                  <!-- BADGE KANAN BAWAH RESPONSIF -->
                  <div class="absolute bottom-2.5 right-2.5 sm:bottom-3 sm:right-4 flex items-center gap-1 text-slate-500 text-[9px] sm:text-[11px] font-medium bg-white/90 backdrop-blur-sm px-2 py-0.5 sm:px-2.5 sm:py-1 rounded-full border border-slate-200 shadow-sm">
                    <span class="material-symbols-outlined text-[13px] sm:text-[14px]">photo_camera</span>
                    <span>Showroom Resmi Latimojong</span>
                  </div>
                </div>

                <!-- PILIHAN WARNA EKSTERIOR SESUAI MOBIL -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-slate-50 p-3 sm:p-3.5 rounded-xl border border-slate-200">
                  <div>
                    <span class="text-[10px] font-bold uppercase text-slate-400 tracking-wider block">Pilihan Warna Eksterior</span>
                    <span class="text-xs sm:text-sm font-bold text-slate-900">{{ activeColor.name }}</span>
                  </div>
                  <div class="flex flex-wrap items-center gap-2">
                    <button v-for="(color, idx) in availableColors" :key="idx" @click="activeColor = color"
                            :title="color.name"
                            :style="{ backgroundColor: color.hex }"
                            :class="['w-7 h-7 sm:w-8 sm:h-8 rounded-full border transition-all cursor-pointer shrink-0', activeColor.name === color.name ? 'ring-2 ring-red-600 scale-110 border-white shadow-md' : 'border-slate-300 hover:scale-105']"></button>
                  </div>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 pt-1">
                  <div class="bg-slate-50 p-2.5 sm:p-3 rounded-xl border border-slate-200">
                    <div class="flex items-center gap-1 text-red-600 text-xs font-bold uppercase">
                      <span class="material-symbols-outlined text-[16px]">bolt</span> Mesin
                    </div>
                    <p class="font-extrabold text-slate-900 text-xs sm:text-sm mt-1 truncate">{{ currentCar.engine }}</p>
                  </div>
                  <div class="bg-slate-50 p-2.5 sm:p-3 rounded-xl border border-slate-200">
                    <div class="flex items-center gap-1 text-red-600 text-xs font-bold uppercase">
                      <span class="material-symbols-outlined text-[16px]">local_gas_station</span> Efisiensi
                    </div>
                    <p class="font-extrabold text-slate-900 text-xs sm:text-sm mt-1 truncate">{{ currentCar.consumption }}</p>
                  </div>
                  <div class="bg-slate-50 p-2.5 sm:p-3 rounded-xl border border-slate-200">
                    <div class="flex items-center gap-1 text-red-600 text-xs font-bold uppercase">
                      <span class="material-symbols-outlined text-[16px]">airline_seat_recline_normal</span> Kapasitas
                    </div>
                    <p class="font-extrabold text-slate-900 text-xs sm:text-sm mt-1 truncate">{{ currentCar.capacity }}</p>
                  </div>
                  <div class="bg-slate-50 p-2.5 sm:p-3 rounded-xl border border-slate-200">
                    <div class="flex items-center gap-1 text-red-600 text-xs font-bold uppercase">
                      <span class="material-symbols-outlined text-[16px]">settings</span> Transmisi
                    </div>
                    <p class="font-extrabold text-slate-900 text-xs sm:text-sm mt-1 truncate">{{ currentCar.transmission }}</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Ringkasan Harga & Promo -->
            <div class="lg:col-span-5 space-y-4">
              <div class="bg-white rounded-2xl shadow-md border border-slate-200 p-5 sm:p-6 space-y-4 sm:space-y-5">
                <div class="flex items-center gap-2">
                  <span class="text-[10px] sm:text-[11px] font-bold uppercase tracking-wider bg-slate-100 text-slate-700 px-2.5 py-0.5 rounded-full">
                    DEALER RESMI SULAWESI SELATAN
                  </span>
                  <span class="text-slate-400">•</span>
                  <span class="text-xs text-slate-500">Makassar</span>
                </div>

                <div class="space-y-1">
                  <h1 class="text-xl sm:text-2xl lg:text-3xl font-extrabold text-slate-900 leading-tight">
                    {{ currentCar.name }}
                  </h1>
                  <p class="text-xs text-slate-500 leading-relaxed">
                    {{ currentCar.description }}
                  </p>
                </div>

                <div class="bg-slate-50 border border-slate-200 rounded-xl p-3.5 sm:p-4 space-y-2">
                  <span class="text-[9px] sm:text-[10px] font-bold uppercase text-slate-400 tracking-wider block">HARGA RESMI OTR MAKASSAR MULAI</span>
                  <div class="flex items-baseline gap-2">
                    <span class="text-2xl sm:text-3xl font-extrabold text-red-600">{{ variants[0]?.formattedPrice }}</span>
                    <span class="text-xs text-slate-500 truncate">({{ variants[0]?.name }})</span>
                  </div>
                  <div class="grid grid-cols-2 gap-2 pt-2 border-t border-slate-200 text-xs font-semibold text-slate-700">
                    <div class="flex items-center gap-1.5">
                      <span class="material-symbols-outlined text-emerald-600 text-[18px]">payments</span>
                      <span>{{ variants[0]?.dpStart }}</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                      <span class="material-symbols-outlined text-emerald-600 text-[18px]">verified</span>
                      <span>Bunga Mulai <strong>2.9%</strong></span>
                    </div>
                  </div>
                </div>

                <div class="space-y-2 text-xs text-slate-700">
                  <div class="flex items-start gap-2">
                    <span class="material-symbols-outlined text-emerald-600 text-[18px] shrink-0">check_circle</span>
                    <span><strong>Garansi Resmi Suzuki Indonesia</strong> dan jaminan ketersediaan suku cadang asli SGP.</span>
                  </div>
                  <div class="flex items-start gap-2">
                    <span class="material-symbols-outlined text-emerald-600 text-[18px] shrink-0">check_circle</span>
                    <span><strong>Gratis Servis Berkala & Jasa</strong> s/d 50.000 KM di seluruh jaringan Megah Makassar.</span>
                  </div>
                  <div class="flex items-start gap-2">
                    <span class="material-symbols-outlined text-emerald-600 text-[18px] shrink-0">check_circle</span>
                    <span><strong>Bonus Aksesoris Eksklusif:</strong> Kaca Film Solargard, Talang Air, Karpet Set, & P3K.</span>
                  </div>
                </div>

                <!-- TOMBOL BROSUR & ACTIONS -->
                <div class="space-y-2 pt-2">
                  <a :href="currentCar.brochurePdf" target="_blank" class="w-full h-11 bg-red-50 hover:bg-red-100 text-red-700 font-bold text-xs rounded-xl flex items-center justify-center gap-2 border border-red-200 transition-all shadow-sm">
                    <span class="material-symbols-outlined text-[18px]">picture_as_pdf</span>
                    <span>Buka / Unduh E-Brosur Resmi (PDF)</span>
                  </a>

                  <a :href="`https://wa.me/6285299837635?text=Halo%20CHAE%20SUZUKI,%20saya%20tertarik%20dengan%20${encodeURIComponent(currentCar.name)}`" target="_blank" class="w-full h-11 sm:h-12 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs sm:text-sm rounded-xl flex items-center justify-center gap-2 shadow-sm transition-all">
                    <span class="material-symbols-outlined text-[18px] sm:text-[20px]">chat</span>
                    <span>Tanya Promo & Diskon via WhatsApp</span>
                  </a>
                  
                  <a href="#kalkulator-section" class="w-full h-10 sm:h-11 bg-[#06182A] hover:bg-slate-800 text-white font-bold text-xs rounded-xl flex items-center justify-center gap-2 transition-all">
                    <span class="material-symbols-outlined text-[16px] sm:text-[18px]">calculate</span>
                    <span>Simulasi Cicilan & Hitung DP</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- DAFTAR VARIAN LENGKAP -->
      <section class="w-full py-12 sm:py-16 bg-slate-50 border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 space-y-8">
          <div>
            <div class="flex items-center gap-2 text-red-600 text-xs font-bold uppercase tracking-wider">
              <span class="material-symbols-outlined text-[16px]">price_change</span>
              <span>PRICE LIST RESMI OTR SULAWESI SELATAN & BARAT</span>
            </div>
            <h2 class="text-xl sm:text-2xl lg:text-3xl font-extrabold text-slate-900 mt-1">
              Pilihan Tipe & Harga {{ currentCar.name }}
            </h2>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
            <div v-for="variant in variants" :key="variant.id"
                 :class="['bg-white rounded-2xl p-5 border flex flex-col justify-between transition-all hover:shadow-lg', variant.isFlagship ? 'border-2 border-red-600 shadow-md relative' : 'border-slate-200 shadow-sm']">
              <div v-if="variant.isFlagship" class="absolute -top-3 left-1/2 -translate-x-1/2 bg-red-600 text-white text-[10px] font-bold uppercase px-3 py-0.5 rounded-full shadow-sm whitespace-nowrap">
                VARIAN TERTINGGI / FAVORIT
              </div>

              <div class="space-y-4">
                <div class="flex items-center justify-between pt-1">
                  <span class="text-[10px] font-bold bg-slate-100 text-slate-700 px-2.5 py-1 rounded uppercase">
                    {{ variant.transmission }}
                  </span>
                  <span class="text-[11px] text-emerald-600 font-bold">{{ variant.statusTag }}</span>
                </div>

                <div>
                  <h3 class="text-xl font-bold text-slate-900">{{ variant.name }}</h3>
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
                <a :href="`https://wa.me/6285299837635?text=Halo%20CHAE%20SUZUKI,%20minta%20info%20diskon%20${encodeURIComponent(currentCar.name)}%20tipe%20${encodeURIComponent(variant.name)}`" target="_blank"
                   :class="['w-full h-10 text-xs font-bold rounded-lg flex items-center justify-center gap-1.5 transition-colors', variant.isFlagship ? 'bg-red-600 hover:bg-red-700 text-white shadow-sm' : 'bg-slate-100 hover:bg-slate-200 text-slate-800']">
                  <span class="material-symbols-outlined text-[16px]">chat</span>
                  <span>Tanya Promo Tipe Ini</span>
                </a>
                <button type="button" @click="setCalculatorVariant(variant.price)" class="w-full h-9 bg-slate-50 hover:bg-slate-100 text-slate-600 text-xs font-semibold rounded-lg flex items-center justify-center gap-1 transition-colors cursor-pointer">
                  <span class="material-symbols-outlined text-[14px]">calculate</span>
                  <span>Hitung Cicilan</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- SIMULATOR KREDIT DINAMIS DENGAN MITRA FINANCE LENGKAP -->
      <section class="w-full py-12 sm:py-16 bg-white border-t border-slate-200" id="kalkulator-section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
          <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-200 grid grid-cols-1 lg:grid-cols-12">
            <div class="lg:col-span-7 p-5 sm:p-8 lg:p-10 space-y-6">
              <div>
                <span class="text-xs font-bold text-red-600 uppercase tracking-wider">TRANSPARANSI KREDIT MOBIL</span>
                <h2 class="text-xl sm:text-2xl lg:text-3xl font-extrabold text-slate-900 mt-1">Kalkulator Simulasi Cicilan {{ currentCar.name }}</h2>
                <p class="text-xs sm:text-sm text-slate-500">Sesuaikan uang muka (DP), tenor pembiayaan, dan pilihan mitra finance terpercaya untuk mendapatkan estimasi angsuran terbaik.</p>
              </div>

              <div class="space-y-4 bg-slate-50 p-4 sm:p-5 rounded-2xl border border-slate-200">
                <div>
                  <label class="block text-xs font-bold text-slate-700 mb-1.5">Varian Yang Dipilih</label>
                  <select v-model.number="selectedPrice" class="w-full h-11 px-3 bg-white rounded-xl text-xs sm:text-sm font-semibold border border-slate-300 outline-none focus:ring-2 focus:ring-[#06182A]">
                    <option v-for="variant in variants" :key="variant.id" :value="variant.price">
                      {{ variant.name }} - {{ variant.formattedPrice }}
                    </option>
                  </select>
                </div>

                <!-- PILIHAN LEASING / FINANCE PARTNER -->
                <div>
                  <label class="block text-xs font-bold text-slate-700 mb-1.5">Pilihan Leasing / Pembiayaan</label>
                  <select v-model="selectedLeasing" class="w-full h-11 px-3 bg-white rounded-xl text-xs sm:text-sm font-semibold border border-slate-300 outline-none focus:ring-2 focus:ring-[#06182A]">
                    <option v-for="(lease, idx) in leasingPartners" :key="idx" :value="lease">
                      {{ lease }}
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
                  <label class="block text-xs font-bold text-slate-700 mb-1.5">Jangka Waktu (Tenor)</label>
                  <div class="grid grid-cols-5 gap-1.5 sm:gap-2">
                    <button v-for="yr in [1, 2, 3, 4, 5]" :key="yr" type="button" @click="selectedTenor = yr"
                            :class="['py-2 sm:py-2.5 rounded-lg text-xs font-bold transition-all cursor-pointer', selectedTenor === yr ? 'bg-[#06182A] text-white shadow-md' : 'bg-white hover:bg-slate-200 text-slate-700 border border-slate-200']">
                      {{ yr }} Thn
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <div class="lg:col-span-5 bg-[#06182A] text-white p-5 sm:p-8 lg:p-10 flex flex-col justify-between">
              <div class="space-y-4">
                <div class="flex items-center justify-between">
                  <span class="text-xs font-bold uppercase tracking-wider text-slate-400">ESTIMASI PEMBIAYAAN</span>
                  <span class="text-xs font-bold text-emerald-400 flex items-center gap-1">
                    <span class="material-symbols-outlined text-[16px]">verified</span> Bunga Spesial 3,2%
                  </span>
                </div>

                <div>
                  <span class="text-xs text-slate-400">Estimasi Angsuran Bulanan:</span>
                  <p class="text-2xl sm:text-3xl font-extrabold tracking-tight text-white mt-1">
                    {{ formatIDR(monthlyInstallment) }}<span class="text-xs sm:text-sm font-normal text-slate-400"> / bln</span>
                  </p>
                </div>

                <div class="space-y-2 text-xs text-slate-300 border-t border-slate-700 pt-4">
                  <div class="flex justify-between"><span>Harga OTR Varian:</span><strong class="text-white">{{ formatIDR(selectedPrice) }}</strong></div>
                  <div class="flex justify-between"><span>Total Uang Muka (DP):</span><strong class="text-white">{{ formatIDR(dpAmount) }}</strong></div>
                  <div class="flex justify-between"><span>Tenor Dipilih:</span><strong class="text-white">{{ selectedTenor * 12 }} Bulan ({{ selectedTenor }} Tahun)</strong></div>
                  <div class="flex justify-between items-center">
                    <span>Mitra Pembiayaan:</span>
                    <span class="bg-emerald-500/20 text-emerald-300 text-xs font-bold px-2 py-0.5 rounded">{{ selectedLeasing }}</span>
                  </div>
                </div>

                <!-- Strip Mitra Finance Terdaftar -->
                <div class="pt-2 border-t border-slate-800">
                  <span class="text-[10px] text-slate-400 uppercase tracking-wider block mb-1.5 font-bold">Mitra Finance Terdaftar:</span>
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
                <button type="button" @click="sendCalculationWa" class="w-full h-11 sm:h-12 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs rounded-xl flex items-center justify-center gap-2 shadow-lg transition-all cursor-pointer">
                  <span class="material-symbols-outlined text-[18px]">chat</span>
                  <span>Ajukan Hasil Hitungan ke WhatsApp CHAE SUZUKI</span>
                </button>
                <p class="text-center text-[10px] text-slate-400">*Simulasi belum termasuk potongan diskon promo dealer Megah Makassar.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- PROFIL SALES CHAE SUZUKI -->
      <section class="w-full py-12 sm:py-16 bg-slate-50 border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
          <div class="bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden grid grid-cols-1 lg:grid-cols-12">
            <div class="lg:col-span-5 relative min-h-[300px] sm:min-h-[360px] lg:min-h-full bg-slate-100 flex items-center justify-center">
              <img src="/images/chae.jpeg" class="w-full h-full object-cover object-top" alt="CHAE SUZUKI" />
              <div class="absolute bottom-4 left-4 right-4 bg-[#06182A]/90 backdrop-blur-md p-3.5 rounded-xl text-white flex items-center justify-between">
                <div>
                  <h4 class="font-bold text-sm">CHAE SUZUKI</h4>
                  <span class="text-[10px] text-slate-300 uppercase tracking-wider">Sales Executive Suzuki Megah</span>
                </div>
                <div class="text-right">
                  <div class="flex items-center gap-1 text-emerald-400 justify-end text-xs font-bold">
                    <span class="material-symbols-outlined text-[16px]">star</span> 4.9 / 5.0
                  </div>
                  <span class="text-[10px] text-slate-400">250+ Pelanggan Puas</span>
                </div>
              </div>
            </div>

            <div class="lg:col-span-7 p-5 sm:p-8 lg:p-10 flex flex-col justify-between gap-6">
              <div class="space-y-3">
                <div class="inline-flex items-center gap-2 bg-red-50 text-red-600 px-3 py-1 rounded-full text-xs font-bold">
                  <span class="material-symbols-outlined text-[16px]">workspace_premium</span>
                  <span>Konsultan Resmi Terpercaya Suzuki Megah Makassar</span>
                </div>
                <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900 leading-tight">
                  Konsultasikan Pembelian {{ currentCar.name }} Anda Bersama Saya
                </h2>
                <p class="text-xs text-slate-500 leading-relaxed">
                  Melayani pembelian mobil Suzuki di wilayah Makassar, Gowa, Maros, dan seluruh kabupaten di Sulawesi Selatan. Siap membantu perhitungan kredit terbaik, diskon maksimal via leasing rekanan resmi, hingga berkas dijemput langsung ke alamat Anda.
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
                    Online & Siap Melayani (Respon Cepat)
                  </div>
                  <span class="text-slate-500 font-mono">0852-9983-7635</span>
                </div>
                <div class="w-full">
                  <a :href="`https://wa.me/6285299837635?text=Halo%20CHAE%20SUZUKI,%20saya%20ingin%20konsultasi%20pembelian%20${encodeURIComponent(currentCar.name)}`" target="_blank" class="h-11 w-full bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold rounded-xl flex items-center justify-center gap-2 transition-all shadow-sm">
                    <span class="material-symbols-outlined text-[18px]">chat</span> Chat WhatsApp Langsung
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- FLOATING BOTTOM BAR -->
    <aside class="fixed bottom-6 left-1/2 -translate-x-1/2 z-40 w-[90%] max-w-md">
      <div class="bg-white/90 backdrop-blur-xl border border-slate-200 shadow-2xl rounded-full p-1.5 flex items-center justify-between gap-2">
        <a :href="`https://wa.me/6285299837635?text=Halo%20CHAE%20SUZUKI,%20saya%20tertarik%20dengan%20${encodeURIComponent(currentCar.name)}`" target="_blank" class="flex-[1.5] h-11 bg-emerald-600 hover:bg-emerald-700 text-white rounded-full text-xs font-bold flex items-center justify-center gap-2 shadow-sm transition-all">
          <span class="relative flex h-2 w-2">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-80"></span>
            <span class="relative inline-flex rounded-full h-2 w-2 bg-white"></span>
          </span>
          <span class="material-symbols-outlined text-[18px]">forum</span>
          <span>Chat WhatsApp</span>
        </a>
        <a href="#kalkulator-section" class="flex-1 h-11 bg-slate-100 hover:bg-slate-200 text-slate-900 border border-slate-300 rounded-full text-xs font-bold flex items-center justify-center gap-1.5 transition-all">
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