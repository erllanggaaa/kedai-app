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
  <link rel="stylesheet" href="../asset/bootstrap.min.css">
  <link rel="stylesheet" href="include/snackbar.css">
  <link rel="stylesheet" href="../asset/select2/select2.min.css">
  <link rel="stylesheet" href="../aset/assets/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/fontawesome/4.7.0/css/font-awesome.min.css">
  <script src="include/validator.min.js"></script>
  <script src="../aset/assets/jquery.min.js"></script>
  <script type="text/javascript" src="include/jquery.js"></script>
  <script type="text/javascript" src="realtimetest.js"></script>
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
    <h2>Data Terima Bahan Baku Masuk</h2>
<div class="panel-body">
    <div class="example-box-wrapper">
<!-- Main content -->
        <section class="content">
            <div class="row">
                <form name="formdetailpemesanan" class="formdetailpemesanan" action="" enctype="multipart/form-data" method="POST">
                    <!-- left column -->
                    <div class="col-md-10">
                        <div class="box box-info">
                            <div class="box-header with-border">
              <h3 class="box-title"></h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="col-md-3">
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>No. Bahan Baku Masuk</label>
                                        <?php
                                            $sqlpemesanan = mysqli_query($konek, "SELECT * FROM bahan_masuk WHERE KETERANGAN = 'Masuk'");
                                            $hasilid = "var prdName = new Array();\n";    
                                            echo '<select class="form-control select2" id="pemesanan" name="pemesanan" required style="width: 100%;" onchange="changeValue(this.value)"> required';    
                                            echo '<option selected disabled value="">Cari No. Bahan Baku Masuk...</option>';    
                                            while ($row = mysqli_fetch_array($sqlpemesanan)) {    
                                            echo '<option value="' . $row['ID_BAHAN_MASUK'] . '">' . $row['ID_BAHAN_MASUK'] . '</option>';    
                                            $hasilid .= "prdName['" . $row['ID_BAHAN_MASUK'] . "'] = {name:'" . addslashes($row['TGL_MASUK']) . "'};\n";
                                            }    
                                            echo '</select>';    
                                        ?>
                                            <script type="text/javascript">    
                                                <?php echo $hasilid; ?>  
                                                function changeValue(id){  
                                                    document.getElementById('tgl').value = prdName[id].name;
                                                };  
                                            </script>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Masuk</label>
                                            <input type="text" class="form-control" placeholder="Tanggal Masuk" id="tgl" name="tgl" readonly>
                                            <input type="hidden" class="form-control" value="<?php echo $noidsupplier1; ?>" id="supplier" name="supplier" readonly>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No. Nota</label>
                                            <input type="text" class="form-control" placeholder="No. Nota" id="nota" name="nota" required>
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Toko/Supplier</label>
                                            <input type="text" class="form-control" placeholder="Toko/Supplier" id="namasupplier" name="namasupplier" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                            <input type="text" class="form-control" placeholder="Alamat Toko/Supplier" id="alamat" name="alamat" required>
                                    </div>
                                    <div class="form-group">
                                        <label>No. Tlp</label>
                                            <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" placeholder="No. Tlp Toko/Supplier" id="tlp" name="tlp" required>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
          
                            </div>
                        </div>
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-10">
                    <!-- Horizontal Form -->
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Detail Bahan Baku Masuk</h3>
                            </div>
                            <div class="box-body">
                                <div class="tampildataorder">
                                    <?php
                                        include "data-terima-bahan-tmp.php";
                                    ?>
                                </div>
                            </div>
                            <div id="btnselesai" class="box-footer">
                                <button type="button" id="selesai" class="btn btn-info btn-block">Selesai</button>
                            </div>
                        </div>
                        <!-- /.box -->
                    </div>
                    <!--/.col (right) -->
                </form>
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
<script language="JavaScript" type="text/JavaScript">
$(document).ready(function(){
    $('#pemesanan').on('change', function() {
      var m=document.formdetailpemesanan.pemesanan.value;
        $.ajax({
            url: "data-terima-bahan-tmp.php",
            type: "POST",
            data : {kode: m,},
            success: function (ajaxData){
                $(".tampildataorder").html(ajaxData);
                
            }
        });
    });
}); 
</script>
<script type="text/javascript">
    $(document).on('click','.tombol-simpan',function(){
        var kode = $(this).attr("kode");
        var harga = $("#last_input_"+kode).val();
        var harga1 = $("#first_input_"+kode).val();
        var dataString = 'id='+ kode +'&input_harga='+harga;
        
            if(harga == ""){
                var dialog = bootbox.dialog({
                    title: 'Peringatan !',
                    message: '<p class="text-center">Silahkan isi sub total untuk menyimpan data...</p>',
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
            }else {
                $.ajax({
                type: 'POST',
                url: "aksihargabahan.php",
                data:{kode: kode, harga: harga,},
                success: function(ajaxData) {
                    var m=document.formdetailpemesanan.pemesanan.value;
                        $.ajax({
                            url: "data-terima-bahan-tmp.php",
                            type: "POST",
                            data : {kode: m,},
                            success: function (ajaxData){
                                var dialog = bootbox.dialog({
                                    message: '<p class="text-center">Data berhasil disimpan...</p>',
                                    size: 'small',
                                    closeButton: false
                                });
                                // do something in the background
                                setTimeout(function(){
                                    dialog.modal('hide');
                                }, 3000);
                                $(".tampildataorder").html(ajaxData);
                            }
                        });
                }
            });
            }
    });
</script>
<script type="text/javascript" >
function formValidation(oEvent) { 
oEvent = oEvent || window.event;
var txtField = oEvent.target || oEvent.srcElement; 


var t1ck=true;
var msg=" ";
if(document.getElementById("pemesanan").value.length < 5 )
{ t1ck=false;msg = msg + " Cari No. Bahan Baku Masuk";}
if(document.getElementById("nota").value.length < 5 )
{ t1ck=false; msg = msg + "Isi No. Nota";}
if(document.getElementById("namasupplier").value.length < 5 )
{ t1ck=false; msg = msg + "Isi Nama Supplier";}
if(document.getElementById("alamat").value.length < 5 )
{ t1ck=false; msg = msg + "Isi Alamat";}
if(document.getElementById("tlp").value.length < 5 )
{ t1ck=false; msg = msg + "Isi No. Tlp";}

//alert(msg + t1ck);

if(t1ck){document.getElementById("selesai").disabled = false; }
else{document.getElementById("selesai").disabled = true; }
} 


window.onload = function () { 

var selesai = document.getElementById("selesai"); 

var pemesanan = document.getElementById("pemesanan"); 
var nota = document.getElementById("nota");
var namasupplier = document.getElementById("namasupplier"); 
var alamat = document.getElementById("alamat");
var tlp = document.getElementById("tlp"); 

var t1ck=false;
document.getElementById("selesai").disabled = true;
pemesanan.onclick = formValidation;
nota.onkeyup = formValidation; 
namasupplier.onkeyup = formValidation; 
alamat.onkeyup = formValidation; 
tlp.onkeyup = formValidation; 
}
</script>
<script>
$(document).ready(function(){
    $("#selesai").click(function(){
        bootbox.confirm("Anda yakin untuk menyelesaikan transaksi ini ?", function(result){
            if(result==true){
                var data = $('.formdetailpemesanan').serialize();
                $.ajax({
                    type: 'POST',
                    url: "data-terima-bahan-simpan.php",
                    data: data,
                    success: function() {
                        
                        var dialog = bootbox.dialog({
                            message: '<p class="text-center">Data berhasil disimpan...</p>',
                            size: 'small',
                            closeButton: false
                        });
                        // do something in the background
                        setTimeout(function(){
                            dialog.modal('hide');
                        }, 3000);
                        setTimeout(function(){
                            window.location.reload();
                        }, 3000);
                    }
                });
            }else{
                /* Jika Tombol Cancel Ditekan */
    
            }
        });
    }); 
});
</script>

<?php include('include/footer.php');?>