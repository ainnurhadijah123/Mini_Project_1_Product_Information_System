<?php
// File: index.php
require_once 'products.php';
require_once 'functions.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Information System</title>
    <!-- Mengimpor font modern 'Inter' dari Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #f3f4f6;
            --card-bg: #ffffff;
            --text-main: #1f2937;
            --text-muted: #6b7280;
            --border-color: #e5e7eb;
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-main);
            padding: 40px 20px;
            margin: 0;
            display: flex;
            justify-content: center;
        }
        .container {
            width: 100%;
            max-width: 1100px;
        }
        .header {
            margin-bottom: 24px;
        }
        .header h2 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
            color: #111827;
        }
        .header p {
            margin: 4px 0 0 0;
            color: var(--text-muted);
            font-size: 14px;
        }
        .table-card {
            background-color: var(--card-bg);
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            border: 1px solid var(--border-color);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }
        th, td {
            padding: 16px 24px;
            border-bottom: 1px solid var(--border-color);
        }
        th {
            background-color: #f9fafb;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-muted);
            font-weight: 600;
        }
        tr:last-child td {
            border-bottom: none;
        }
        tr:hover {
            background-color: #f9fafb;
        }
        .product-name {
            font-weight: 500;
            color: #111827;
        }
        .category-badge {
            background-color: #e0f2fe;
            color: #0369a1;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 500;
        }
        .currency {
            font-family: 'Inter', sans-serif;
            font-variant-numeric: tabular-nums;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <h2>Inventori Produk Gudang</h2>
            <p>Sistem informasi manajemen aset dan status stok komoditas.</p>
        </div>
        
        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga Satuan</th>
                        <th>Stok</th>
                        <th>Total Nilai Aset</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($katalogProduk as $produk) : ?>
                        <!-- Fungsi statusWarnaStok() tetap bekerja memberikan highlight merah jika stok < 3 -->
                        <tr style="<?php echo statusWarnaStok($produk['Stok']); ?>; transition: all 0.2s;">
                            <td style="color: #6b7280; font-size: 14px;"><?php echo $produk['ID']; ?></td>
                            <td class="product-name"><?php echo $produk['Nama']; ?></td>
                            <td><span class="category-badge"><?php echo $produk['Kategori']; ?></span></td>
                            <td class="currency">Rp <?php echo number_format($produk['Harga'], 0, ',', '.'); ?></td>
                            <td style="font-weight: 600;">
                                <?php echo $produk['Stok']; ?>
                            </td>
                            <td class="currency" style="font-weight: 500;">Rp <?php echo number_format(hitungTotalNilaiStok($produk['Harga'], $produk['Stok']), 0, ',', '.'); ?></td>
                            <td style="font-size: 14px; color: #4b5563; max-width: 250px; line-height: 1.4;"><?php echo $produk['Deskripsi']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>