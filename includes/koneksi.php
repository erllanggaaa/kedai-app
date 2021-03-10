<?php
$konek = mysqli_connect('localhost', 'root', '', 'app_stok_dan_keuangan');
	
if(mysqli_connect_errno()){
	printf ('Gagal terkoneksi : '.mysqli_connect_error());
	exit();
}
?>