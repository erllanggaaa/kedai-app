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
    <h2>Data Pemasukkan</h2>
<div class="panel">
<div class="panel-body">
    <div class="example-box-wrapper">
<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-4">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="formkasmasuk" action="#" class="formkasmasuk" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="jurnal">No. Jurnal</label>
                  <input type="text" class="form-control" id="nojurnal" placeholder="No. Jurnal" name="nojurnal" value="<?php echo $noidjurnal1 ?>" readonly required >
                  <input type="hidden" class="form-control" id="idkasmasuk" placeholder="ID Kas Masuk" name="idkasmasuk" value="<?php echo $noidkasmasuk1 ?>" readonly required >
                  <input type="hidden" class="form-control" id="idnorut1" name="idnorut1" value="<?php echo $noidnorut1 ?>" readonly required >                  
                </div>
                <div class="form-group">
                  <label for="tanggal">Tanggal</label>
                  <input type="text" class="form-control" id="tgl" placeholder="Tanggal" name="tgl" value="<?php echo date("Y-m-d"); ?>" readonly required >
                </div>
                <div class="form-group">
                                <label>Keterangan</label>
                                    <div class="input-group">
                                        <select name="keterangan" class="form-control select2" required 
                                            oninvalid="this.setCustomValidity('Pilih Keterangan !')"
                                            oninput="setCustomValidity('')">
                                            <option selected disabled="disabled" value="">Pilih Keterangan Sebagai :</option>
                                            <option value="Penjualan">Penjualan</option>
                                        </select>
                                    </div>
                </div>
                <div class="form-group">
                  <label for="total">Total (Rp.)</label>
                  <input type="text" class="form-control" onkeyup="FormatCurrency(this)" id="total" placeholder="0" name="total" value="" required >
                </div>
            </div>
              <div class="box-footer">
                <button type="button" id="posting" class="btn btn-success btn-block">Posting</button>
              </div>
            </form>
          </div>
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-8">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Pemasukkan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="#" class="form-horizontal" method="POST">
              <div class="box-body">
                <div class="tampildatakasmasuk">
                    <?php
                        include "data-kas-masuk-tmp.php";
                    ?>
                    
                </div>
              </div>

              <!-- /.box-body -->
            </form>
            <a href="././App-Laporan-Pemasukkan" title="Laporan Pemasukkan">
    <button type="button">
    <h4 class="modal-title"><i class="glyph-icon icon-eye"> <strong>Lihat Laporan Pemasukkan</strong></i></h4>
    </button></a>
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
<script>
$(document).ready(function(){
    $("#posting").click(function(){
        var keterangan = $("#keterangan").val();
        var total = $("#total").val();
        if(keterangan == ""){
            var dialog = bootbox.dialog({
                title: 'Peringatan !',
                message: '<p class="text-center">Isi Keterangan...</p>',
                size: 'small',
                loseButton: false
            });
            // do something in the background
            setTimeout(function(){
                dialog.modal('hide');
            }, 2000);
            setTimeout(function(){
                document.getElementById("keterangan").focus();
            }, 2000);
            
        }else if(total == ""){
            var dialog = bootbox.dialog({
                title: 'Peringatan !',
                message: '<p class="text-center">Isi Total...</p>',
                size: 'small',
                loseButton: false
            });
            // do something in the background
            setTimeout(function(){
                dialog.modal('hide');
            }, 2000);
            setTimeout(function(){
                document.getElementById("total").focus();
            }, 2000);
            
        }else{
            
            bootbox.confirm("Anda yakin untuk posting data ?", function(result){
                if(result==true){
                var data = $('.formkasmasuk').serialize();
                $.ajax({
                    type: 'POST',
                    url: "posting-kas-masuk.php",
                    data: data,
                    success: function() {
                        
                        var dialog = bootbox.dialog({
                            message: '<p class="text-center">Data berhasil diposting...</p>',
                            size: 'small',
                            closeButton: false
                        });
                        // do something in the background
                        setTimeout(function(){
                            dialog.modal('hide');
                        }, 3000);
                        setTimeout(function(){
                            $('.tampildatakasmasuk').load("data-kas-masuk-tmp.php");
                            document.getElementById("formkasmasuk").reset();
                        }, 3000);
                    }
                });
                }else{
                /* Jika Tombol Cancel Ditekan */
    
                }
            });
        }
        
        
    }); 
});
</script>

<script src="../aset/plugins/select2/select2.full.min.js"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $(".select2").select2();
        });
    </script>

<?php include('include/footer.php');?>