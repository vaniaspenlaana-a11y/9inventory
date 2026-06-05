<?php
include '../konektor.html';

$idbarang   = $_POST['idbarang'];
$kodebarang = $_POST['kodebarang'];
$namabarang = $_POST['namabarang'];
$harga      = $_POST['harga'];
$satuan     = $_POST['satuan'];
$stok       = $_POST['stok'];

mysqli_query($konektor,"
UPDATE barang SET
    kodebarang='$kodebarang',
    namabarang='$namabarang',
    harga='$harga',
    satuan='$satuan',
    stok='$stok'
WHERE idbarang='$idbarang'
");

header("location:barang.html");
?>