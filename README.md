# Aplikasi E-Commerce

## Deskripsi

Aplikasi e-commerce ini dibangun menggunakan Laravel, Jetstream, Livewire, dan EasyPanel. Aplikasi ini menyediakan fitur untuk mengelola produk, pengguna, dan transaksi dengan antarmuka admin yang mudah digunakan.

## Fitur

- Manajemen Produk
- Manajemen Pengguna
- Manajemen Transaksi
- Antarmuka Admin dengan EasyPanel
- Autentikasi dan Registrasi dengan Jetstream

## Instalasi

Ikuti langkah-langkah di bawah ini untuk mengatur proyek secara lokal.

1. **Clone repository:**

   ```bash
   git clone https://github.com/sahid10/laravelpanel.git
   cd laravelpanel

2. **Install Dependensi:**

    composer install
    npm install

3. **Konfigurasi lingkungan:** 
    *[Salin .env.example ke .env dan sesuaikan pengaturannya:]

    cp .env.example .env

    *[Generate application key:]

    php artisan key:generate --ansi

4. **Jalankan migrasi:**

    php artisan migrate

5. **Instal Jetstream dan EasyPanel:**

    php artisan jetstream:install livewire

6. **konfigurasi Livewire dan easypanel**

    composer require livewire/livewire:^2.12

    composer require rezaamini-ir/laravel-easypanel:^2.3

7. **Bangun aset frontend:**

    npm run dev
8. **Jalankan aplikasi:**

php artisan serve
