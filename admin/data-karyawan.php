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
    <h2>Data Karyawan</h2>
<div class="panel">
<div class="panel-body">
    <div class="example-box-wrapper">
    <button class="btn btn-info btn-md" data-toggle="modal" data-target="#ModalAdd">
                        <i class="glyph-icon icon-plus"> Tambah Data</i>
                    </button>
                   
<table id="data" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
<thead>
<tr>
    <th>ID Karyawan</th>
    <th>Nama</th>
    <th>Jabatan</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>
    <?php
                        $querykaryawan = mysqli_query ($konek, "SELECT * FROM karyawan WHERE NOT ID_KARYAWAN ='2705200001' ORDER BY SUBSTR(ID_KARYAWAN,7,4) ASC");
                        if($querykaryawan == false){
                            die ("Terjadi Kesalahan : ". mysqli_error($konek));
                        }
                        while ($hasilkaryawan = mysqli_fetch_array ($querykaryawan)){
                            
                            echo "
                                <tr>
                                    <td>$hasilkaryawan[ID_KARYAWAN]</td>
                                    <td>$hasilkaryawan[NAMA_KARYAWAN]</td>
                                    <td>$hasilkaryawan[JABATAN]</td>
                                    <td>";
                                        if($hasilkaryawan['AKSI_KARYAWAN'] == 1){
                                            if($hasilkaryawan['JABATAN'] == 'Admin'){
                                                
                                            }else{
                                                echo "<a href='#' class='open_modal' id='$hasilkaryawan[ID_KARYAWAN]'><i class='glyph-icon icon-edit' aria-hidden='true'></i></a> |
                                                    <a href='Delete-Karyawan?kode=".$hasilkaryawan["ID_KARYAWAN"]."' title='Hapus' data-toggle='tooltip' onclick='return confirm(\"Anda yakin akan menghapus ".$hasilkaryawan['NAMA_KARYAWAN']."?\")'><span class='glyph-icon icon-trash' aria-hidden='true'></span></a>
                    
                                                    ";
                                            }
                                            
                                        }
                                        
                            echo    "</td>
                                </tr>";
                        }
                    ?>
</tbody>
</table>
</div>
</div>
</div>


        <!-- Modal Popup Tambah Karyawan -->
        <div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="glyph-icon icon-plus"> <strong>Tambah Data Karyawan</strong></i></h4>
                    </div>
                    <div class="modal-body">
                        <form action="Tambah-Karyawan" name="modal_popup" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <label>Nama Karyawan</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="glyph-icon icon-circle-o"></i>
                                        </div>
                                        <input name="kodekaryawan" type="hidden" class="form-control" placeholder="ID Karyawan" value="<?php echo $noidkaryawan1 ?>" readonly="readonly"/>
                                        <input name="namakaryawan" type="text" class="form-control" placeholder="Nama Karyawan" required 
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
                                        <select id="jabatan" name="jabatan" class="form-control" onfocus="doComboFocus(this)" required="">
                                            <option selected disabled="disabled" value="">Pilih Jabatan</option>
                                            <option value="Kasir">Kasir</option>
                                            <option value="Barista">Barista</option>
                                            <option value="Pramusaji">Pramusaji</option>
                                        </select>
                                    </div>
                            </div>
                            <div id="username" class="form-group">
                                <label>Username</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="glyph-icon icon-circle-o"></i>
                                        </div>
                                        <input id="username1" name="username" type="text" class="form-control" placeholder="Username" required/>
                                    </div>
                            </div>
                            <div id="password" class="form-group">
                                <label>Password</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="glyph-icon icon-circle-o"></i>
                                        </div>
                                        <input id="password1" name="password" minlength="6" type="text" class="form-control" placeholder="Password" required/>
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
        </div>
        
        <!-- Modal Popup Karyawan Edit -->
        <div id="ModalUbahKaryawan" class="modal fade" tabindex="-1" role="dialog"></div>
        
        
        
    </div><!-- /.content-wrapper -->
   
    </div><!-- ./wrapper -->
    <!-- Library Scripts -->
    <?php include('include/script-tambahan.php');?>
    <script language="JavaScript" type="text/JavaScript">
        $(document).ready(function(){
            $('#jabatan').on('change', function() {
                if ( this.value == 'Barista')
                {
                    $("#username").hide();
                    $("#password").hide();
                        $(document).ready(function(){
                            $("button").click(function(){
                                $("#username1").removeAttr("required");
                                $("#password1").removeAttr("required");
                            });
                        });
                }
                else
                {
                    $("#username").show();
                    $("#password").show();
                }
            });
        }); 
    </script>

<?php include('include/footer.php');?>