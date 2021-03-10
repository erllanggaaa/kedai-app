<?php 
session_start();
include "../includes/koneksi.php";
$rupiah = $_POST['jml'];
$rupiah1 = preg_replace("/[^0-9]/", "", $rupiah);

date_default_timezone_set('Asia/Jakarta');
$tanggal1 = mktime(date("m"),date("d"),date("Y"));
$tanggal = date("Y-m-d", $tanggal1);

$sqlcekbahan = mysqli_query($konek, "SELECT a.ID_BAHAN_BAKU, a.TGL_STOK, a.STOK_AWAL, a.BARANG_MASUK, a.BARANG_KELUAR, a.STOK_AKHIR FROM stok_bahan_baku a WHERE a.ID_BAHAN_BAKU = '".$_POST['kode']."' AND a.TGL_STOK = (SELECT MAX(TGL_STOK) FROM stok_bahan_baku AS b WHERE a.ID_BAHAN_BAKU=b.ID_BAHAN_BAKU)");
$hasilcekbahan = mysqli_fetch_array($sqlcekbahan);

$keluar = ($hasilcekbahan['STOK_AWAL'] + $hasilcekbahan['BARANG_MASUK']) - $rupiah1;

	if($sqlcekbahan){
		$updatestock = mysqli_query($konek, "UPDATE stok_bahan_baku SET BARANG_KELUAR='$keluar',STOK_AKHIR='$rupiah1' 
		WHERE ID_BAHAN_BAKU = '".$_POST['kode']."' AND TGL_STOK = '".$hasilcekbahan['TGL_STOK']."'");
			if($updatestock){
				$addstock = mysqli_query($konek, "INSERT INTO stok_bahan_baku(ID_BAHAN_BAKU, TGL_STOK, STOK_AWAL, BARANG_MASUK, BARANG_KELUAR, STOK_AKHIR) 
				VALUES ('".$hasilcekbahan['ID_BAHAN_BAKU']."','$tanggal','$rupiah1',0,0,'$rupiah1')");
			}
	}
?>