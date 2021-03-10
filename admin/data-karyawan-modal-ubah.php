<?php

include "../includes/koneksi.php";

$querytampilkaryawan = mysqli_query($konek, "SELECT * FROM karyawan WHERE ID_KARYAWAN = '".$_POST['kode']."'");
if($querytampilkaryawan == false){
	die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
$hasillkaryawan = mysqli_fetch_array($querytampilkaryawan);

?>
<!-- Modal Popup hasillkaryawan -->
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><i class="glyph-icon icon-edit"> <strong>Ubah Data Karyawan</strong></i></h4>
					</div>
					<div class="modal-body">
						<form action="Ubah-Karyawan" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label>Nama Karyawan</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="glyph-icon icon-circle-o"></i>
										</div>
										<input name="kodekaryawan" type="hidden" class="form-control" value="<?php echo $hasillkaryawan["ID_KARYAWAN"]; ?>" readonly />
										<input name="namakaryawan" type="text" class="form-control" value="<?php echo $hasillkaryawan["NAMA_KARYAWAN"]; ?>" required 
											oninvalid="this.setCustomValidity('Harus diisi !')"
											oninput="setCustomValidity('')"/>
									</div>
							</div>
							<div class="form-group">
								<label>Jabatan</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="glyph-icon icon-circle-o"></i>
										</div>
										<select id="jabatanubah" name="jabatan" class="form-control" required="">
										<?php
											if($hasillkaryawan["JABATAN"] == 'Kasir'){
												echo "<option selected value='Kasir'>Kasir</option>
													<option value='Barista'>Barista</option>
													<option value='Pramusaji'>Pramusaji</option>";
											}else if($hasillkaryawan["JABATAN"] == 'Barista'){
												echo "<option selected value='Barista'>Barista</option>
													<option value='Pramusaji'>Pramusaji</option>
													<option value='Kasir'>Kasir</option>";
											}else if($hasillkaryawan["JABATAN"] == 'Pramusaji'){
												echo "<option selected value='Pramusaji'>Pramusaji</option>
													<option value='Barista'>Barista</option>
													<option value='Kasir'>Kasir</option>";
											}else{
												echo "error";
											}
										?>
										</select>
									</div>
							</div>
							<div style="display:none;" id="usernameubah" class="form-group">
								<label>Username</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="glyph-icon icon-circle-o"></i>
										</div>
										<input id="usernameubah1" name="username" type="text" class="form-control" placeholder="Username" required/>
									</div>
							</div>
							<div style="display:none;" id="passwordubah" class="form-group">
								<label>Password</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="glyph-icon icon-circle-o"></i>
										</div>
										<input id="passwordubah1" name="password" minlength="6" type="text" class="form-control" placeholder="Password" required/>
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
	<script language="JavaScript" type="text/JavaScript">
		$(document).ready(function(){
			$('#jabatanubah').on('change', function() {
				if ( this.value == 'Kasir')
				{
					$("#usernameubah").show();
					$("#passwordubah").show();
				}
				else if ( this.value == 'Pramusaji')
				{
					$("#usernameubah").show();
					$("#passwordubah").show();
				}
				else if ( this.value == 'Barista')
				{
					$("#usernameubah").hide();
					$("#passwordubah").hide();
						$(document).ready(function(){
							$("button").click(function(){
								$("#usernameubah1").removeAttr("required");
								$("#passwordubah1").removeAttr("required");
							});
						});
				}
				else
				{
					
				}
			});
		}); 
	</script>