<?php
// File: functions.php

/**
 * Mengalkulasi total nilai aset gudang dari sebuah produk
 */
function hitungTotalNilaiStok($harga, $stok) {
    return $harga * $stok;
}

/**
 * Menyaring dan mengembalikan warna baris tabel jika stok kritis (< 3)
 */
function statusWarnaStok($stok) {
    if ($stok < 3) {
        return "background-color: #ffe6e6; color: #cc0000;"; // Warna merah muda untuk penanda visual
    }
    return ""; // Mengembalikan string kosong jika stok aman
}
?>