<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Megye;
use App\Models\Varos;
use App\Models\Lelekszam;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        //MEGYE adatok betöltése
        $this->importMegye();
        
        //VÁROS adatok betöltése
        $this->importVaros();
        
        //LÉLEKSZÁM adatok betöltése
        $this->importLelekszam();
        
        //Admin felhasználó létrehozása
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
    }

    private function importMegye() {
        //database/data mappa
        $path = base_path('database/data/megye.txt');
        
        if (!file_exists($path)) {
            echo "HIBA: Nem találom a fájlt: $path\n";
            return;
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES);
        foreach ($lines as $index => $line) {
            if ($index == 0) continue; // Fejléc átugrása
            $data = explode("\t", $line); // Tabulátorral elválasztva
            
            if(count($data) >= 2) {
                Megye::create([
                    'id' => $data[0],
                    'nev' => $data[1],
                ]);
            }
        }
        echo "Megyék sikeresen feltöltve.\n";
    }

    private function importVaros() {
        $path = base_path('database/data/varos.txt');
        
        if (!file_exists($path)) {
            echo "HIBA: Nem találom a fájlt: $path\n";
            return;
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES);
        foreach ($lines as $index => $line) {
            if ($index == 0) continue; 
            $data = explode("\t", $line);
            
            if(count($data) >= 5) {
                Varos::create([
                    'id' => $data[0],
                    'nev' => $data[1],
                    'megyeid' => $data[2],
                    'megyeszekhely' => $data[3] == -1, // -1 konvertálása true-ra
                    'megyeijogu' => $data[4] == -1,    // -1 konvertálása true-ra
                ]);
            }
        }
        echo "Városok sikeresen feltöltve.\n";
    }

    private function importLelekszam() {
        $path = base_path('database/data/lelekszam.txt');
        
        if (!file_exists($path)) {
            echo "HIBA: Nem találom a fájlt: $path\n";
            return;
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES);
        foreach ($lines as $index => $line) {
            if ($index == 0) continue; 
            $data = explode("\t", $line);
            
            if(count($data) >= 4) {
                Lelekszam::create([
                    'varosid' => $data[0],
                    'ev' => $data[1],
                    'no' => $data[2],
                    'osszesen' => $data[3],
                ]);
            }
        }
        echo "Lélekszám adatok sikeresen feltöltve.\n";
    }
}