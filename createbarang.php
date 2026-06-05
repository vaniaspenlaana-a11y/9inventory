<?php
include '../konektor.html';

// Menangkap data dari form
$kodebarang = $_POST['kodebarang'];
$namabarang = $_POST['namabarang'];
$harga      = $_POST['harga'];
$satuan     = $_POST['satuan'];
$stok       = $_POST['stok'];

// Query simpan data
mysqli_query($konektor,"
INSERT INTO barang
(
    kodebarang,
    namabarang,
    harga,
    satuan,
    stok
)
VALUES
(
    '$kodebarang',
    '$namabarang',
    '$harga',
    '$satuan',
    '$stok'
)
");

// Kembali ke halaman barang
header("Location: barang.html");
exit;
?>