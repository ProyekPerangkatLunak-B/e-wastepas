<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
    </a>
    <a href="https://tailwindcss.com" target="_blank">
        <img src="https://github.com/user-attachments/assets/14234e2d-f5ae-4061-b27b-da955bbfa57c" width="300" alt="Tailwind CSS Logo">
    </a>
</p>

# 🗑️ Proyek E-Wastepas

Proyek ini bertujuan untuk membangun aplikasi web pengelolaan limbah elektronik (**e-waste**) menggunakan **Laravel** untuk backend dan **TailwindCSS** untuk frontend. Aplikasi ini memungkinkan pengguna untuk mengajukan permintaan daur ulang dan melacak status pembuangan limbah elektronik mereka.

---

## 🛠️ Teknologi yang Digunakan

-   **Laravel**: 11.28
-   **Tailwind CSS**: 3
-   **PHP**: 8.3.12
-   **Node.js**: 20.18.0
-   **MySQL**: 8.3.0

---

## 🔗 Coding Standard & Naming Convention

### Coding Standard

Untuk menjaga konsistensi dan keterbacaan kode, kami menggunakan **PSR-1** dan **PSR-4** sebagai standar utama:

-   **PSR-1**: Merupakan standar dasar kode PHP yang merekomendasikan penggunaan coding style yang umum untuk meningkatkan keterbacaan dan kompatibilitas kode PHP di berbagai proyek. PSR-1 mencakup aturan seperti penggunaan `<?php` dan standar nama kelas.

    -   [Link Mengenai PSR-1](https://www.php-fig.org/psr/psr-1/)

-   **PSR-4**: Standar ini mendefinisikan aturan autoloading untuk project PHP menggunakan namespaces. Dengan PSR-4, kelas PHP dapat dipetakan ke file sistem berdasarkan namespace-nya, memudahkan pengelolaan file dan struktur folder.
    -   [Link Mengenai PSR-4](https://www.php-fig.org/psr/psr-4/)
    -   [Contoh PSR-4 Autoloader](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader-examples.md)

### Naming Convention

Untuk menjaga keteraturan dalam penamaan, berikut adalah aturan naming convention yang digunakan di proyek ini:

-   **Controller**: Menggunakan _Pascal Case_ (contoh: `UserController`, `ProductController`).
-   **Database**: Menggunakan _Snake Case_ (semua yang berhubungan dengan database, contoh: `user_data`, `product_list`).
-   **Variable**: Menggunakan _Camel Case_ (contoh: `$userData`, `$productList`).

-   **Model**: Menggunakan _Pascal Case_ (contoh: `User`, `Product`).
-   **Properti Model**: Menggunakan _Snake Case_ (karena berhubungan dengan database, contoh: `user_name`, `created_at`).
-   **Metode Model**: Menggunakan _Camel Case_ (contoh: `getUserData()`, `saveProduct()`).

-   **Blade View**: Menggunakan _Kebab Case_ (contoh: `user-profile.blade.php`, `product-list.blade.php`).

Referensi tambahan mengenai convention di Laravel:  
[Link Sumber](https://webdevetc.com/blog/laravel-naming-conventions/)

---

## 📂 Alat & Sumber Daya

Unduh alat yang diperlukan melalui [link Google Drive ini](https://drive.google.com/drive/u/2/folders/1vTMnaYzjjx-OneLvWd6MSWwhzj2SkoRr).

---

## 🚀 Cara Memulai

### 1️⃣ Clone Proyek dari Repository

Untuk memulai, klon proyek dari GitHub dengan perintah berikut:

```bash
git clone https://github.com/ProyekPerangkatLunak-B/e-waste-ppl-b.git 'nama-proyek'
cd nama-proyek
```

### 2️⃣ Instal Dependensi

-   **PHP dependencies** dengan Composer:

```bash
composer install
```

-   **Node packages** dengan npm:

```bash
npm install
```

### 3️⃣ Konfigurasi Environment

Buat file `.env`:

```bash
cp .env.example .env
php artisan key:generate
```

-   **Konfigurasi Database**: Sesuaikan detail database di file `.env`:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ewaste
DB_USERNAME=root
DB_PASSWORD=
```

Jalankan migrasi database:

```bash
php artisan migrate
```

### 4️⃣ Menjalankan Aplikasi

-   Jalankan server development Laravel:

```bash
php artisan serve
```

-   Jalankan build frontend development:

```bash
npm run dev
```

---

## 🌳 Strategi Branching

### Penamaan Branch

Buat branch baru sesuai dengan tugas yang dikerjakan menggunakan konvensi berikut contohnya:

-   **Frontend Task**: `recycleme-frontend`
-   **Backend Task**: `recycleme-backend`

Contoh:

```bash
git checkout -b recycleme-frontend
```

### Melakukan Commit

Pastikan untuk commit pekerjaan dengan pesan yang jelas dan deskriptif:

```bash
git commit -m "Recycleme-frontend: Menambahkan fitur baru"
```

**Catatan**: Selalu push ke branch masing-masing, **bukan langsung ke `dev`**.

---

## 🔄 Workflow Kolaborasi

### Tarik Perubahan Terbaru

Sebelum memulai pekerjaan, pastikan untuk menarik (pull) perubahan terbaru dari `dev`:

```bash
git checkout dev
git pull
```

Jika tidak bisa menggunakan `git pull` Coba Gunakan ini:

```bash
git pull origin dev
```

### Push Perubahan ke Branch

Setelah menyelesaikan pekerjaan, push perubahan ke branch masing-masing:

```bash
git add .
git commit -m "Pesan commit yang deskriptif"
git push origin nama-branch
```

---

`Last Edited 18/10/24 @e-waste-ppl-b`
