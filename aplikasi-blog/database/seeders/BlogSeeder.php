<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penulis;
use App\Models\KategoriArtikel;
use App\Models\Artikel;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        // Buat Penulis
        $penulis1 = Penulis::create([
            'nama' => 'Ahmad Fauzi',
            'email' => 'ahmad@blog.com',
            'telepon' => '081234567890',
        ]);

        $penulis2 = Penulis::create([
            'nama' => 'Siti Nurhaliza',
            'email' => 'siti@blog.com',
            'telepon' => '081298765432',
        ]);

        $penulis3 = Penulis::create([
            'nama' => 'Budi Santoso',
            'email' => 'budi@blog.com',
            'telepon' => '081345678901',
        ]);

        // Buat Kategori
        $kategori1 = KategoriArtikel::create(['nama_kategori' => 'Teknologi']);
        $kategori2 = KategoriArtikel::create(['nama_kategori' => 'Pemrograman']);
        $kategori3 = KategoriArtikel::create(['nama_kategori' => 'Tutorial']);
        $kategori4 = KategoriArtikel::create(['nama_kategori' => 'Tips & Trik']);

        // Buat Artikel
        Artikel::create([
            'judul' => 'Mengenal Artificial Intelligence dan Masa Depan Teknologi',
            'isi' => "Artificial Intelligence (AI) telah menjadi salah satu topik yang paling banyak dibicarakan dalam dunia teknologi saat ini. Teknologi ini memungkinkan mesin untuk belajar dari pengalaman, menyesuaikan diri dengan input baru, dan melakukan tugas-tugas yang biasanya membutuhkan kecerdasan manusia.\n\nAI digunakan dalam berbagai bidang, mulai dari asisten virtual seperti Siri dan Alexa, hingga sistem rekomendasi di platform streaming seperti Netflix dan Spotify. Di bidang kesehatan, AI membantu dalam diagnosis penyakit dan pengembangan obat baru.\n\nDengan perkembangan yang pesat, AI diperkirakan akan mengubah cara kita bekerja, belajar, dan berinteraksi dalam kehidupan sehari-hari. Namun, penting juga untuk memahami tantangan dan implikasi etis yang menyertainya.",
            'gambar' => 'ai_tech.png',
            'id_penulis' => $penulis1->id,
            'id_kategori' => $kategori1->id,
        ]);

        Artikel::create([
            'judul' => 'Panduan Lengkap Belajar Laravel untuk Pemula',
            'isi' => "Laravel adalah framework PHP yang paling populer saat ini. Framework ini menyediakan sintaks yang elegan dan ekspresif untuk pengembangan web. Dengan Laravel, Anda dapat membangun aplikasi web modern dengan cepat dan efisien.\n\nBeberapa fitur unggulan Laravel meliputi:\n- Eloquent ORM untuk manajemen database\n- Blade templating engine yang powerful\n- Artisan CLI untuk otomasi tugas\n- Migration dan seeding untuk manajemen skema database\n- Middleware untuk filter HTTP request\n\nUntuk memulai belajar Laravel, Anda perlu memahami dasar-dasar PHP, HTML, CSS, dan konsep MVC (Model-View-Controller). Setelah itu, Anda bisa langsung mencoba membuat proyek sederhana seperti blog atau aplikasi CRUD.",
            'gambar' => 'laravel_guide.png',
            'id_penulis' => $penulis2->id,
            'id_kategori' => $kategori2->id,
        ]);

        Artikel::create([
            'judul' => 'Cara Membuat REST API dengan Laravel',
            'isi' => "REST API (Representational State Transfer Application Programming Interface) adalah arsitektur yang memungkinkan komunikasi antar sistem melalui protokol HTTP. Laravel menyediakan tools yang sangat baik untuk membangun REST API.\n\nLangkah-langkah membuat REST API dengan Laravel:\n1. Install Laravel dan konfigurasi database\n2. Buat model dan migration\n3. Buat controller menggunakan artisan\n4. Definisikan route di routes/api.php\n5. Implementasi CRUD operation\n6. Tambahkan validasi dan error handling\n7. Testing menggunakan Postman\n\nDengan mengikuti langkah-langkah di atas, Anda dapat membangun REST API yang robust dan scalable untuk berbagai keperluan aplikasi.",
            'gambar' => 'rest_api.png',
            'id_penulis' => $penulis1->id,
            'id_kategori' => $kategori2->id,
        ]);

        Artikel::create([
            'judul' => 'Tutorial: Membangun Aplikasi To-Do List dengan JavaScript',
            'isi' => "Dalam tutorial ini, kita akan membangun aplikasi To-Do List sederhana menggunakan HTML, CSS, dan JavaScript murni. Aplikasi ini akan memiliki fitur menambah, menghapus, dan menandai tugas yang sudah selesai.\n\nStruktur HTML yang kita butuhkan:\n- Input field untuk menambah tugas baru\n- Tombol untuk menambahkan tugas\n- Daftar tugas yang ditampilkan\n- Tombol hapus dan checkbox untuk setiap tugas\n\nJavaScript akan menangani logika aplikasi seperti:\n- Menambah item ke daftar\n- Menghapus item dari daftar\n- Toggle status selesai/belum\n- Menyimpan data ke localStorage\n\nTutorial ini cocok untuk pemula yang ingin memahami dasar-dasar DOM manipulation dan event handling di JavaScript.",
            'gambar' => 'js_todo.png',
            'id_penulis' => $penulis3->id,
            'id_kategori' => $kategori3->id,
        ]);

        Artikel::create([
            'judul' => '10 Tips Meningkatkan Produktivitas sebagai Developer',
            'isi' => "Menjadi developer yang produktif bukan hanya tentang menulis kode lebih cepat, tetapi juga tentang bekerja dengan lebih cerdas. Berikut adalah 10 tips yang bisa membantu Anda:\n\n1. Gunakan keyboard shortcuts - Pelajari shortcut IDE Anda\n2. Automasi tugas berulang - Gunakan script untuk tugas rutin\n3. Pomodoro Technique - Bekerja dalam interval 25 menit\n4. Code review - Belajar dari kode orang lain\n5. Version control - Selalu gunakan Git\n6. Dokumentasi - Tulis dokumentasi yang jelas\n7. Testing - Tulis unit test untuk kode Anda\n8. Istirahat teratur - Jaga kesehatan mata dan tubuh\n9. Continuous learning - Ikuti perkembangan teknologi\n10. Community - Bergabung dengan komunitas developer\n\nDengan menerapkan tips-tips ini secara konsisten, Anda akan melihat peningkatan signifikan dalam produktivitas kerja Anda.",
            'gambar' => 'dev_productivity.png',
            'id_penulis' => $penulis2->id,
            'id_kategori' => $kategori4->id,
        ]);

        Artikel::create([
            'judul' => 'Memahami Konsep Database Relasional dan SQL',
            'isi' => "Database relasional adalah jenis database yang mengorganisir data ke dalam tabel-tabel yang saling berhubungan. SQL (Structured Query Language) adalah bahasa standar yang digunakan untuk mengelola dan memanipulasi data dalam database relasional.\n\nKonsep dasar database relasional:\n- Tabel: Kumpulan data yang terorganisir dalam baris dan kolom\n- Primary Key: Identifier unik untuk setiap baris\n- Foreign Key: Menghubungkan antar tabel\n- Normalisasi: Proses mengorganisir data untuk mengurangi redundansi\n\nPerintah SQL yang sering digunakan:\n- SELECT: Mengambil data\n- INSERT: Menambah data\n- UPDATE: Mengubah data\n- DELETE: Menghapus data\n- JOIN: Menggabungkan data dari beberapa tabel\n\nPemahaman yang baik tentang database relasional dan SQL sangat penting bagi setiap developer.",
            'gambar' => 'db_sql.png',
            'id_penulis' => $penulis3->id,
            'id_kategori' => $kategori1->id,
        ]);

        Artikel::create([
            'judul' => 'Pengenalan Framework CSS Bootstrap 5',
            'isi' => "Bootstrap 5 adalah framework CSS yang paling populer untuk membangun website yang responsif dan mobile-first. Versi terbaru ini membawa banyak perubahan signifikan dibandingkan versi sebelumnya.\n\nFitur baru di Bootstrap 5:\n- Tidak lagi bergantung pada jQuery\n- Sistem grid yang ditingkatkan\n- Komponen baru seperti offcanvas dan accordion\n- Utilitas CSS yang diperluas\n- RTL (Right-to-Left) support\n- Updated forms dan form controls\n\nUntuk memulai menggunakan Bootstrap 5, Anda cukup menambahkan link CDN ke file HTML Anda, atau menginstallnya melalui npm. Bootstrap menyediakan berbagai komponen siap pakai seperti navbar, card, modal, carousel, dan masih banyak lagi.\n\nDengan Bootstrap, Anda dapat membangun website yang profesional dan responsif dengan lebih cepat.",
            'gambar' => 'bootstrap_css.png',
            'id_penulis' => $penulis1->id,
            'id_kategori' => $kategori3->id,
        ]);

        Artikel::create([
            'judul' => 'Tips Keamanan Aplikasi Web yang Wajib Diketahui',
            'isi' => "Keamanan aplikasi web adalah aspek yang sangat krusial dalam pengembangan software. Berikut adalah beberapa tips keamanan yang wajib diketahui oleh setiap developer web:\n\n1. SQL Injection Prevention - Selalu gunakan prepared statements\n2. XSS (Cross-Site Scripting) - Escape output data\n3. CSRF Protection - Gunakan token CSRF\n4. HTTPS - Selalu gunakan koneksi terenkripsi\n5. Input Validation - Validasi semua input dari pengguna\n6. Password Hashing - Jangan simpan password dalam plain text\n7. Rate Limiting - Batasi jumlah request per waktu\n8. Security Headers - Konfigurasikan header keamanan\n\nLaravel sudah menyediakan banyak fitur keamanan bawaan seperti CSRF protection, SQL injection prevention melalui Eloquent, dan password hashing menggunakan bcrypt. Namun, developer tetap perlu waspada dan mengikuti best practices keamanan.",
            'gambar' => 'web_security.png',
            'id_penulis' => $penulis2->id,
            'id_kategori' => $kategori4->id,
        ]);
    }
}
