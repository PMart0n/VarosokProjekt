# Városok Projekt - Beadandó Feladat

Ez a Laravel alapú webalkalmazás a Web-programozás II. tárgy beadandó feladata.

## 🌐 Éles Megtekintés (Nethely)
Az alkalmazás elérhető és kipróbálható az alábbi linken:
**[http://varosokprojekt.nhely.hu](http://varosokprojekt.nhely.hu)**

---

## 🛠️ Helyi Telepítési Útmutató
Ha le szeretné futtatni a kódot saját gépen, kövesse az alábbi lépéseket.

### 1. Előfeltételek
Legyen telepítve:
- PHP (>= 8.2)
- Composer
- MySQL szerver (pl. XAMPP)

### 2. Telepítés lépései (Parancssorban)

A projekt mappájában állva futtasd le ezeket sorban:

#### A) Keretrendszer fájlok letöltése
Mivel a `vendor` mappa nincs verziókezelésben, ezt pótolni kell:

    composer install

#### B) Környezeti változók beállítása
A `.env` fájl létrehozása a sablonból:

Windows:

    copy .env.example .env

Mac / Linux:

    cp .env.example .env

Ezután generálj egy titkosító kulcsot:

    php artisan key:generate

#### C) Adatbázis kapcsolat
Nyisd meg a létrehozott `.env` fájlt, és írd át az adatbázis beállításokat a helyi környezetnek megfelelően (pl. XAMPP):

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=varosok_db
    DB_USERNAME=root
    DB_PASSWORD=

#### D) Adatbázis és Adatok létrehozása
1. Nyisd meg a **phpMyAdmin**-t.
2. Hozz létre manuálisan egy üres adatbázist **`varosok_db`** néven (`utf8mb4_hungarian_ci` illesztéssel).
3. Futtasd le ezt a parancsot a terminálban (ez létrehozza a táblákat és feltölti adatokkal):

    php artisan migrate:fresh --seed

### 3. Felhasználói Fiókok (Seeding után)
A rendszer automatikusan létrehoz egy admin felhasználót a teszteléshez:
* **Email:** `admin@admin.com`
* **Jelszó:** `password`

### 4. Indítás
A fejlesztői szerver indítása:

    php artisan serve