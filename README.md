<p align="center"><img src="./public/assets/images/logo.png" width="200" alt="PNP Logo"></p>

# Satuan Pengawas Internal | PNP

Aplikasi web berbasis **Laravel 12** untuk mengelola data internal kampus Politeknik Negeri Padang.

## Teknologi Penjunjang

- **Antarmuka Pengguna**  
  Menggunakan [Bootstrap](https://getbootstrap.com/) untuk membangun antarmuka pengguna yang responsif dan modern.

- **Manajemen Dokumen**  
  Menggunakan [Spatie Laravel Medialibrary](https://github.com/spatie/laravel-medialibrary) untuk pengelolaan file dan dokumen.

## Instalasi

1. Clone Repository
```bash
git clone https://github.com/Baghaztra/SPI-PNP.git
cd SPI-PNP
```

2. Install Dependensi
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

5. Migrasi & Seeding:
```bash
php artisan migrate --seed
```

6. Membuat tempat penyimpanan:
```bash
php artisan storage:link
```

7. Jalankan Aplikasi
```bash
php artisan serve
```

## Masuk ke Aplikasi

1. Akses aplikasi melalui browser di [http://localhost:8000](http://localhost:8000)

2. Masuk ke laman SIWAS dari menu di nav bar

3. Login dengan username `admin@gmail.com` dan password `12qwaszx`

## Credits
&copy; Baghaztra van Ril & Firman Ardiansyah
