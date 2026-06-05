<?php 
$konektor = mysqli_connect("localhost","root","","db_umkm");
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>