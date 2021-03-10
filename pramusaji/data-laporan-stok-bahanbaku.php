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
    <h2>Data Laporan Stok Bahan Baku</h2>
<div class="panel">
<div class="panel-body">
    <div class="example-box-wrapper">

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">

                </div><!-- /.box-header -->
                <div class="box-body">
                    <form action="App-Cetak-Laporan-Stok-Bahan" target="_blank" method="POST" name="formstock">
                    <div class="row">
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-3">
                            <div class="input-group">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="glyph-icon icon-search"></i>
                                        </div>
                                        <input id="tglawal" name="tglawal" type="text" class="form-control" value="" style="width: 100%;" placeholder="Tanggal Awal">
                                    </div>
                            </div>
                        <!-- /input-group -->
                        </div>
                        <!-- /.col-lg-6 -->
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-3">
                            <div class="input-group">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <label>s/d</label>
                                        </div>
                                        <input id="tglakhir" name="tglakhir" type="text" class="form-control" value="" style="width: 100%;" placeholder="Tanggal Akhir">
                                    </div>
                            </div>
                        <!-- /input-group -->
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                  <br>
                  <div class="laporanstock">
                        <?php
                            include "laporan-stok-bahan.php";
                        ?>
                  </div>
                <br>
                    <a href="go"><button class="btn btn-info" type="submit">Cetak</button></a>
                </form>
                
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
        
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
<script language="JavaScript" type="text/JavaScript">
$(document).ready(function(){
    $('#tglakhir').on('change', function() {
      var m=document.formstock.tglawal.value;
      var n=document.formstock.tglakhir.value;
        $.ajax({
            url: "laporan-stok-bahan.php",
            type: "POST",
            data : {tgl1: m, tgl2: n,},
            success: function (ajaxData){
                $(".laporanstock").html(ajaxData);
            }
        });
    });
}); 
</script>
    <script>
        $(document).ready(function(){
    $('#data').DataTable();
});
    </script>

<?php include('include/footer.php');?>