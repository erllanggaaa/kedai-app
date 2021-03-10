<?php
session_start();
include "../includes/koneksi.php";

$sqlcekpass = mysqli_query($konek, "SELECT PASSWORD FROM karyawan WHERE ID_KARYAWAN = '".$_SESSION['idkaryawan']."'");
$hasilcekpass = mysqli_fetch_array($sqlcekpass);
if(md5($_POST['passlama']) != $hasilcekpass['PASSWORD']){
	echo '{"status":"0"}';
	exit;	
}else{
	$update = mysqli_query($konek, "UPDATE karyawan SET PASSWORD='".md5($_POST['passbaru'])."' WHERE ID_KARYAWAN = '".$_SESSION['idkaryawan']."'");
		if($update){
			echo '{"status":"1"}';
			exit;
		}
}
?>