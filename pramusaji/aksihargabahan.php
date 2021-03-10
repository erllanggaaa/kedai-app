<?php 
session_start();
include "../includes/koneksi.php";
$rupiah = $_POST['harga'];
$rupiah1 = preg_replace("/[^0-9]/", "", $rupiah);
$update = mysqli_query($konek, "UPDATE detail_bahan_masuk SET SUB_TOTAL='$rupiah1', HARGA_DETAIL_BAHAN = '$rupiah1' / JUMLAH, STATUS_DETAIL_BAHAN = 'Diterima' WHERE ID_DETAIL = '".$_POST['kode']."'");
	
?>