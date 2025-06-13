# PBF FrontEnd Kelompok 3

Repositori ini merupakan bagian dari proyek akhir mata kuliah Pemrograman Berbasis Framework (PBF) yang dikembangkan oleh Kelompok 3. Proyek ini dibangun menggunakan Laravel sebagai framework frontend untuk menyajikan antarmuka pengguna untuk mengelola data mahasiswa, dosen, staff, jurusan, program studi, dan pengajuan cuti.

# Laravel 


## Fitur

-   Manajemen data Mahasiswa
-   Manajemen data Dosen
-   Manajemen data Staff
-   Manajemen data Jurusan
-   Manajemen data Program Studi
-   Pengajuan dan manajemen cuti mahasiswa
-   Dashboard statistik jumlah entitas

## Teknologi yang Digunakan

-   [Laravel](https://laravel.com/) - Framework PHP 
-   [Bootstrap](https://getbootstrap.com/) - Framework CSS untuk desain responsif

## Instalasi

Ikuti langkah-langkah berikut untuk menjalankan proyek ini secara lokal:

1. **Kloning repositori:**

```bash
    git clone https://github.com/EvalPutraParasdika/PBF_FrontEnd_Kelompok3.git
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
