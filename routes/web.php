<?php

use App\Http\Controllers\ProfileController;
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
Route::get('/uzenetek', [UzenetController::class, 'index'])->middleware(['auth'])->name('uzenetek');

//ADMIN
Route::get('/admin', function () {
    if(auth()->check() && auth()->user()->role === 'admin'){
        return view('admin');
    }
    abort(403); // Hozzáférés megtagadva
})->middleware(['auth'])->name('admin');

// --- CRUD RENDSZER 

// létre hozza a varosok.create, varosok.store, varosok.edit, stb. útvonalakat!
Route::resource('varosok', VarosController::class);

// A régi /crud linket átirányítjuk a valódi listára
Route::get('/crud', function () {
    return redirect()->route('varosok.index');
})->name('crud');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
