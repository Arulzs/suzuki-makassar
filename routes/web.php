<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
});

// RUTE DINAMIS UNTUK SEMUA HALAMAN DETAIL MOBIL
Route::get('/mobil/{slug}', function ($slug) {
    return Inertia::render('CarDetail', [
        'carSlug' => $slug
    ]);
});