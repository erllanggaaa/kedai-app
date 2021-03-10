<?php

//memulai menggunakan mpdf
// Tentukan path yang tepat ke mPDF
$nama_dokumen='Laporan Keuangan'; //Beri nama file PDF hasil.
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
		$tahun = date("Y", $tanggal1);
		$bulan = date("m", $tanggal1);
		$bulan1 = date("M", $tanggal1);
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
								echo "<td>Bulan : $bulan1</td>";
							}else{
								echo "<td>Tanggal :$_POST[tglawal] s/d tanggal :$_POST[tglakhir]</td>";
							}
						?>
						
					</tr>
				</tbody>
		</table>
		<div class="box box-info">
            
              <h5 class="box-title">Laporan Keuangan</h5>
            
		</div>
		<table width="100%" id="data" class="table table-bordered table-striped table-scalable">	
				<tbody>
					<?php
					if(empty($_POST['tglawal']) && empty($_POST['tglakhir'])){
									//penjualan
									$mySql = mysqli_query($konek, "SELECT KETERANGAN_JURNAL, sum(JURNAL_DEBET) as debet, sum(JURNAL_KREDIT) as kredit
									FROM jurnal_umum
									WHERE KETERANGAN_JURNAL = 'Penjualan' AND YEAR(TGL_JURNAL) = '$tahun' AND MONTH(TGL_JURNAL) = '$bulan'");
									$myData = mysqli_fetch_array($mySql); 
									//pembelian bahan
									$mySql1 = mysqli_query($konek, "SELECT KETERANGAN_JURNAL, IFNULL(sum(JURNAL_DEBET),0) as debet, IFNULL(sum(JURNAL_KREDIT),0) as kredit
									FROM jurnal_umum
									WHERE KETERANGAN_JURNAL = 'Pembelian Bahan Baku' AND YEAR(TGL_JURNAL) = '$tahun' AND MONTH(TGL_JURNAL) = '$bulan'");
									$myData1 = mysqli_fetch_array($mySql1); 
									//gaji karyawan
									$mySql2 = mysqli_query($konek, "SELECT KETERANGAN_JURNAL, IFNULL(sum(JURNAL_DEBET),0) as debet, IFNULL(sum(JURNAL_KREDIT),0) as kredit
									FROM jurnal_umum
									WHERE KETERANGAN_JURNAL = 'Gaji Karyawan' AND YEAR(TGL_JURNAL) = '$tahun' AND MONTH(TGL_JURNAL) = '$bulan'");
									$myData2 = mysqli_fetch_array($mySql2); 
									//Listrik
									$mySql3 = mysqli_query($konek, "SELECT KETERANGAN_JURNAL, IFNULL(sum(JURNAL_DEBET),0) as debet, IFNULL(sum(JURNAL_KREDIT),0) as kredit
									FROM jurnal_umum
									WHERE KETERANGAN_JURNAL = 'Pembayaran Listrik' AND YEAR(TGL_JURNAL) = '$tahun' AND MONTH(TGL_JURNAL) = '$bulan'");
									$myData3 = mysqli_fetch_array($mySql3);
									//Iuran Keamanan
									$mySql4 = mysqli_query($konek, "SELECT KETERANGAN_JURNAL, IFNULL(sum(JURNAL_DEBET),0) as debet, IFNULL(sum(JURNAL_KREDIT),0) as kredit
									FROM jurnal_umum
									WHERE KETERANGAN_JURNAL = 'Iuran Keamanan' AND YEAR(TGL_JURNAL) = '$tahun' AND MONTH(TGL_JURNAL) = '$bulan'");
									$myData4 = mysqli_fetch_array($mySql4); 
									
									
									$totbeban = $myData1['kredit'] + $myData2['kredit'] + $myData3['kredit'] + $myData4['kredit'];
									$labarugi = ($myData['debet'] - ($myData1['kredit'] + $myData2['kredit'] + $myData3['kredit'] + $myData4['kredit']));
									
									if ($myData['debet'] > $totbeban){
										$status = "Laba";
									}else if($myData['kredit'] == $totbeban){
										$status = "Laba/Rugi";
									}else{
										$status = "Rugi";
									}
						echo "
							<label>Bulan $bulan1</label>
							<tr>
								<td><strong>Pendapatan :</strong></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>- Penjualan</td>
								<td style='text-align:right;'>".convertToRupiah($myData['debet'])."</td>
								<td></td>
							</tr>
							<tr>
								<td><strong>Total Pendapatan</strong></td>
								<td></td>
								<td style='text-align:right;'>".convertToRupiah($myData['debet'])."</td>
							</tr>
							<tr>
								<td><strong>Beban :</strong></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>- Gaji Karyawan</td>
								<td style='text-align:right;'>".convertToRupiah($myData2['kredit'])."</td>
								<td></td>
							</tr>
							<tr>
								<td>- Pembelian Bahan Baku</td>
								<td style='text-align:right;'>".convertToRupiah($myData1['kredit'])."</td>
								<td></td>
							</tr>
							<tr>
								<td>- Pembayaran Listrik</td>
								<td style='text-align:right;'>".convertToRupiah($myData3['kredit'])."</td>
								<td></td>
							</tr>
							<tr>
								<td>- Iuran Keamanan</td>
								<td style='text-align:right;'>".convertToRupiah($myData4['kredit'])."</td>
								<td></td>
							</tr>
							<tr>
								<td><strong>Total Beban</strong></td>
								<td></td>
								<td style='text-align:right;'>".convertToRupiah($totbeban)."</td>
							</tr>
						";
					}else{
									//penjualan
									$mySql = mysqli_query($konek, "SELECT KETERANGAN_JURNAL, sum(JURNAL_DEBET) as debet, sum(JURNAL_KREDIT) as kredit
									FROM jurnal_umum
									WHERE KETERANGAN_JURNAL = 'Penjualan' AND TGL_JURNAL BETWEEN '".$_POST['tglawal']."' AND '".$_POST['tglakhir']."'");
									$myData = mysqli_fetch_array($mySql); 
									//pembelian bahan
									$mySql1 = mysqli_query($konek, "SELECT KETERANGAN_JURNAL, IFNULL(sum(JURNAL_DEBET),0) as debet, IFNULL(sum(JURNAL_KREDIT),0) as kredit
									FROM jurnal_umum
									WHERE KETERANGAN_JURNAL = 'Pembelian Bahan Baku' AND TGL_JURNAL BETWEEN '".$_POST['tglawal']."' AND '".$_POST['tglakhir']."'");
									$myData1 = mysqli_fetch_array($mySql1); 
									//gaji karyawan
									$mySql2 = mysqli_query($konek, "SELECT KETERANGAN_JURNAL, IFNULL(sum(JURNAL_DEBET),0) as debet, IFNULL(sum(JURNAL_KREDIT),0) as kredit
									FROM jurnal_umum
									WHERE KETERANGAN_JURNAL = 'Gaji Karyawan' AND TGL_JURNAL BETWEEN '".$_POST['tglawal']."' AND '".$_POST['tglakhir']."'");
									$myData2 = mysqli_fetch_array($mySql2); 
									//Listrik
									$mySql3 = mysqli_query($konek, "SELECT KETERANGAN_JURNAL, IFNULL(sum(JURNAL_DEBET),0) as debet, IFNULL(sum(JURNAL_KREDIT),0) as kredit
									FROM jurnal_umum
									WHERE KETERANGAN_JURNAL = 'Pembayaran Listrik' AND TGL_JURNAL BETWEEN '".$_POST['tglawal']."' AND '".$_POST['tglakhir']."'");
									$myData3 = mysqli_fetch_array($mySql3); 
									//Iuran Keamanan
									$mySql4 = mysqli_query($konek, "SELECT KETERANGAN_JURNAL, IFNULL(sum(JURNAL_DEBET),0) as debet, IFNULL(sum(JURNAL_KREDIT),0) as kredit
									FROM jurnal_umum
									WHERE KETERANGAN_JURNAL = 'Iuran Keamanan' AND TGL_JURNAL BETWEEN '".$_POST['tglawal']."' AND '".$_POST['tglakhir']."'");
									$myData4 = mysqli_fetch_array($mySql4); 

									
									
									$totbeban = $myData1['kredit'] + $myData2['kredit'] + $myData3['kredit'] + $myData4['kredit'];
									$labarugi = ($myData['debet'] - ($myData1['kredit'] + $myData2['kredit'] + $myData3['kredit'] + $myData4['kredit']));
									
									if ($myData['debet'] > $totbeban){
										$status = "Laba";
									}else if($myData['kredit'] == $totbeban){
										$status = "Laba/Rugi";
									}else{
										$status = "Rugi";
									}
						echo "
							<label>Tanggal $_POST[tglawal] s/d $_POST[tglakhir]</label>
							<tr>
								<td><strong>Pendapatan :</strong></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>- Penjualan</td>
								<td style='text-align:right;'>".convertToRupiah($myData['debet'])."</td>
								<td></td>
							</tr>
							<tr>
								<td><strong>Total Pendapatan</strong></td>
								<td></td>
								<td style='text-align:right;'>".convertToRupiah($myData['debet'])."</td>
							</tr>
							<tr>
								<td><strong>Beban :</strong></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>- Gaji Karyawan</td>
								<td style='text-align:right;'>".convertToRupiah($myData2['kredit'])."</td>
								<td></td>
							</tr>
							<tr>
								<td>- Pembelian Bahan Baku</td>
								<td style='text-align:right;'>".convertToRupiah($myData1['kredit'])."</td>
								<td></td>
							</tr>
							<tr>
								<td>- Pembayaran Listrik</td>
								<td style='text-align:right;'>".convertToRupiah($myData3['kredit'])."</td>
								<td></td>
							</tr>
							<tr>
								<td>- Iuran Keamanan</td>
								<td style='text-align:right;'>".convertToRupiah($myData4['kredit'])."</td>
								<td></td>
							</tr>
							<tr>
								<td><strong>Total Beban</strong></td>
								<td></td>
								<td style='text-align:right;'>".convertToRupiah($totbeban)."</td>
							</tr>
						";
					}
					?>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="2" style="text-align:left"><?php echo $status ?></th>
						<th style="text-align:right"><?php echo convertToRupiah($labarugi) ?></th>
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