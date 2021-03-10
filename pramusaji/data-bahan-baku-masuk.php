<?php
session_start();
include "../includes/koneksi.php";
include "include/auth_user.php";
include "include/fungsi.php";
?>
<!DOCTYPE html> 
<html lang="en">
<head>

    <style>
        /* Loading Spinner */
        .spinner{margin:0;width:70px;height:18px;margin:-35px 0 0 -9px;position:absolute;top:50%;left:50%;text-align:center}.spinner > div{width:18px;height:18px;background-color:#333;border-radius:100%;display:inline-block;-webkit-animation:bouncedelay 1.4s infinite ease-in-out;animation:bouncedelay 1.4s infinite ease-in-out;-webkit-animation-fill-mode:both;animation-fill-mode:both}.spinner .bounce1{-webkit-animation-delay:-.32s;animation-delay:-.32s}.spinner .bounce2{-webkit-animation-delay:-.16s;animation-delay:-.16s}@-webkit-keyframes bouncedelay{0%,80%,100%{-webkit-transform:scale(0.0)}40%{-webkit-transform:scale(1.0)}}@keyframes bouncedelay{0%,80%,100%{transform:scale(0.0);-webkit-transform:scale(0.0)}40%{transform:scale(1.0);-webkit-transform:scale(1.0)}}
    </style>


    <meta charset="UTF-8">
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
<title>ADMININISTRATOR APP</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- Favicons -->
<link rel="shortcut icon" href="../favicon.ico">

<?php include('include/css.php');?>
<?php include('include/script.php');?>

</head>


    <body>
    
    <div id="loading">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <div id="page-wrapper">
        <div id="page-header" class="bg-gradient-9">
    <div id="mobile-navigation">
        <button id="nav-toggle" class="collapsed" data-toggle="collapse" data-target="#page-sidebar"><span></span></button>
        <a href="../index.php" class="logo-content-small" title="Administrator App"></a>
    </div>
    <div id="header-logo" class="logo-bg">
        <a href="././index.php" class="logo-content-big" title="Administrator App">
            Kedai Kopi <i>Mencong</i>
        </a>
        <a href="././index.php" class="logo-content-small" title="Administrator App">
            Kedai Kopi <i>Mencong</i>
        </a>
    </div>
    

    <div id="header-nav-right">
       
        
        <div class="dropdown">
            <a href="././logout" data-placement="bottom" class="popover-button-header tooltip-button" title="Logout">
                <i class="glyph-icon icon-power-off"></i>
            </a>
            
               
        </div>
    </div><!-- #header-nav-right -->

</div>
        <div id="page-sidebar">
    <div class="scroll-sidebar">
        

<?php
include('include/menu.php');
?>


    </div>
</div>



<div id="page-content-wrapper">
            <div id="page-content">
                
                    <div class="container">

<div id="page-title">
    <h2>Data Bahan Baku Masuk</h2>
<div class="panel-body">
    <div class="example-box-wrapper">
<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
<?php
date_default_timezone_set('Asia/Jakarta');

if(isset($_POST['add'])){
$ID_BAHAN_MASUK   =$_POST['ID_BAHAN_MASUK'];
$ID_DETAIL   =$_POST['ID_DETAIL'];
$ID_BAHAN_BAKU   =$_POST['ID_BAHAN_BAKU'];
$TGL_MASUK  = date("Y-m-d");
$KETERANGAN     =$_POST['KETERANGAN'];
$JUMLAH     =$_POST['JUMLAH'];

$cekuser = mysqli_query($konek, "SELECT * FROM bahan_masuk WHERE ID_BAHAN_MASUK = '$ID_BAHAN_MASUK'");  
  if(mysqli_num_rows($cekuser) <> 0) {
 echo "ERROR : ID sudah terdaftar";
  }else{
    
    $input = mysqli_query($konek, "INSERT INTO bahan_masuk VALUES('$ID_BAHAN_MASUK',NULL,NULL, '$TGL_MASUK', '$KETERANGAN', NULL)") or die(mysql_error());
    if($input){
        echo '<script> alert("Data Berhasil Ditambah"); location.href="App-Terima-Bahan-Baku-Masuk" </script>';  
        $input2 = mysqli_query($konek, "INSERT INTO detail_bahan_masuk VALUES('$ID_DETAIL','$ID_BAHAN_MASUK','$ID_BAHAN_BAKU',NULL, '$JUMLAH', NULL,'Masuk')") or die(mysql_error());
        }
        
        
    
        
    
  }
}
?>

            <!-- form start -->
            <form method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="idpembelian">No. Bahan Baku Masuk</label>
                  <input type="text" class="form-control" placeholder="No. Order Bahan Baku" name="ID_BAHAN_MASUK" value="<?php echo $noidorderbahan1 ?>" readonly required >
                  <input type="hidden" class="form-control" placeholder="No. Id Detail Bahan" name="ID_DETAIL" value="<?php echo $noiddetailbahan1 ?>" readonly required >                  
                </div>
                <div class="form-group">
                  <label for="keterangan">Keterangan</label>
                  <input type="text" class="form-control" name="KETERANGAN" placeholder="Masuk" value="Masuk" readonly required >
                </div>
                <div class="form-group">
                  <label for="tanggal">Tanggal</label>
                  <input type="text" class="form-control" name="TGL_MASUK" value="<?php echo date("Y-m-d"); ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="namabahan">Nama Bahan</label>
                    <select name="ID_BAHAN_BAKU" id="namabahan" class="form-control select2" style="width: 100%;" required="">
                        <option selected disabled="disabled" value="">Pilih Bahan Baku</option>
                            <?php
                                while($hasilbahanbaku = mysqli_fetch_array($sqlbahanbaku)){
                                    echo "<option value=$hasilbahanbaku[ID_BAHAN_BAKU]>$hasilbahanbaku[NAMA_BAHAN_BAKU]</option>";
                                }
                            ?>
                    </select>
                </div>
                <div class="form-group">
                  <label for="satuan">Satuan</label>
                  <select name="satuan" id="satuan" class="form-control" style="width: 100%;" required="">
                        <option selected disabled="disabled" value="">Satuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="jumlah">Jumlah</label>
                  <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" name="JUMLAH" placeholder="0" required >
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" name="add" class="btn btn-success btn-block">Tambah</button>
              </div>
            </form>
          </div>
        </div>
        <!--/.col (left) -->
        
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

        
    <!-- Modal Popup untuk delete--> 
        <div class="modal fade" id="modal_delete">
            <div class="modal-dialog">
                <div class="modal-content" style="margin-top:100px;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" style="text-align:center;">Anda Yakin Untuk Membatalkan ?</h4>
                    </div>    
                    <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                        <a href="#" class="btn btn-danger" id="delete_link">Iya</a>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.content-wrapper -->
   
    </div><!-- ./wrapper -->
    <!-- Library Scripts -->
    <?php include('include/script-tambahan.php');?>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $(".select2").select2();
        });
    </script>
<script type="text/javascript">
var htmlobjek;
$(document).ready(function(){
  $("#namabahan").on('change', function(){
    var satuan = $("#namabahan").val();
    $.ajax({
        url: "ambilsatuan.php",
        data: "satuan="+satuan,
        cache: false,
        success: function(msg){
            $("#satuan").html(msg);
        }
    });
  });


});

</script>


<?php include('include/footer.php');?>