<?php
include "../includes/koneksi.php";

if ($edit = mysqli_query($konek, "UPDATE bahan_baku SET NAMA_BAHAN_BAKU='".$_POST['namabahan']."',SATUAN_BAHAN_BAKU='".$_POST['satuan']."' WHERE ID_BAHAN_BAKU = '".$_POST['kodebahan']."'")){
		echo "<script> alert('Data Berhasil Diubah'); location.href='App-Bahan-Baku' </script>";
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>