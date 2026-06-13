# Web CMS - Sistem Manajemen Blog (UAS Pemrograman Web)

### 👤 Identitas Mahasiswa
- **Nama**: Fahmi Zaki Darmawan
- **NIM**: 240605110239
- **Mata Kuliah**: Pemrograman Web (UAS)

---

Proyek ini adalah sistem **Web CMS (Content Management System)** untuk publikasi artikel blog, yang memisahkan peran pengguna antara **Administrator** (akses penuh) dan **User/Kontributor** (akses baca-saja). Halaman depan (publik) dapat diakses tanpa login, sedangkan manajemen konten dikelola melalui dasbor admin yang aman.

---

## 🛠️ Fitur Utama

- **Halaman Pengunjung Publik**:
  - Beranda dinamis menampilkan 5 artikel terbaru dengan kategori topik.
  - Halaman detail artikel yang menampilkan konten lengkap dan widget artikel terkait.
- **Pemisahan Peran & Otorisasi**:
  - **Admin**: Hak CRUD penuh untuk mengelola artikel, kategori topik, dan penulis.
  - **User**: Hak akses baca-saja (read-only) untuk memantau data di CMS.
- **Desain UI/UX Premium**:
  - Halaman login dark-mode modern dengan efek kartu melayang dan aksen gradasi oranye.
  - Halaman Dasbor dengan statistik interaktif, daftar tulisan terbaru, dan menu aksi cepat.
- **Navigasi Terintegrasi**:
  - Tombol login/logout otomatis menyesuaikan status autentikasi di bilah navigasi utama.

---

## 🔑 Akun Demo (Kredensial Default)

Aplikasi telah dilengkapi seeder data dengan akun pengujian berikut:

| Peran (Role) | Alamat Email | Kata Sandi | Otorisasi / Hak Akses |
| :--- | :--- | :--- | :--- |
| **Administrator** | `admin@webcms.com` | `password` | CRUD artikel, kategori, & penulis |
| **Penulis Biasa** | `user@webcms.com` | `password` | Tinjau data dasbor (Read-Only) |

---

## 🚀 Cara Menjalankan Proyek secara Lokal

### 1. Prasyarat
Pastikan komputer Anda sudah terinstal:
- PHP >= 8.2 (dilengkapi extension SQLite/PDO)
- Composer
- Node.js & NPM
- XAMPP / Laragon (jika menggunakan database MySQL, namun default proyek ini menggunakan SQLite)

---

### 2. Langkah Instalasi

1. **Instal Dependensi Backend (Composer)**:
   ```bash
   composer install
   ```

2. **Instal Dependensi Frontend (NPM)**:
   ```bash
   npm install
   ```

3. **Konfigurasi Environment**:
   Salin berkas `.env.example` menjadi `.env`:
   ```bash
   cp .env.example .env
   ```
   Generate application key:
   ```bash
   php artisan key:generate
   ```

4. **Konfigurasi Database (SQLite)**:
   Secara default, database menggunakan SQLite. Jika file database belum ada, buat file kosong `database.sqlite` di dalam folder `database/` atau jalankan perintah migrasi. Pastikan baris database di `.env` disesuaikan seperti berikut:
   ```env
   DB_CONNECTION=sqlite
   ```

5. **Migrasi dan Seed Database**:
   Jalankan migrasi tabel beserta data demo bawaan (seperti artikel, kategori, dan penulis):
   ```bash
   php artisan migrate --seed
   ```

6. **Menghubungkan Storage Link**:
   Buat tautan simbolis agar berkas gambar artikel di `storage/app/public` dapat diakses secara publik:
   ```bash
   php artisan storage:link
   ```

7. **Kompilasi Aset Frontend (Tailwind/Vite)**:
   Lakukan kompilasi aset untuk produksi:
   ```bash
   npm run build
   ```

8. **Jalankan Server Lokal**:
   Jalankan server bawaan Laravel Artisan:
   ```bash
   php artisan serve
   ```
   Aplikasi kini dapat diakses di browser melalui alamat: [http://localhost:8000](http://localhost:8000)
