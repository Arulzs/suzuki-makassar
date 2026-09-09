<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// 1. Halaman Beranda Utama
Route::get('/', function () {
    return Inertia::render('Home');
});

// 2. Halaman Detail Mobil (All New Ertiga Hybrid)
Route::get('/mobil/ertiga-hybrid', function () {
    return Inertia::render('CarDetail');
});
