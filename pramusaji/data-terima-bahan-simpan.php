<?php 
session_start();
include "../includes/koneksi.php";
$rupiah = $_POST['total'];
$rupiah1 = preg_replace("/[^0-9]/", "", $rupiah);

date_default_timezone_set('Asia/Jakarta');
$tanggal1 = mktime(date("m"),date("d"),date("Y"));
$tanggal = date("Y-m-d", $tanggal1);

$add = mysqli_query($konek, "INSERT INTO supplier(ID_SUPPLIER, NAMA_SUPPLIER, ALAMAT_SUPPLIER, NO_HP_SUPPLIER) 
VALUES ('".$_POST['supplier']."','".$_POST['namasupplier']."','".$_POST['alamat']."','".$_POST['tlp']."')");
	if($add){
		$update = mysqli_query($konek, "UPDATE bahan_masuk SET ID_SUPPLIER='".$_POST['supplier']."',NO_NOTA='".$_POST['nota']."',KETERANGAN='Diterima',TOTAL_HARGA_BAHAN='$rupiah1' WHERE ID_BAHAN_MASUK = '".$_POST['pemesanan']."'");
			if($update){
				$sqltampilstock = mysqli_query($konek, "SELECT * FROM detail_bahan_masuk WHERE ID_BAHAN_MASUK = '".$_POST['pemesanan']."'");
				while ($hasiltampilstock = mysqli_fetch_array($sqltampilstock)){
					$jml = $hasiltampilstock['JUMLAH'];
						if(sqltampilstock){
							$updatestock = mysqli_query($konek, "UPDATE stok_bahan_baku AS a, (SELECT MAX(TGL_STOK) AS TGL FROM stok_bahan_baku GROUP BY ID_BAHAN_BAKU) AS b SET BARANG_MASUK=BARANG_MASUK + '$jml' 
							WHERE ID_BAHAN_BAKU = '".$hasiltampilstock['ID_BAHAN_BAKU']."' AND a.TGL_STOK = b.TGL");
								if($updatestock){
									$updatestock1 = mysqli_query($konek, "UPDATE stok_bahan_baku AS a, (SELECT MAX(TGL_STOK) AS TGL FROM stok_bahan_baku GROUP BY ID_BAHAN_BAKU) AS b SET STOK_AKHIR=(STOK_AWAL + BARANG_MASUK) - BARANG_KELUAR 
									WHERE ID_BAHAN_BAKU = '".$hasiltampilstock['ID_BAHAN_BAKU']."' AND a.TGL_STOK = b.TGL");
										if($updatestock1){
											if($hasiltampilstock['STATUS_DETAIL_BAHAN'] == 'Masuk'){
												$updatestatus = mysqli_query($konek, "UPDATE detail_bahan_masuk SET STATUS_DETAIL_BAHAN = 'Batal' WHERE ID_DETAIL = '".$hasiltampilstock['ID_DETAIL']."'");
											}else{
												
											}
										}
								}
						}
				}
			}
	}

?>