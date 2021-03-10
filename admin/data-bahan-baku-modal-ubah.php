<?php

include "../includes/koneksi.php";

$querytampilbahan = mysqli_query($konek, "SELECT * FROM bahan_baku WHERE ID_BAHAN_BAKU = '".$_POST['kode']."'");
if($querytampilbahan == false){
	die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
$hasiltampilbahan = mysqli_fetch_array($querytampilbahan);

?>

<!-- Modal Popup hasiltampilbahan -->
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><i class="glyph-icon icon-edit"> <strong>Ubah Data Bahan Baku</strong></i></h4>
					</div>
					<div class="modal-body">
						<form action="Ubah-Bahan-Baku" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label>Bahan Baku</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-circle-o"></i>
										</div>
										<input name="kodebahan" type="hidden" class="form-control" placeholder="Kode Bahan" value="<?php echo $hasiltampilbahan['ID_BAHAN_BAKU'] ?>" readonly="readonly"/>
										<input name="namabahan" type="text" class="form-control" placeholder="Bahan Baku" value="<?php echo $hasiltampilbahan['NAMA_BAHAN_BAKU'] ?>" required 
											oninvalid="this.setCustomValidity('Harus diisi !')"
											oninput="setCustomValidity('')"/>
									</div>
							</div>
							<div class="form-group">
								<label>Satuan</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-circle-o"></i>
										</div>
										<select name="satuan" class="form-control" required 
											oninvalid="this.setCustomValidity('Pilih Satuan !')"
											oninput="setCustomValidity('')">
											<?php
												if($hasiltampilbahan['SATUAN_BAHAN_BAKU'] == 'Gram'){
													echo "<option selected value='Gram'>Gram</option>
															<option value='Kilogram'>Kg</option>
                                            				<option value='Mililiter'>Ml</option>
                                            				<option value='Liter'>Liter</option>
                                            				<option value='Pcs'>Pcs</option>";
												}else if($hasiltampilbahan['SATUAN_BAHAN_BAKU'] == 'Kilogram'){
													echo "<option value='Gram'>Gram</option>
															<option selected value='Kilogram'>Kg</option>
                                            				<option value='Mililiter'>Ml</option>
                                            				<option value='Liter'>Liter</option>
															<option value='Pcs'>Pcs</option>";
												}else if($hasiltampilbahan['SATUAN_BAHAN_BAKU'] == 'Mililiter'){
													echo "<option value='Gram'>Gram</option>
															<option value='Kilogram'>Kg</option>
                                            				<option selected value='Mililiter'>Ml</option>
                                            				<option value='Liter'>Liter</option>
															<option value='Pcs'>Pcs</option>";
												}else if($hasiltampilbahan['SATUAN_BAHAN_BAKU'] == 'Liter'){
													echo "<option value='Gram'>Gram</option>
															<option value='Kilogram'>Kg</option>
                                            				<option value='Mililiter'>Ml</option>
                                            				<option selected value='Liter'>Liter</option>
															<option value='Pcs'>Pcs</option>";
												}else if($hasiltampilbahan['SATUAN_BAHAN_BAKU'] == 'Pcs'){
													echo "<option value='Gram'>Gram</option>
															<option value='Kilogram'>Kg</option>
                                            				<option value='Mililiter'>Ml</option>
                                            				<option value='Liter'>Liter</option>
															<option selected value='Pcs'>Pcs</option>";
												}else{
													echo "error";
												}
											?>
										</select>
									</div>
							</div>
							<div class="modal-footer">
								<button class="btn btn-primary" type="submit">
									Simpan
								</button>
								<button type="reset" class="btn btn-default"  data-dismiss="modal" aria-hidden="true">
									Batal
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
<script src="../aset/plugins/select2/select2.full.min.js"></script>
	<script>
		$(function () {
			//Initialize Select2 Elements
			$(".select2").select2();
		});
	</script>