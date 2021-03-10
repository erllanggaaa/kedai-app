<?php
session_start();
include "../includes/koneksi.php";
include "include/auth_user.php";
include "include/fungsi.php";
date_default_timezone_set('Asia/Jakarta');
$tanggal1 = mktime(date("m"),date("d"),date("Y"));
$tanggal = date("Y-m-d", $tanggal1);
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
    <h2>Ubah Password</h2>
<div class="panel">
<div class="panel-body">
    <div class="example-box-wrapper">

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <div class="row">
        <form name="formubahpassword" class="formubahpassword" method="POST">
        <div class="col-md-6">
          <div><p>
            <div class="box-body">
              <div class="form-group">
                <label>Password Lama</label>
                <div class="input-group">
                  <input type="password" class="form-control" minlength="6" placeholder="Password Lama" size="50" name="passlama" id="passlama" required autofocus >
                </div>
              </div>
              <div class="form-group">
                <label>Password Baru</label>
                <div class="input-group">
                  <input type="password" class="form-control" minlength="6" placeholder="Password Baru (Min 6 Karakter)" size="50" name="passbaru" id="passbaru" required >
                </div>
              </div>
               <div class="form-group">
                <div class="input-group">
                  <button class="btn btn-success" id="simpan" type="button">Simpan</button>
                </div>
                <!-- /.input group -->
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        </form>
        <!-- /.col (right) -->
      </div>
                </div><!-- /.box-header -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
        
    </div><!-- /.content-wrapper -->
   
    </div><!-- ./wrapper -->
    <!-- Library Scripts -->
    <?php include('include/script-tambahan.php');?>
    <script type="text/javascript" >
function formValidation(oEvent) { 
oEvent = oEvent || window.event;
var txtField = oEvent.target || oEvent.srcElement; 

var t1ck=true;
var msg=" ";
if(document.getElementById("passlama").value.length < 6 )
{ t1ck=false;msg = msg + " Isi Password Lama";}
if(document.getElementById("passbaru").value.length < 6 )
{ t1ck=false; msg = msg + " Isi Password Baru";}

//alert(msg + t1ck);

if(t1ck){document.getElementById("simpan").disabled = false; }
else{document.getElementById("simpan").disabled = true; }
} 

window.onload = function () { 

var simpan = document.getElementById("simpan"); 

var passlama = document.getElementById("passlama"); 
var passbaru = document.getElementById("passbaru");

var t1ck=false;
document.getElementById("simpan").disabled = true; 
passlama.onkeyup = formValidation; 
passbaru.onkeyup = formValidation; 
}
</script>
<script>
$(document).ready(function(){
    $("#simpan").click(function(){
        bootbox.confirm("Anda yakin untuk merubah password ?", function(result){
            if(result==true){
                var data = $('.formubahpassword').serialize();
                $.ajax({
                    type: 'POST',
                    url: "simpan-ubah-password.php",
                    data: data,
                    dataType: 'json',
                    success: function(response) {
                        if(response.status == 1){
                            var dialog = bootbox.dialog({
                                message: '<p class="text-center">Password berhasil diubah<br>Silahkan anda login kembali dalam beberapa detik</p>',
                                size: 'small',
                                closeButton: false
                            });
                            // do something in the background
                            setTimeout(function(){
                                dialog.modal('hide');
                            }, 5000);
                            setTimeout(function(){
                                window.location.href = 'logout';
                            }, 5000);
                        }else{
                            var dialog = bootbox.dialog({
                                message: '<p class="text-center">Password gagal diubah, password lama salah !</p>',
                                size: 'small',
                                closeButton: false
                            });
                            // do something in the background
                            setTimeout(function(){
                                dialog.modal('hide');
                            }, 3000);
                            setTimeout(function(){
                                document.getElementById('passlama').value = "";
                                document.getElementById('passbaru').value = "";
                                document.getElementById('passlama').focus();
                                $("#simpan").attr("disabled", true);
                            }, 3000);
                            
                        }
                    }
                });
            }else{
                        
            }
        });
    }); 
});
</script>

<?php include('include/footer.php');?>