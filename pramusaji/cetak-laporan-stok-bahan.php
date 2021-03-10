<?php

//memulai menggunakan mpdf
// Tentukan path yang tepat ke mPDF
$nama_dokumen='Laporan Stok Bahan Baku'; //Beri nama file PDF hasil.
define('_MPDF_PATH','mpdf60/'); // Tentukan folder dimana anda menyimpan folder mpdf
include(_MPDF_PATH . "mpdf.php"); // Arahkan ke file mpdf.php didalam folder mpdf
$mpdf=new mPDF('utf-8', 'A4-L', 10.5, 'arial'); // Membuat file mpdf baru
 
//Memulai proses untuk menyimpan variabel php dan html
ob_start();

?>
<!doctype html>
<html>
    <head>
        <title>Kedai Kopi Mencong</title>
		<?php
			include "include/css.php";
		?>
    </head>
    <body>
        <?php
		include "../includes/koneksi.php";
		//include "auth_user.php";
		date_default_timezone_set('Asia/Jakarta');
		$tanggal1 = mktime(date("m"),date("d"),date("Y"));
		$tanggal = date("Y-m-d", $tanggal1);
		$tglwaktu = date('Y-m-d H:i:s');
		function convertToRupiah($convertToRupiah)
		{
		return number_format($convertToRupiah,0,',','.');
		}
		?>
		<table width="100%" id="data" class="table table-striped table-scalable">	
				<thead>
					<tr>
						<th colspan="2" style='text-align:center'><h2>Kedai Kopi Mencong</h2></th>
					</tr>
				</thead>
		</table>
		<table width="100%" id="data" class="table table-striped table-scalable">	
				<tbody>
					<tr>
						<?php
							if(empty($_POST['tglawal']) && empty($_POST['tglakhir'])){
								echo "<td>Tanggal : -</td>";
							}else{
								echo "<td>Tanggal :$_POST[tglawal] s/d tanggal :$_POST[tglakhir]</td>";
							}
						?>
						
					</tr>
				</tbody>
		</table>
		<div class="box box-info">
            
              <h5 class="box-title">Laporan Stok Bahan Baku</h5>
            
		</div>
		<table width="100%" id="data" border="1" class="table table-bordered table-striped table-scalable">	
				<thead>
					<tr>
						<th>Bahan</th>
						<th style='text-align:center; font-weight:bold;'>Tanggal</th>
						<th style='text-align:center; font-weight:bold;'>Stok Awal</th>
						<th style='text-align:center; font-weight:bold;'>Barang Masuk</th>
						<th style='text-align:center; font-weight:bold;'>Barang Keluar</th>
						<th style='text-align:center; font-weight:bold;'>Stok Akhir</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(empty($_POST['tglawal']) && empty($_POST['tglakhir'])){
						$querystock = mysqli_query ($konek, "SELECT a.ID_BAHAN_BAKU, a.TGL_STOK, a.STOK_AWAL, a.BARANG_MASUK, a.BARANG_KELUAR, a.STOK_AKHIR, b.NAMA_BAHAN_BAKU, b.SATUAN_BAHAN_BAKU
						FROM stok_bahan_baku a JOIN bahan_baku b ON a.ID_BAHAN_BAKU=b.ID_BAHAN_BAKU WHERE a.TGL_STOK = (SELECT MAX(TGL_STOK) FROM stok_bahan_baku AS b WHERE a.ID_BAHAN_BAKU=b.ID_BAHAN_BAKU)");
					
						if($querystock == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($hasilstock = mysqli_fetch_array ($querystock)){
								echo "
									<tr>
										<td>$hasilstock[NAMA_BAHAN_BAKU]</td>
										<td style='text-align:center'>$hasilstock[TGL_STOK]</td>
										<td style='text-align:right'>".convertToRupiah($hasilstock['STOK_AWAL']) ." $hasilstock[SATUAN_BAHAN_BAKU]</td>
										<td style='text-align:right'>".convertToRupiah($hasilstock['BARANG_MASUK']) ." $hasilstock[SATUAN_BAHAN_BAKU]</td>
										<td style='text-align:right'>".convertToRupiah($hasilstock['BARANG_KELUAR']) ." $hasilstock[SATUAN_BAHAN_BAKU]</td>
										<td style='text-align:right'>".convertToRupiah($hasilstock['STOK_AKHIR']) ." $hasilstock[SATUAN_BAHAN_BAKU]</td>
									
									</tr>";
								}
					}else{
						$querystock = mysqli_query ($konek, "SELECT a.ID_BAHAN_BAKU, a.TGL_STOK, a.STOK_AWAL, a.BARANG_MASUK, a.BARANG_KELUAR, a.STOK_AKHIR, b.NAMA_BAHAN_BAKU, b.SATUAN_BAHAN_BAKU
						FROM stok_bahan_baku a JOIN bahan_baku b ON a.ID_BAHAN_BAKU=b.ID_BAHAN_BAKU WHERE a.TGL_STOK BETWEEN '".$_POST['tglawal']."' AND '".$_POST['tglakhir']."'");
						if($querystock == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($hasilstock = mysqli_fetch_array ($querystock)){
							
							echo "
								<tr>
									<td>$hasilstock[NAMA_BAHAN_BAKU]</td>
									<td style='text-align:center'>$hasilstock[TGL_STOK]</td>
									<td style='text-align:right'>".convertToRupiah($hasilstock['STOK_AWAL']) ." $hasilstock[SATUAN_BAHAN_BAKU]</td>
									<td style='text-align:right'>".convertToRupiah($hasilstock['BARANG_MASUK']) ." $hasilstock[SATUAN_BAHAN_BAKU]</td>
									<td style='text-align:right'>".convertToRupiah($hasilstock['BARANG_KELUAR']) ." $hasilstock[SATUAN_BAHAN_BAKU]</td>
									<td style='text-align:right'>".convertToRupiah($hasilstock['STOK_AKHIR']) ." $hasilstock[SATUAN_BAHAN_BAKU]</td>
								</tr>";
						}
					}
						
					?>
				</tbody>
			</table>
<script type="text/javascript">
  $(document).ready(function(){
    $('#data').DataTable();
});
</script>
</body>
</html>

<?php
//penulisan output selesai, sekarang menutup mpdf dan generate kedalam format pdf

$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Disini dimulai proses convert UTF-8, kalau ingin ISO-8859-1 cukup dengan mengganti $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>