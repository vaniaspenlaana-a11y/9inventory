<?php
include '../konektor.html';

// Ambil ID dari URL
$idbarang = $_GET['idbarang'];

// Query hapus
mysqli_query($konektor,"
DELETE FROM barang
WHERE idbarang='$idbarang'
");

// Kembali ke halaman barang
header("Location: barang.html");
exit;
?>