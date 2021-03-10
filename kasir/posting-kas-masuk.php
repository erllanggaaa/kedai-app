<?php 
session_start();
include "../includes/koneksi.php";
$rupiah = $_POST['total'];
$rupiah1 = preg_replace("/[^0-9]/", "", $rupiah);

date_default_timezone_set('Asia/Jakarta');
$tanggal1 = mktime(date("m"),date("d"),date("Y"));
$tanggal = date("Y-m-d", $tanggal1);

$addkasmasuk = mysqli_query($konek, "INSERT INTO kas_masuk(ID_KAS_MASUK, TGL_KAS_MASUK, KETERANGAN_KAS_MASUK, TOTAL_KAS_MASUK, KODE_KAS_MASUK) 
	VALUES ('".$_POST['idkasmasuk']."','".$_POST['tgl']."','".$_POST['keterangan']."','$rupiah1',1)");
		if($addkasmasuk){
			$addjurnal1 = mysqli_query($konek, "INSERT INTO jurnal_umum(NO_URUT, ID_KARYAWAN, ID_KAS_MASUK, NO_JURNAL, TGL_JURNAL, KETERANGAN_JURNAL, JURNAL_DEBET, SUMBER) 
			VALUES ('".$_POST['idnorut1']."','".$_SESSION["idkaryawan"]."','".$_POST['idkasmasuk']."','".$_POST['nojurnal']."','".$_POST['tgl']."','".$_POST['keterangan']."','$rupiah1',1)");
		}
?>