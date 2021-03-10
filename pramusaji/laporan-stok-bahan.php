<?php
include "../includes/koneksi.php";
function convertToRupiah($convertToRupiah)
{
	return number_format($convertToRupiah,0,',','.');
}
?>				
			<table id="data" class="table table-bordered table-striped table-scalable">				
				<thead>
					<tr>
						<th>Bahan</th>
						<th>Tanggal</th>
						<th>Stok Awal</th>
						<th>Barang Masuk</th>
						<th>Barang Keluar</th>
						<th>Stok Akhir</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(empty($_POST['tgl1']) && empty($_POST['tgl2'])){
						$querystock = mysqli_query ($konek, "SELECT a.ID_BAHAN_BAKU, a.TGL_STOK, a.STOK_AWAL, a.BARANG_MASUK, a.BARANG_KELUAR, a.STOK_AKHIR, b.NAMA_BAHAN_BAKU, b.SATUAN_BAHAN_BAKU, b.AKSI_BAHAN_BAKU
						FROM stok_bahan_baku a JOIN bahan_baku b ON a.ID_BAHAN_BAKU=b.ID_BAHAN_BAKU WHERE a.TGL_STOK = (SELECT MAX(TGL_STOK) FROM stok_bahan_baku AS b WHERE a.ID_BAHAN_BAKU=b.ID_BAHAN_BAKU) AND b.AKSI_BAHAN_BAKU = 1 ORDER BY b.NAMA_BAHAN_BAKU ASC");
					
						if($querystock == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($hasilstock = mysqli_fetch_array ($querystock)){
								echo "
									<tr>
										<td>$hasilstock[NAMA_BAHAN_BAKU]</td>
										<td>$hasilstock[TGL_STOK]</td>
										<td style='text-align:right'>".convertToRupiah($hasilstock['STOK_AWAL']) ." $hasilstock[SATUAN_BAHAN_BAKU]</td>
										<td style='text-align:right'>".convertToRupiah($hasilstock['BARANG_MASUK']) ." $hasilstock[SATUAN_BAHAN_BAKU]</td>
										<td style='text-align:right'>".convertToRupiah($hasilstock['BARANG_KELUAR']) ." $hasilstock[SATUAN_BAHAN_BAKU]</td>
										<td style='text-align:right'>".convertToRupiah($hasilstock['STOK_AKHIR']) ." $hasilstock[SATUAN_BAHAN_BAKU]</td>
									
									</tr>";
								}
					}else{
						$querystock = mysqli_query ($konek, "SELECT a.ID_BAHAN_BAKU, a.TGL_STOK, a.STOK_AWAL, a.BARANG_MASUK, a.BARANG_KELUAR, a.STOK_AKHIR, b.NAMA_BAHAN_BAKU, b.SATUAN_BAHAN_BAKU, b.AKSI_BAHAN_BAKU
						FROM stok_bahan_baku a JOIN bahan_baku b ON a.ID_BAHAN_BAKU=b.ID_BAHAN_BAKU WHERE a.TGL_STOK BETWEEN '".$_POST['tgl1']."' AND '".$_POST['tgl2']."' AND b.AKSI_BAHAN_BAKU = 1 ORDER BY b.NAMA_BAHAN_BAKU ASC");
						if($querystock == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($hasilstock = mysqli_fetch_array ($querystock)){
							
							echo "
								<tr>
									<td>$hasilstock[NAMA_BAHAN_BAKU]</td>
									<td>$hasilstock[TGL_STOK]</td>
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