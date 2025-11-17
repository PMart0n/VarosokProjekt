<?php

use Illuminate\Support\Facades\Route;

// 1. FŐOLDAL
Route::get('/', function () {
    return view('fooldal');
})->name('fooldal');

// 2. ADATBÁZIS LISTA
Route::get('/adatbazis', function () {
    return view('adatbazis');
})->name('adatbazis');

// 3. KAPCSOLAT
Route::get('/kapcsolat', function () {
    return view('kapcsolat');
})->name('kapcsolat');

// 4. DIAGRAM
Route::get('/diagram', function () {
    return view('diagram');
})->name('diagram');

// --- A következőkhöz majd kell jogosultság (Auth), de egyelőre publikusak ---

// 5. ÜZENETEK (Csak bejelentkezve)
Route::get('/uzenetek', function () {
    return view('uzenetek');
})->name('uzenetek');

// 6. ADMIN (Csak adminoknak)
Route::get('/admin', function () {
    return view('admin');
})->name('admin');

// CRUD (Ez majd később jön, de a helye itt van)
// Route::resource('varosok', ...);