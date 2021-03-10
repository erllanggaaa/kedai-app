<?php
include "../includes/koneksi.php";

if ($add = mysqli_query($konek, "INSERT INTO bahan_baku(ID_BAHAN_BAKU, NAMA_BAHAN_BAKU, SATUAN_BAHAN_BAKU, AKSI_BAHAN_BAKU) VALUES ('".$_POST["kodebahan"]."','".$_POST["namabahan"]."','".$_POST["satuan"]."',1)")){
	if($add){
		$addstock = mysqli_query($konek, "INSERT INTO stok_bahan_baku(ID_BAHAN_BAKU, TGL_STOK, STOK_AWAL, BARANG_MASUK, BARANG_KELUAR, STOK_AKHIR) VALUES ('".$_POST["kodebahan"]."','".$_POST["tglstock"]."','".$_POST["stockawal"]."',0,0,'".$_POST["stockawal"]."')");
		echo "<script> alert('Data Berhasil Ditambah'); location.href='App-Bahan-Baku' </script>";
		exit();
	}
		
	}
die ("<script> alert('Data Gagal Ditambah Karena Sudah Ada'); location.href='App-Bahan-Baku' </script>". mysqli_error($konek));

?>