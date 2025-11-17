# Városok Projekt - Telepítési Útmutató

Ez az útmutató segít beüzemelni a projektet egy új gépen (klónozás után).

## 1. Előfeltételek
Legyen telepítve:
- PHP (>= 8.2)
- Composer
- Node.js & NPM
- MySQL szerver (pl. XAMPP)

## 2. Telepítés lépései (Parancssorban)

A projekt mappájában állva futtasd le ezeket sorban:

### A) Keretrendszer fájlok letöltése
Mivel a `vendor` mappa nincs feltöltve, ezt pótolni kell:
composer install

# B)Környezeti változók beállítása
A .env fájl hiányzik (biztonsági okokból), létre kell hozni a példa alapján:
Windows:
copy .env.example .env
Mac / Linux:
cp .env.example .env

Ezután generálj egy titkosító kulcsot:
php artisan key:generate

# C) Adatbázis kapcsolat
Nyisd meg a létrehozott .env fájlt, és írd át az adatbázis beállításokat:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=varosok_db
DB_USERNAME=root
DB_PASSWORD=

# D) Adatbázis és Adatok létrehozása:
Nyisd meg a phpMyAdmin-t, és hozz létre manuálisan egy üres adatbázist varosok_db néven (utf8mb4_hungarian_ci illesztéssel).

Futtasd le ezt a parancsot, ami létrehozza a táblákat (Migráció) és feltölti az adatokkal a txt fájlokból (Seeding):
php artisan migrate:fresh --seed
(Ha minden zöld, akkor sikeres volt a feltöltés).

