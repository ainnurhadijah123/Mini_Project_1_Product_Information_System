### Cetak Biru (Blueprint) Arsitektur Konseptual

#### 1. Data Layer (`products.php`)
**Fokus Utama:** Manajemen memori untuk penyimpanan *state* / data produk mentah.

*   **Tipe Struktur Data:** Array Multidimensi (koleksi bersarang).
*   **Bentuk Representasi:** Tabel logika di mana satu variabel wadah (misalnya: *katalogProduk*) akan menampung banyak baris produk. Setiap baris produk didefinisikan menggunakan Array Asosiatif (berbasis kata kunci).
*   **Atribut (Key) Konseptual Tiap Produk:**
    *   `ID` (Tipe Teks) - Penanda unik produk.
    *   `Nama` (Tipe Teks) - Label identitas komoditas.
    *   `Kategori` (Tipe Teks) - Klasifikasi produk.
    *   `Harga` (Tipe Angka Bulat) - Nilai jual satuan.
    *   `Stok` (Tipe Angka Bulat) - Ketersediaan barang.
    *   `Deskripsi` (Tipe Teks) - Penjelasan spesifikasi.
*   **Logika Sistem:** Berkas ini tidak boleh memiliki perulangan atau kalkulasi matematika. Murni bertindak sebagai basis data statis (repositori data).

#### 2. Processing Layer (`functions.php`)
**Fokus Utama:** Pemrosesan logika bisnis dan kalkulasi matematis aplikasi.

*   **Modul 1: Kalkulasi Aset**
    *   **Nama Fungsi:** `hitungTotalNilaiStok()`.
    *   **Parameter Masukan (Input):** Membutuhkan dua data saat dipanggil, yaitu *Harga* dan *Stok*.
    *   **Logika Internal:** Mengalikan nilai *Harga* dengan nilai *Stok*.
    *   **Keluaran (Return):** Hasil perkalian (Total Nilai Aset) yang siap diserahkan kembali kepada pemanggil fungsi.
*   **Modul 2: Evaluasi Status Kritis**
    *   **Tujuan:** Menyaring warna baris tabel jika stok kritis (< 3).
    *   **Parameter Masukan (Input):** Membutuhkan satu data, yaitu *Stok*.
    *   **Logika Kondisional (If-Else):**
        *   **JIKA** (IF) nilai Stok kurang dari (<) 3, **MAKA** kembalikan label/kode warna peringatan (misalnya: penanda CSS warna merah).
        *   **SEBALIKNYA** (ELSE), kembalikan nilai kosong (menggunakan warna reguler/standar).

#### 3. Presentation Layer (`index.php`)
**Fokus Utama:** Pemisahan *layout* antarmuka (UI) dan perajutan (penggabungan) arsitektur modular.

*   **Tahap 1: Modularitas (Import Sistem)**
    *   Instruksikan sistem menggunakan logika **require_once** untuk memuat `products.php`. (Menggunakan *require* bersifat mutlak: jika berkas data hilang, aplikasi akan memicu *Fatal Error* dan tidak akan merender tampilan yang rusak).
    *   Instruksikan sistem menggunakan logika **require_once** untuk memuat `functions.php`.
*   **Tahap 2: Kerangka Antarmuka**
    *   Siapkan struktur kerangka tabel *layout* HTML standar yang berisi kolom-kolom penampung sesuai atribut data.
*   **Tahap 3: Traversal / Pengeksekusian Data**
    *   Lakukan perulangan menggunakan sistem **foreach** untuk menyusuri (*traversal*) seluruh koleksi produk yang ada di Data Layer (`products.php`) dari urutan pertama hingga terakhir.
    *   **Di dalam blok perulangan:**
        1. Panggil fungsi pengecek status stok dari Processing Layer (`functions.php`). Sisipkan hasilnya ke pengaturan latar belakang baris tabel saat ini.
        2. Cetak data statis (ID, Nama, Kategori, Harga, Stok, Deskripsi) ke dalam sel-sel kolom.
        3. Panggil fungsi `hitungTotalNilaiStok()` dengan membawa data *Harga* dan *Stok* produk saat ini, lalu cetak hasil keluarannya ke sel tabel untuk kolom Total Aset.
*   Tahap eksekusi selesai saat koleksi produk habis terbaca oleh sistem.