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
    <h2>Data Opname Bahan Baku</h2>
<div class="panel">
<div class="panel-body">
    <a href="././App-Laporan-Stok-Bahan" title="Stok Bahan Baku">
    <button type="button">
    <h4 class="modal-title"><i class="glyph-icon icon-eye"> <strong>Lihat Laporan Stok Bahan Baku</strong></i></h4>
    </button></a><br><br>
    <div class="example-box-wrapper">
<form name="formopnamebahan" class="formopnamebahan" action="#" enctype="multipart/form-data" method="POST">
                    
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-12">
                    <!-- Horizontal Form -->
                        <div class="box box-info">
                            <div class="box-body">
                                <div class="tampildatastockbahan">
                                
                                    <?php
                                        include "data-stokopname-bahan.php";
                                    ?>
                                
                                </div>
                            </div>
                        </div>
                        <!-- /.box -->
                    </div>
                    <!--/.col (right) -->
                </form>
</div>
</div>
</div>
        
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
    <script type="text/javascript">
    $(document).on('click','.tombol-simpan',function(){
        var kode = $(this).attr("kode");
        var jml = $("#last_input_"+kode).val();
            if(jml == ""){
                var dialog = bootbox.dialog({
                    title: 'Peringatan !',
                    message: '<p class="text-center">Silahkan isi stock akhir untuk menyimpan data...</p>',
                    size: 'small',
                    closeButton: false
                });
                // do something in the background
                setTimeout(function(){
                    dialog.modal('hide');
                }, 3000);
                setTimeout(function(){
                    document.getElementById("last_input_"+kode).focus();
                }, 3000);
                
            }else{
                bootbox.confirm("Anda yakin untuk simpan data ? Pastikan data yang anda masukan benar", function(result){
                    if(result==true){
                        $.ajax({
                            type: 'POST',
                            url: "aksiopnamebahan.php",
                            data:{kode: kode, jml: jml,},
                            success: function(data) {
                                var dialog = bootbox.dialog({
                                    message: '<p class="text-center">Data berhasil disimpan...</p>',
                                    size: 'small',
                                    closeButton: false
                                });
                                // do something in the background
                                setTimeout(function(){
                                    dialog.modal('hide');
                                }, 3000);
                                $(".tampildatastockbahan").load("data-stokopname-bahan.php");
                            }
                        });
                    }else{
                        
                    }
                });
            }
    });
</script>

<?php include('include/footer.php');?>