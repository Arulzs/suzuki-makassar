<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
});

// Menangkap semua rute /mobil/* agar dirender oleh komponen CarDetail atau Home
Route::get('/mobil/{slug}', function ($slug) {
    return Inertia::render('CarDetail', [
        'carSlug' => $slug
    ]);
});