<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UzenetController;
use App\Http\Controllers\VarosController; 

//FŐOLDAL
Route::get('/', function () {
    return view('fooldal');
})->name('fooldal');

//ADATBÁZIS LISTA (Publikus)
Route::get('/adatbazis', function () {
    return view('adatbazis');
})->name('adatbazis');

//KAPCSOLAT
Route::get('/kapcsolat', [UzenetController::class, 'create'])->name('kapcsolat');
Route::post('/kapcsolat', [UzenetController::class, 'store'])->name('kapcsolat.store');

//DIAGRAM
Route::get('/diagram', function () {
    return view('diagram');
})->name('diagram');

//ÜZENETEK
Route::get('/uzenetek', [UzenetController::class, 'index'])->name('uzenetek');

//ADMIN
Route::get('/admin', function () {
    return view('admin');
})->name('admin');

// --- CRUD RENDSZER 

// létre hozza a varosok.create, varosok.store, varosok.edit, stb. útvonalakat!
Route::resource('varosok', VarosController::class);

// A régi /crud linket átirányítjuk a valódi listára
Route::get('/crud', function () {
    return redirect()->route('varosok.index');
})->name('crud');