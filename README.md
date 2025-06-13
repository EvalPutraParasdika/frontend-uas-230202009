# PBF FrontEnd UAS 

Ini adalah pekerjaan UAS ubtuk Mata Kuliah PBF

# Laravel 


## Fitur

-   Manajemen data Mahasiswa
-   Manajemen data Mata Kuliah

## Teknologi yang Digunakan

-   [Laravel](https://laravel.com/) - Framework PHP 
-   [Bootstrap](https://getbootstrap.com/) - Framework CSS untuk desain responsif

## Instalasi

Ikuti langkah-langkah berikut untuk menjalankan proyek ini secara lokal:

1. **Kloning repositori:**

```bash
    git clone https://github.com/EvalPutraParasdika/frontend-uas-230202009.git
    cd PBF_FrontEnd_Kelompok3
```
2. **Instalasi dependensi PHP:**
```bash
composer install
```

3. **Salin file .env dan konfigurasi:**
```bash
cp .env.example .env
```

Sesuaikan konfigurasi database dan lainnya di file .env sesuai dengan lingkungan Anda.

4. **Jalankan server pengembangan:**

```bash
php artisan serve
```

## Struktur Direktori
- app/ - Berisi file controller, model, dan lainnya

- resources/views/ - Berisi file blade templates untuk tampilan

- routes/web.php - Berisi definisi route aplikasi

- public/ - Berisi file publik seperti index.php, asset, dll.

- database/ - Berisi migrasi dan seeder database
