<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center"><a href="https://tailwindcss.com" target="_blank"><img src="https://tailwindcss.com/_next/static/media/tailwindcss-logomark.a51e1a4d6bcfdd4098e12af751b3b2ce.svg" width="400" alt="Tailwind CSS Logo"></a></p>

## Laravel

Laravel adalah kerangka kerja aplikasi web dengan sintaks yang ekspresif dan elegan. Kami percaya bahwa pengembangan harus menjadi pengalaman yang menyenangkan dan kreatif agar benar-benar memuaskan. Laravel menghilangkan rasa sakit dalam pengembangan dengan memudahkan tugas-tugas umum yang digunakan dalam banyak proyek web.

## TailwindCSS

Tailwind CSS adalah kerangka kerja CSS yang mengutamakan utilitas yang dirancang untuk membangun situs web modern dengan menggunakan sekumpulan kelas yang sudah ditentukan sebelumnya secara langsung di dalam HTML Anda. Hal ini memungkinkan pengembang untuk menata komponen dengan cepat tanpa harus menulis CSS kustom untuk setiap elemen. Tailwind bekerja dengan memindai berkas proyek Anda (seperti HTML atau JavaScript), menghasilkan gaya berdasarkan kelas yang Anda gunakan, lalu menulis gaya tersebut ke berkas CSS statis.

## Dokumentasi Proyek

clone project dari github dengan perintah berikut :

```bash
git clone https://github.com/ProyekPerangkatLunak-B/e-waste-ppl-b.git 'project-name'
cd project-name
```

Instal semua PHP dependency dengan menjalankan perintah berikut ini

```bash
composer install
```

Jangan lupa untuk menginstall semua node package yang kita butuhkan seperti:

```bash
npm install
```

Jika ingin dikembangkan, bisa dengan menjalankan

```bash
npm run dev
```

Buat 1 file dengan nama `.env` kemudian silakan copy semua yang ada di dalam file `.env.example` ke dalam file `.env`. Kemudian buka terminal kembali untuk generasi key baru.

```bash
php artisan key:generate
```

Buat 1 database, dan sesuaikan namanya dengan konfigurasi yang ada di file `.env`.

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ewaste
DB_USERNAME=root
DB_PASSWORD=
```

Setelah itu, jalankan perintah berikut pada terminal.

```bash
php artisan migrate
```

Setelah itu, jalankan `php artisan serve` untuk memulai server laravel nya.
dan jalankan juga `npm run dev` untuk rendering bagian front-end nya.

Silakan buat Pull Request jika ingin membuat perubahan, Sesuaikan dengan branch nya masing-masing.
Branch yang tersedia :

- Main (branch utama)
- namakelompok-jobdesk
  contoh frontend :
  'recycleme-frontend'
  contoh backend :
  'recycleme-backend'

## Git Pull dan Git Push setiap mengerjakan

Sebelum lanjut mengerjakan progress di masing-masing branch, kita ganti branch ke main dan git pull dulu :

```bash
git checkout main
git pull
```

Setelah itu, pindah ke branch nya masing-masing :

```bash
git checkout {{ recyleme-frontend , recyleme-backend, ..... }}
```

Setelah itu, jalankan `php artisan serve` untuk memulai server laravel nya.
dan jalankan juga `npm run dev` untuk rendering bagian front-end nya.

Jika sudah mengerjakan, push ke github dengan perintah berikut :

```bash
git init
git add .
git commit -m "task apa saja yang sudah dikerjakan"
git push
```

'Noted Commit : silahkan commit sesuai apa yang sudah dikerjakan sesuai dengan contoh yang diberikan sebagai berikut'
'git commit -m "Recycleme : mengerjakan fitur 1"'

\*jangan push langsung ke main, tapi push ke branch nya masing-masing.

`Last Edited 18/10/24 @e-waste-ppl-b`
