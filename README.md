# Mini Project 1: Product Information System (Desain Konseptual)

## Deskripsi Proyek
Proyek ini merupakan dokumentasi cetak biru (*blueprint*) untuk merancang arsitektur Sistem Manajemen Data Informasi Produk. 

## Struktur Arsitektur Sistem

Arsitektur aplikasi dibagi menjadi 3 komponen utama:

### 1. Data Layer (`products.php`)
Berfungsi sebagai repositori memori atau basis data statis.
*   **Struktur:** Multidimensional Associative Array.
*   **Isi Data:** Menampung baris-baris data komoditas produk (ID, Nama, Kategori, Harga, Stok, Deskripsi).
*   **Aturan:** Tidak boleh memuat instruksi perulangan (*loop*) atau kalkulasi apa pun.

### 2. Processing Layer (`functions.php`)
Berfungsi sebagai otak atau mesin pemroses logika bisnis aplikasi. Memuat modul-modul fungsi konseptual:
*   `hitungTotalNilaiStok()`: Mengalkulasi nilai aset dengan mengalikan *Harga* dan *Stok*.
*   **Evaluasi Stok Kritis**: Logika kondisional (*If-Else*) yang bertugas menyaring dan memberikan penanda warna khusus pada baris tabel jika stok produk berada di bawah batas minimum (< 3).

### 3. Presentation Layer (`index.php`)
Berfungsi sebagai antarmuka pengguna (UI) yang merajut seluruh komponen.
*   **Integrasi:** Menggunakan logika `require_once` (dengan toleransi *Fatal Error*) untuk memuat `products.php` dan `functions.php` secara ketat.
*   **Rendering (Tampilan):** Menyiapkan struktur tabel HTML dasar, lalu menggunakan sistem perulangan `foreach` untuk menyusuri (*traversing*) seluruh data produk dan mencetaknya ke dalam layar.

## Panduan Penggunaan
Dokumen arsitektur ini disusun sebagai landasan atau purwarupa (prototipe) logika sebelum masuk ke fase implementasi kode (Sesi *Live Coding*). Anda dapat membaca berkas desain utamanya (seperti `PRD.md` atau dokumen cetak biru yang disertakan) untuk memahami alur kerja aplikasi secara keseluruhan.