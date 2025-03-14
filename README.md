<p align="center"><img src="./public/images/logo.png" width="200" alt="PNP Logo"></p>

# SIWAS (Sistem Informasi Pengawasan Internal Kampus)

Aplikasi web berbasis **Laravel 12** untuk mengelola data internal kampus Politeknik Negeri Padang.
## Fitur Utama

- **Manajemen Pengguna & Hak Akses**  
  Menggunakan [Spatie Laravel Permission](https://github.com/spatie/laravel-permission) untuk mengelola peran dan izin dengan dua level: _super admin_ dan _admin_.
  
- **Import/Export Data**  
  Menggunakan [Laravel Excel](https://github.com/Maatwebsite/Laravel-Excel) untuk memudahkan proses import dan export data, misalnya laporan realisasi anggaran.

- **Manajemen Dokumen**  
  Menggunakan [Spatie Laravel Medialibrary](https://github.com/spatie/laravel-medialibrary) untuk pengelolaan file dan dokumen secara otomatis (upload, penyimpanan, transformasi file).

## Teknologi yang Digunakan

- **Laravel 12**  
  Framework PHP modern untuk membangun aplikasi web yang terstruktur.
- **SQLite**  
  Database default yang ringan dan mudah dikonfigurasi, ideal untuk tahap awal pengembangan.
- **Composer**  
  Dependency manager untuk PHP.

## Instalasi

1. **Clone Repository**
```bash
git clone https://github.com/Baghaztra/SIWAS.git
cd SIWAS
```

2. **Install Dependensi**
```bash
composer install
```

3. Konfigurasi Environment Salin file .env.example menjadi .env dan atur konfigurasi jika diperlukan:
 ```bash
 cp .env.example .env
 ```

4. Generate Application Key
```bash
php artisan key:generate
```

5. Migrasi & Seeding (Opsional) Jika sudah ada data awal atau untuk testing, jalankan:
```bash
php artisan migrate --seed
```
6. Jalankan Aplikasi
```bash
php artisan serve
```

Akses aplikasi melalui browser di http://localhost:8000.
