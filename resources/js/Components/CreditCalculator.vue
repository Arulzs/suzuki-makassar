<script setup>
import { ref, computed } from 'vue';
import { CARS_DATA } from '../Data/carsData';

const formatIDR = (num) =>
  'Rp ' + Math.round(num).toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');

const selectedPrice = ref(CARS_DATA[0].price);
const dpPercent = ref(20);
const tenor = ref(5);

const selectedCar = computed(() => {
  return CARS_DATA.find((c) => c.price === Number(selectedPrice.value)) || CARS_DATA[0];
});

const dpAmount = computed(() => selectedPrice.value * (dpPercent.value / 100));
const loanPrincipal = computed(() => selectedPrice.value - dpAmount.value);
const totalInterest = computed(() => loanPrincipal.value * 0.038 * tenor.value);
const totalLoan = computed(() => loanPrincipal.value + totalInterest.value);
const totalMonths = computed(() => tenor.value * 12);
const monthlyInstallment = computed(() => totalLoan.value / totalMonths.value);

const waUrl = computed(() => {
  const text = `Halo Mas Zulkifli, saya mau konsultasi simulasi kredit Suzuki ${selectedCar.value.name} dengan estimasi DP ${dpPercent.value}% (${formatIDR(dpAmount.value)}) tenor ${tenor.value} tahun.`;
  return `https://wa.me/6285398217447?text=${encodeURIComponent(text)}`;
});
</script>

<template>
  <section class="w-full py-12 px-4 max-w-5xl mx-auto">
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-200 grid grid-cols-1 md:grid-cols-12">
      <!-- Input Controls -->
      <div class="md:col-span-7 p-6 space-y-5">
        <div>
          <span class="text-xs font-bold text-red-600 tracking-wider uppercase">Transparansi Pembiayaan</span>
          <h2 class="text-2xl font-bold text-slate-900 mt-1">Simulasi Kredit Instan Suzuki</h2>
          <p class="text-sm text-slate-500">Hitung estimasi DP dan cicilan bulanan sesuai budget Anda.</p>
        </div>

        <div class="space-y-4">
          <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">Pilih Unit Kendaraan</label>
            <select v-model.number="selectedPrice" class="w-full h-11 px-3 bg-slate-100 rounded-lg text-sm border border-slate-300 outline-none">
              <option v-for="car in CARS_DATA" :key="car.id" :value="car.price">
                {{ car.name }} - {{ formatIDR(car.price) }}
              </option>
            </select>
          </div>

          <div>
            <div class="flex justify-between text-sm font-medium text-slate-700 mb-1">
              <span>Uang Muka (DP): <strong class="text-red-600">{{ dpPercent }}%</strong></span>
              <span>{{ formatIDR(dpAmount) }}</span>
            </div>
            <input type="range" min="10" max="50" step="5" v-model.number="dpPercent" class="w-full h-2 bg-slate-200 rounded-lg cursor-pointer accent-red-600" />
          </div>

          <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">Tenor Pembiayaan</label>
            <div class="grid grid-cols-5 gap-2">
              <button
                v-for="year in [1, 2, 3, 4, 5]"
                :key="year"
                type="button"
                @click="tenor = year"
                :class="[
                  'py-2 rounded-lg text-sm font-bold transition-all',
                  tenor === year ? 'bg-red-600 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200'
                ]"
              >
                {{ year }} Thn
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Hasil Estimasi -->
      <div class="md:col-span-5 bg-slate-900 text-white p-6 flex flex-col justify-between">
        <div class="space-y-4">
          <span class="text-xs uppercase tracking-wider text-slate-400 font-semibold">Estimasi Angsuran</span>
          <div>
            <p class="text-3xl font-extrabold text-white">{{ formatIDR(monthlyInstallment) }}<span class="text-sm font-normal text-slate-400">/bln</span></p>
            <p class="text-xs text-slate-400 mt-1">*Suku bunga flat estimasi rekanan leasing resmi.</p>
          </div>
          <div class="border-t border-slate-800 pt-3 space-y-2 text-sm text-slate-300">
            <div class="flex justify-between"><span>Harga OTR:</span><strong class="text-white">{{ formatIDR(selectedPrice) }}</strong></div>
            <div class="flex justify-between"><span>Total DP:</span><strong class="text-white">{{ formatIDR(dpAmount) }}</strong></div>
            <div class="flex justify-between"><span>Jangka Waktu:</span><strong class="text-white">{{ totalMonths }} Bulan ({{ tenor }} Thn)</strong></div>
          </div>
        </div>

        <div class="mt-6">
          <a :href="waUrl" target="_blank" rel="noopener noreferrer" class="w-full h-11 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg font-bold flex items-center justify-center transition-colors">
            Ajukan via WhatsApp
          </a>
        </div>
      </div>
    </div>
  </section>
</template>
