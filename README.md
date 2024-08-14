# Aplikasi E-Commerce

## Deskripsi

Aplikasi e-commerce ini dibangun menggunakan Laravel, Jetstream, Livewire, dan EasyPanel. Aplikasi ini menyediakan fitur untuk mengelola produk, pengguna, dan transaksi dengan antarmuka admin yang mudah digunakan.

## Fitur

- Manajemen Produk
- Manajemen Pengguna
- Manajemen Transaksi
- Antarmuka Admin dengan EasyPanel
- Autentikasi dan Registrasi dengan Jetstream

## System Requirements
- "Mysql/Wamp64"
- "php": "^8.1",
- "guzzlehttp/guzzle": "^7.2",
- "laravel/framework": "^10.0",
- "laravel/jetstream": "^4.3",
- "laravel/sanctum": "^3.2",
- "laravel/tinker": "^2.8",
- "livewire/livewire": "2.12",
- "rezaamini-ir/laravel-easypanel": "2.3"
## Instalasi

Ikuti langkah-langkah di bawah ini untuk mengatur proyek secara lokal.

1. **Clone repository:**

   ```bash
   git clone https://github.com/sahid10/laravelpanel.git
   cd laravelpanel

2. **Install Dependensi:**

    ```bash
    composer install
    npm install

3. **Konfigurasi lingkungan:** 
    *[Salin .env.example ke .env dan sesuaikan pengaturannya & Generate application key:]

    ```bash
    cp .env.example .env
    php artisan key:generate --ansi

4. **Jalankan migrasi:**

    ```bash
    php artisan migrate

5. **Instal Jetstream dan EasyPanel:**

    ```bash
    php artisan jetstream:install livewire

6. **konfigurasi Livewire dan easypanel**

    ```bash
    composer require livewire/livewire:^2.12
    composer require rezaamini-ir/laravel-easypanel:^2.3

7. **Bangun aset frontend:**

    ```bash
    npm run dev

8. **Jalankan aplikasi:**

    ```bash
    php artisan serve
