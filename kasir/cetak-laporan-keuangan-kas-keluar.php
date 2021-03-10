<?php

//memulai menggunakan mpdf
// Tentukan path yang tepat ke mPDF
$nama_dokumen='Laporan Pengeluaran'; //Beri nama file PDF hasil.
define('_MPDF_PATH','mpdf60/'); // Tentukan folder dimana anda menyimpan folder mpdf
include(_MPDF_PATH . "mpdf.php"); // Arahkan ke file mpdf.php didalam folder mpdf
$mpdf=new mPDF('utf-8', 'A4-P', 10.5, 'arial'); // Membuat file mpdf baru
 
//Memulai proses untuk menyimpan variabel php dan html
ob_start();

?>
<!doctype html>
<html>
    <head>
        <title>KEDAI KOPI MENCONG</title>
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
		$tanggal = date("Y-m", $tanggal1);
		$bulan = date("M, Y", $tanggal1);
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
								echo "<td>Bulan : $bulan";
							}else{
								echo "<td>Tanggal :$_POST[tglawal] s/d tanggal :$_POST[tglakhir]</td>";
							}
						?>
						
					</tr>
				</tbody>
		</table>
		<div class="box box-info">
            
              <h5 class="box-title">Laporan Pengeluaran</h5>
            
		</div>
		<table width="100%" id="data" class="table table-bordered table-striped table-scalable">	
				<thead>
					<tr>
						<th>#</th>
						<th>Tanggal</th>
						<th>Keterangan</th>
						<th>Kredit</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(empty($_POST['tglawal']) && empty($_POST['tglakhir'])){
						$no = 0;
						$sqltampillaporankasmasuk = mysqli_query($konek, "SELECT * FROM kas_keluar WHERE SUBSTR(TGL_KAS_KELUAR,1,7) = '$tanggal' ORDER BY TGL_KAS_KELUAR ASC");
						while ($hasiltampillaporankasmasuk = mysqli_fetch_array($sqltampillaporankasmasuk)){
							$no++;
							echo "
								<tr>
									<td>$no</td>
									<td>$hasiltampillaporankasmasuk[TGL_KAS_KELUAR]</td>
									<td>$hasiltampillaporankasmasuk[KETERANGAN_KAS_KELUAR]</td>
									<td style='text-align:right;'>".convertToRupiah($hasiltampillaporankasmasuk['TOTAL_KAS_KELUAR'])."</td>
								</tr>";
						}
						$sqltotal = mysqli_query($konek, "SELECT SUM(TOTAL_KAS_KELUAR) AS TOTAL FROM kas_keluar WHERE SUBSTR(TGL_KAS_KELUAR,1,7) = '$tanggal'");
						$hasiltotal = mysqli_fetch_array($sqltotal);
					}else{
						$no = 0;
						$sqltampillaporankasmasuk = mysqli_query($konek, "SELECT * FROM kas_keluar WHERE TGL_KAS_KELUAR BETWEEN '".$_POST['tglawal']."' AND '".$_POST['tglakhir']."' ORDER BY TGL_KAS_KELUAR ASC");
						while ($hasiltampillaporankasmasuk = mysqli_fetch_array($sqltampillaporankasmasuk)){
							$no++;
							echo "
								<tr>
									<td>$no</td>
									<td>$hasiltampillaporankasmasuk[TGL_KAS_KELUAR]</td>
									<td>$hasiltampillaporankasmasuk[KETERANGAN_KAS_KELUAR]</td>
									<td style='text-align:right;'>".convertToRupiah($hasiltampillaporankasmasuk['TOTAL_KAS_KELUAR'])."</td>
								</tr>";
						}
						$sqltotal = mysqli_query($konek, "SELECT SUM(TOTAL_KAS_KELUAR) AS TOTAL FROM kas_keluar WHERE TGL_KAS_KELUAR BETWEEN '".$_POST['tglawal']."' AND '".$_POST['tglakhir']."'");
						$hasiltotal = mysqli_fetch_array($sqltotal);
					}
					?>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="3" style="text-align:right">Total:</th>
						<th style="text-align:right"><?php echo convertToRupiah($hasiltotal['TOTAL']) ?></th>
					</tr>
				</tfoot>
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