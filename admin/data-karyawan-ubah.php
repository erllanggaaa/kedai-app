<?php
include "../includes/koneksi.php";

if ($edit = mysqli_query($konek, "UPDATE karyawan SET NAMA_KARYAWAN='".$_POST['namakaryawan']."', JABATAN='".$_POST['jabatan']."', USERNAME='".md5($_POST["username"])."', PASSWORD='".md5($_POST["password"])."' WHERE ID_KARYAWAN = '".$_POST['kodekaryawan']."'")){
		echo "<script> alert('Data Berhasil Diubah'); location.href='App-Karyawan' </script>";
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>