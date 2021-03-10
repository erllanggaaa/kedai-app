<?php
include "../includes/koneksi.php";

if($_POST['jabatan'] == 'Barista'){
	if ($add = mysqli_query($konek, "INSERT INTO karyawan(ID_KARYAWAN, NAMA_KARYAWAN, JABATAN, AKSI_KARYAWAN) VALUES ('".$_POST["kodekaryawan"]."','".$_POST["namakaryawan"]."','".$_POST["jabatan"]."',1)")){
		echo "<script> alert('Data Berhasil Disimpan'); location.href='App-Karyawan' </script>";
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));
}else{
	if ($add = mysqli_query($konek, "INSERT INTO karyawan(ID_KARYAWAN, NAMA_KARYAWAN, JABATAN, USERNAME, PASSWORD, AKSI_KARYAWAN) VALUES ('".$_POST["kodekaryawan"]."','".$_POST["namakaryawan"]."','".$_POST["jabatan"]."','".md5($_POST["username"])."','".md5($_POST["password"])."',1)")){
		echo "<script> alert('Data Berhasil Disimpan'); location.href='App-Karyawan' </script>";
		exit();
	}
	die ("Terdapat kesalahan : ". mysqli_error($konek));
}


?>