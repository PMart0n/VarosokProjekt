<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UzenetController;

// FŐOLDAL
Route::get('/', function () {
    return view('fooldal');
})->name('fooldal');

// ADATBÁZIS LISTA
Route::get('/adatbazis', function () {
    return view('adatbazis');
})->name('adatbazis');

// KAPCSOLAT (Controller kezeli)
// Űrlap megjelenítése
Route::get('/kapcsolat', [UzenetController::class, 'create'])->name('kapcsolat');
// Adatok mentése (gombnyomás hívja majd)
Route::post('/kapcsolat', [UzenetController::class, 'store'])->name('kapcsolat.store');

// 4. DIAGRAM
Route::get('/diagram', function () {
    return view('diagram');
})->name('diagram');

// --- A következőkhöz majd kell jogosultság (Auth), de egyelőre publikusak ---

// 5. ÜZENETEK (Controller kezeli, listázza az adatokat)
Route::get('/uzenetek', [UzenetController::class, 'index'])->name('uzenetek');

// 6. ADMIN (Csak adminoknak)
Route::get('/admin', function () {
    return view('admin');
})->name('admin');

// CRUD (Ez majd később, de a helye itt van)
Route::get('/crud', function () { return view('crud'); })->name('crud');