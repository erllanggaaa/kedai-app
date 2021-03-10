<?php
include "../includes/koneksi.php";
date_default_timezone_set('Asia/Jakarta');
$tanggal2 = mktime(date("m"),date("d"),date("Y"));
$tahun = date("Y", $tanggal2);
$bulan = date("m", $tanggal2);
$bulan1 = date("M", $tanggal2);
function convertToRupiah($convertToRupiah)
{
	return number_format($convertToRupiah,0,',','.');
}
?>				
			<div class="table-responsive">
			<table class="table table-bordered table-striped table-scalable">
				<tbody>
					<?php
					if(empty($_POST['tgl1']) && empty($_POST['tgl2'])){
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
							<p><label>Bulan $bulan1</label></p><br>
							<tr>
								<td><strong>Pendapatan :</strong></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>- $myData[KETERANGAN_JURNAL]</td>
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
								<td>- $myData2[KETERANGAN_JURNAL]</td>
								<td style='text-align:right;'>".convertToRupiah($myData2['kredit'])."</td>
								<td></td>
							</tr>
							<tr>
								<td>- $myData1[KETERANGAN_JURNAL]</td>
								<td style='text-align:right;'>".convertToRupiah($myData1['kredit'])."</td>
								<td></td>
							</tr>
							<tr>
								<td>- $myData3[KETERANGAN_JURNAL]</td>
								<td style='text-align:right;'>".convertToRupiah($myData3['kredit'])."</td>
								<td></td>
							</tr>
							<tr>
								<td>- $myData4[KETERANGAN_JURNAL]</td>
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
									WHERE KETERANGAN_JURNAL = 'Penjualan' AND TGL_JURNAL BETWEEN '".$_POST['tgl1']."' AND '".$_POST['tgl2']."'");
									$myData = mysqli_fetch_array($mySql); 
									//pembelian bahan
									$mySql1 = mysqli_query($konek, "SELECT KETERANGAN_JURNAL, IFNULL(sum(JURNAL_DEBET),0) as debet, IFNULL(sum(JURNAL_KREDIT),0) as kredit
									FROM jurnal_umum
									WHERE KETERANGAN_JURNAL = 'Pembelian Bahan Baku' AND TGL_JURNAL BETWEEN '".$_POST['tgl1']."' AND '".$_POST['tgl2']."'");
									$myData1 = mysqli_fetch_array($mySql1); 
									//gaji karyawan
									$mySql2 = mysqli_query($konek, "SELECT KETERANGAN_JURNAL, IFNULL(sum(JURNAL_DEBET),0) as debet, IFNULL(sum(JURNAL_KREDIT),0) as kredit
									FROM jurnal_umum
									WHERE KETERANGAN_JURNAL = 'Gaji Karyawan' AND TGL_JURNAL BETWEEN '".$_POST['tgl1']."' AND '".$_POST['tgl2']."'");
									$myData2 = mysqli_fetch_array($mySql2); 
									//Listrik
									$mySql3 = mysqli_query($konek, "SELECT KETERANGAN_JURNAL, IFNULL(sum(JURNAL_DEBET),0) as debet, IFNULL(sum(JURNAL_KREDIT),0) as kredit
									FROM jurnal_umum
									WHERE KETERANGAN_JURNAL = 'Pembayaran Listrik' AND TGL_JURNAL BETWEEN '".$_POST['tgl1']."' AND '".$_POST['tgl2']."'");
									$myData3 = mysqli_fetch_array($mySql3);
									//Iuran Keamanan
									$mySql4 = mysqli_query($konek, "SELECT KETERANGAN_JURNAL, IFNULL(sum(JURNAL_DEBET),0) as debet, IFNULL(sum(JURNAL_KREDIT),0) as kredit
									FROM jurnal_umum
									WHERE KETERANGAN_JURNAL = 'Iuran Keamanan' AND TGL_JURNAL BETWEEN '".$_POST['tgl1']."' AND '".$_POST['tgl2']."'");
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
							<p><label>Tanggal $_POST[tgl1] s/d $_POST[tgl2]</label></p><br>
							<tr>
								<td><strong>Pendapatan :</strong></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>- $myData[KETERANGAN_JURNAL]</td>
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
								<td>- $myData2[KETERANGAN_JURNAL]</td>
								<td style='text-align:right;'>".convertToRupiah($myData2['kredit'])."</td>
								<td></td>
							</tr>
							<tr>
								<td>- $myData1[KETERANGAN_JURNAL]</td>
								<td style='text-align:right;'>".convertToRupiah($myData1['kredit'])."</td>
								<td></td>
							</tr>
							<tr>
								<td>- $myData3[KETERANGAN_JURNAL]</td>
								<td style='text-align:right;'>".convertToRupiah($myData3['kredit'])."</td>
								<td></td>
							</tr>
							<tr>
								<td>- $myData4[KETERANGAN_JURNAL]</td>
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
			</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#data').DataTable();
});
</script>
