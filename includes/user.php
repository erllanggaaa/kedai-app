<?php 
// mengaktifkan session pada php
session_start();
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$Username = $_POST["Username"];
$Password = $_POST["Password"];


		$username = stripslashes($Username);
		$password = stripslashes($Password);
		$username = mysqli_real_escape_string($konek, $username);
		$uassword = mysqli_real_escape_string($konek, $password);
		$username1 = md5($username);
		$password1 = md5($password);


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($konek,"select * from karyawan where USERNAME='$username1' and PASSWORD='$password1'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$queryuser = mysqli_query ($konek, "SELECT * FROM karyawan WHERE USERNAME='$username1'");
	$data = mysqli_fetch_array ($queryuser);

	if($data["AKSI_KARYAWAN"] == 1){
	if($data["JABATAN"] == 'Admin' || $data["JABATAN"] == 'Developer'){

		$_SESSION["idkaryawan"] 	= $data["ID_KARYAWAN"];
		$_SESSION["namakaryawan"] 	= $data["NAMA_KARYAWAN"];
		$_SESSION["jabatan"] 		= $data["JABATAN"];
		$_SESSION["userkaryawan"] 	= $data["USERNAME"];
		$_SESSION["Login"] 			= true;
		
		header("location: ../admin/App");
		exit();

	}else if($data["JABATAN"] == 'Kasir'){

		$_SESSION["idkaryawan"] 	= $data["ID_KARYAWAN"];
		$_SESSION["namakaryawan"] 	= $data["NAMA_KARYAWAN"];
		$_SESSION["jabatan"] 		= $data["JABATAN"];
		$_SESSION["userkaryawan"] 	= $data["USERNAME"];
		$_SESSION["Login"] 			= true;
		
		header("location: ../kasir/App");
		exit();

	}else if($data["JABATAN"] == 'Pramusaji'){
		
		$_SESSION["idkaryawan"] 	= $data["ID_KARYAWAN"];
		$_SESSION["namakaryawan"] 	= $data["NAMA_KARYAWAN"];
		$_SESSION["jabatan"] 		= $data["JABATAN"];
		$_SESSION["userkaryawan"] 	= $data["USERNAME"];
		$_SESSION["Login"] 			= true;
		
		header("location: ../pramusaji/App");
		exit();
}
	}else{

		header("location: ../login?pesan=gagal");
	}	
}else{
	header("location: ../login?pesan=gagal");
}

?>