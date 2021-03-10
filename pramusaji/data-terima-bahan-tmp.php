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
			<table class="table table-bordered table-striped table-scalable">	
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Bahan</th>
						<th>Harga @</th>
						<th>Qty</th>
						<th>Satuan</th>
						<th style='text-align:center'>Sub Total</th>
						<th style='text-align:center'>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
						if(empty($_POST['kode'])){
							echo "<tr><td colspan=8><font color=red>Data Kosong...</font></td></tr>";
						}else{
							$no = 0;
						$querypembelian = mysqli_query ($konek, "SELECT a.ID_DETAIL, a.ID_BAHAN_MASUK, a.ID_BAHAN_BAKU, a.HARGA_DETAIL_BAHAN, a.JUMLAH, a.SUB_TOTAL, a.STATUS_DETAIL_BAHAN, b.NAMA_BAHAN_BAKU, b.SATUAN_BAHAN_BAKU
						FROM detail_bahan_masuk a JOIN bahan_baku b ON a.ID_BAHAN_BAKU=b.ID_BAHAN_BAKU WHERE a.ID_BAHAN_MASUK = '".$_POST['kode']."'");
						if($querypembelian == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($hasilpembelian = mysqli_fetch_array ($querypembelian)){
							$hargasatuan = angka1($hasilpembelian['HARGA_DETAIL_BAHAN']);
							
							$no++;
							if($hasilpembelian['SUB_TOTAL'] == null){
								$harga = "";
							}else{
								$harga = angka1($hasilpembelian['SUB_TOTAL']);
							}
							echo "
								<tr>
									<td>$no</td>
									<td>$hasilpembelian[NAMA_BAHAN_BAKU]</td>
									<td id='hargadetail' style='text-align:right'><input type=text size=10 style='text-align:right;' class='form-control' value='$hargasatuan' id='first_input_$hasilpembelian[ID_DETAIL]' readonly></td>
									<td>$hasilpembelian[JUMLAH]</td>
									<td>$hasilpembelian[SATUAN_BAHAN_BAKU]</td>
									<td style='text-align:center'><input type=text size=10 style='text-align:right;' class='form-control' onkeyup='FormatCurrency(this)' value='$harga' placeholder='Isi Sub Total' id='last_input_$hasilpembelian[ID_DETAIL]' posisi='$hasilpembelian[ID_DETAIL]'></td>
									<td style='text-align:center'>";
										if($hasilpembelian['STATUS_DETAIL_BAHAN'] == 'Masuk'){
											echo "<a class='tombol-simpan' kode='$hasilpembelian[ID_DETAIL]'><button type=button id=simpandata onclick='getfocus()' title=simpan class='btn btn-success'>Simpan</button></a>";
										}else{
											echo "<a class='tombol-simpan' kode='$hasilpembelian[ID_DETAIL]'><button type=button id=simpandata title=simpan class='btn btn-danger'>Ubah</button></a>";
										}
									
							echo	"</td>
								</tr>";
						}
						}
					?>
				</tbody>
				<tfoot>
				<?php
					$total = mysqli_query($konek, "SELECT SUM(SUB_TOTAL) AS TOTAL FROM detail_bahan_masuk WHERE ID_BAHAN_MASUK = '".$_POST['kode']."'");
					$hasiltotal = mysqli_fetch_array($total);
				?>
					<tr>
						<th colspan="6" style="text-align:right">Total</th>
						<th><input type=text size=10 style='text-align:right;' class='form-control' value='<?php echo angka1($hasiltotal['TOTAL']) ?>' id='total' name='total' readonly></th>
					</tr>
				</tfoot>
			</table>
			</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#data').DataTable();
});
</script>
