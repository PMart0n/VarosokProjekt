# Városok Projekt -- Telepítési Útmutató

Ez az útmutató segít beüzemelni a projektet egy új gépen (klónozás
után).

## 1. Előfeltételek

A következők legyenek telepítve: - **PHP (\>= 8.2)** - **Composer** -
**MySQL szerver** (pl. XAMPP)

## 2. Telepítés lépései (Parancssorban)

A projekt mappájában állva futtasd sorban az alábbi lépéseket.

### A) Keretrendszer fájlok letöltése

A `vendor` mappa nincs verziókezelésben, ezért pótolni kell:

``` bash
composer install
```

### B) Környezeti változók beállítása

A `.env` fájl hiányzik (biztonsági okokból). Hozd létre a példa alapján.

**Windows:**

``` bash
copy .env.example .env
```

**Mac / Linux:**

``` bash
cp .env.example .env
```

Ezután generálj egy alkalmazáskulcsot:

``` bash
php artisan key:generate
```

### C) Adatbázis kapcsolat

Nyisd meg a létrehozott `.env` fájlt, és módosítsd az adatbázis
beállításokat (példa XAMPP-hoz):

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=varosok_db
    DB_USERNAME=root
    DB_PASSWORD=

### D) Adatbázis és adatok létrehozása

1.  Nyisd meg a **phpMyAdmin**-t.
2.  Hozz létre egy üres adatbázist `varosok_db` néven
    (`utf8mb4_hungarian_ci` illesztéssel).
3.  Futtasd a migrációkat és a seedelő folyamatot:

``` bash
php artisan migrate:fresh --seed
```

## 3. Felhasználói fiókok (Seeding után)

A rendszer automatikusan létrehoz egy admin felhasználót:

-   **Email:** admin@admin.com\
-   **Jelszó:** password

## 4. Indítás

``` bash
php artisan serve
```

