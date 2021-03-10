<?php
error_reporting(0);
session_start();
include "../includes/koneksi.php";
function angka1($rp){
	$hasil= number_format($rp,0,",",".");
	return $hasil;
	}
?>			
			<div class="table-responsive">
			<table id="data" class="table table-bordered table-striped table-scalable">	
				<thead>
					<tr>
						<th>No</th>
						<th>Kode</th>
						<th>Tanggal</th>
						<th>Keterangan</th>
						<th>Debet</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no = 0;
						$querykasmasuk = mysqli_query ($konek, "SELECT * FROM kas_masuk WHERE KODE_KAS_MASUK = 1");
						if($querykasmasuk == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($hasilkasmasuk = mysqli_fetch_array ($querykasmasuk)){
							$no++;
							echo "
								<tr>
									<td>$no</td>
									<td>$hasilkasmasuk[ID_KAS_MASUK]</td>
									<td>$hasilkasmasuk[TGL_KAS_MASUK]</td>
									<td>$hasilkasmasuk[KETERANGAN_KAS_MASUK]</td>
									<td style='text-align:right;'>".angka1($hasilkasmasuk['TOTAL_KAS_MASUK'])."</td>
								</tr>";
						}
					?>
				</tbody>
			</table>
			</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#data').DataTable();
});
</script>