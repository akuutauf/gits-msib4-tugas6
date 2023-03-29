
# Project Mini Boss - Task 6th (E-commerce with CMS)

Aplikasi Otaku Store ini merupakan pengembangan tahap lanjut dari tugas ke 5 dari assignment Gits, di mana project app ini mengimplementasikan e-commerce sederhana dari materi, pengembangan dan pembelajaran mandiri Saya.


# Introduction 👋

Name : Taufik Hidayat

College : Politeknik Negeri Banyuwangi
## Features

- CRUD Product, Category & Cart
- CMS Admin
- Upload Image Product using Storage
- Native Authentication (Register, Login & Logout Session) using MVC

## Function Features

- Untuk manajemen data produk dan kategori lebih mudah dan efisien oleh Admin Kemudian untuk memberikan mengimplementasi mini e-commerce untuk menambahkan produk ke dalam keranjang
- Memudahkan admin dan memberikan keamanan agar data produk dan kategori hanya bisa diakses oleh end user yang sudah memiliki akun admin (akun general)
- Terdapat fungsionalitas upload gambar pada produk, agar produk lebih menarik dan lebih meyakinkan dari sisi customer dengan menggunakan library Storage
- Memberikan keamanan agar data pada sistem aplikasi tidak diakses oleh sembarang user
## Installation

- clone this project with your terminal
```bash
  git clone https://github.com/akuutauf/gits-msib4-tugas6.git
```
- install composer
```bash
  composer install
```
- konfigurasi file .env
```bash
  cp .env.example .env
```
- buat database db_tugas_6 pada php my admin (mysql)
```bash
  create database db_tugas_6;
```
- setting nama database & port mysql (on my)
```bash
  database = db_tugas_6
  port = 3307
```
- jalankan migration pada terminal project
```bash
  php artisan migrate
```
- atau bisa import file database db_tugas_6 pada project ke php my admin
- buat link folder storage ke dalam folder public
```bash
  php artisan storage:link
```
- jalankan aplikasi
```bash
  php artisan serve
```
- sebelum melakukan login maka daftar pada halaman registrasi
```bash
  127.0.0.1:8000/register
```
- setelah itu aplikasi siap digunakan
## Support

For support, email taufikhidayat09121@gmail.com or dm on my instagram @akuutauf. Thank you

