<?php

include "../includes/koneksi.php";

if($delete = mysqli_query ($konek, "DELETE from bahan_baku WHERE ID_BAHAN_BAKU = '".$_GET['kode']."'")){
	echo "<script> alert('Data Berhasil Dihapus'); location.href='App-Bahan-Baku' </script>";
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($konek));

?>