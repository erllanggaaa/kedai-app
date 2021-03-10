<?php
include "../includes/koneksi.php";
function convertToRupiah($convertToRupiah)
{
	return number_format($convertToRupiah,0,',','.');
}
date_default_timezone_set('Asia/Jakarta');
$tanggal1 = mktime(date("m"),date("d"),date("Y"));
$tanggal = date("Y-m", $tanggal1);
?>				
			<table id="data" class="table table-bordered table-striped table-scalable">
				<thead>
					<tr>
						<th>#</th>
						<th>Tanggal</th>
						<th>Keterangan</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(empty($_POST['tgl1']) && empty($_POST['tgl2'])){
						$no = 0;
						$sqltampillaporankasmasuk = mysqli_query($konek, "SELECT * FROM kas_masuk WHERE SUBSTR(TGL_KAS_MASUK,1,7) = '$tanggal' ORDER BY TGL_KAS_MASUK ASC");
						while ($hasiltampillaporankasmasuk = mysqli_fetch_array($sqltampillaporankasmasuk)){
							$no++;
							echo "
								<tr>
									<td>$no</td>
									<td>$hasiltampillaporankasmasuk[TGL_KAS_MASUK]</td>
									<td>$hasiltampillaporankasmasuk[KETERANGAN_KAS_MASUK]</td>
									<td style='text-align:right;'>".convertToRupiah($hasiltampillaporankasmasuk['TOTAL_KAS_MASUK'])."</td>
								</tr>";
						}
						$sqltotal = mysqli_query($konek, "SELECT SUM(TOTAL_KAS_MASUK) AS TOTAL FROM kas_masuk WHERE SUBSTR(TGL_KAS_MASUK,1,7) = '$tanggal'");
						$hasiltotal = mysqli_fetch_array($sqltotal);
					}else{
						$no = 0;
						$sqltampillaporankasmasuk = mysqli_query($konek, "SELECT * FROM kas_masuk WHERE TGL_KAS_MASUK BETWEEN '".$_POST['tgl1']."' AND '".$_POST['tgl2']."' ORDER BY TGL_KAS_MASUK ASC");
						while ($hasiltampillaporankasmasuk = mysqli_fetch_array($sqltampillaporankasmasuk)){
							$no++;
							echo "
								<tr>
									<td>$no</td>
									<td>$hasiltampillaporankasmasuk[TGL_KAS_MASUK]</td>
									<td>$hasiltampillaporankasmasuk[KETERANGAN_KAS_MASUK]</td>
									<td style='text-align:right;'>".convertToRupiah($hasiltampillaporankasmasuk['TOTAL_KAS_MASUK'])."</td>
								</tr>";
						}
						$sqltotal = mysqli_query($konek, "SELECT SUM(TOTAL_KAS_MASUK) AS TOTAL FROM kas_masuk WHERE TGL_KAS_MASUK BETWEEN '".$_POST['tgl1']."' AND '".$_POST['tgl2']."'");
						$hasiltotal = mysqli_fetch_array($sqltotal);
					}
					?>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="3" style="text-align:right">Grand Total:</th>
						<th style="text-align:right"><?php echo convertToRupiah($hasiltotal['TOTAL']) ?></th>
					</tr>
				</tfoot>
			</table>
<script type="text/javascript">
  $(document).ready(function(){
    $('#data').DataTable();
});
</script>