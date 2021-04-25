# FAKENET

Aplikasi pendataan berlangganan Wi-Fi dibuat dengan Framework Laravel 8. Dan dengan laporan berbentuk excel. <br>

Beberapa CRUD menggunakan modal dan AJAX untuk pengambilan data agar mengurangi penggunaan pindah halaman.

### Prasyarat

Berikut beberapa hal yang perlu diinstal terlebih dahulu:

-   Composer (https://getcomposer.org/)
-   PHP 8.x
-   MySQL 15.x
-   XAMPP

Jika Anda menggunakan XAMPP, untuk PHP dan MySQL sudah menjadi 1 (bundle) didalam aplikasi XAMPP.

### Fitur

-   CRUD Data Klien
-   CRUD Data Paket Internet
-   CRUD Data Administrator Aplikasi
-   CRUD Data Tagihan
-   Laporan Rekapitulasi

### Preview Gambar

_Dashboard_
![Dashboard](https://i.imgur.com/8Qth60f.png)

_Daftar Klien_
![Daftar Klien](https://i.imgur.com/prA0trg.png)

_Daftar Paket Internet_
![Daftar Paket Internet](https://i.imgur.com/lwtimMq.png)

_Daftar Administrator Aplikasi_
![Daftar Administrator Aplikasi](https://i.imgur.com/YulMyHK.png)

_Daftar Tagihan_
![Daftar Tagihan](https://i.imgur.com/058nEXk.png)

### Langkah-langkah instalasi

-   Clone repository ini

HTTPS

```
$ https://github.com/mrizkimaulidan/fakenet.git
```

SSH

```
$ git@github.com:mrizkimaulidan/fakenet.git
```

-   Install seluruh packages yang dibutuhkan

```
$ composer install
```

-   Siapkan database dan atur file .env sesuai dengan konfigurasi Anda
-   Ubah value APP_NAME= pada file .env menjadi nama aplikasi yang anda inginkan
-   Jika sudah, migrate seluruh migrasi dan seeding data

```
$ php artisan migrate --seed
```

-   Ketik perintah dibawah ini untuk membuat cache baru dari beberapa konfigurasi yang telah diubah

```
$ php artisan optimize
```

-   Jalankan local server

```
$ php artisan serve
```

-   Akses ke halaman

```
http://127.0.0.1:8000
```

---

-   User default aplikasi untuk login

##### Administrator

```
Email       : admin@mail.com
Password    : secret
```

##### Penagih

```
Email       : penagih@mail.com
Password    : secret
```

### Dibuat dengan

-   [Laravel](https://laravel.com) - Backend Framework
-   [Bootstrap](https://getbootstrap.com) - Frontend Framework
-   [SB Admin 2](https://startbootstrap.com/theme/sb-admin-2) - Dashboard Template
