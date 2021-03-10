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
    <h2>Data Bahan Baku</h2>
<div class="panel">
<div class="panel-body">
    <div class="example-box-wrapper">
    <button class="btn btn-info btn-md" data-toggle="modal" data-target="#ModalAdd">
                        <i class="glyph-icon icon-plus"> Tambah Data</i>
                    </button>
                   
<table id="data" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
<thead>
<tr>
    <th>ID Bahan Baku</th>
    <th>Nama Bahan Baku</th>
    <th>Satuan</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>
    <?php
                        $querybk = mysqli_query ($konek, "SELECT * FROM bahan_baku");
                        if($querybk == false){
                            die ("Terjadi Kesalahan : ". mysqli_error($konek));
                        }
                        while ($hasilbk = mysqli_fetch_array ($querybk)){
                            
                            echo "
                                <tr>
                                    <td>$hasilbk[ID_BAHAN_BAKU]</td>
                                    <td>$hasilbk[NAMA_BAHAN_BAKU]</td>
                                    <td>$hasilbk[SATUAN_BAHAN_BAKU]</td>
                                    <td>";
                                        if($hasilbk['AKSI_BAHAN_BAKU'] == 1){
                                            echo "<a href='#' class='open_modal' id='$hasilbk[ID_BAHAN_BAKU]'><i class='glyph-icon icon-edit' aria-hidden='true'></i></a>  |
                                                    <a href='Delete-Bahan-Baku?kode=".$hasilbk["ID_BAHAN_BAKU"]."' title='Hapus' data-toggle='tooltip' onclick='return confirm(\"Anda yakin akan menghapus ".$hasilbk['NAMA_BAHAN_BAKU']."?\")'><span class='glyph-icon icon-trash' aria-hidden='true'></span></a>
                    
                                            ";
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


       <!-- Modal Tambah Bahan Baku -->
        <div id="ModalAdd" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="glyph-icon icon-plus"> <strong>Tambah Data Bahan Baku</strong></i></h4>
                    </div>
                    <div class="modal-body">
                        <form action="Tambah-Bahan-Baku" name="modal_popup" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <label>Nama Bahan</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-circle-o"></i>
                                        </div>
                                        <input name="kodebahan" type="hidden" class="form-control" placeholder="Kode Bahan" value="<?php echo $noidbahan1 ?>" readonly="readonly"/>
                                        <input name="namabahan" type="text" class="form-control" placeholder="Bahan Baku" required 
                                            oninvalid="this.setCustomValidity('Harus diisi !')"
                                            oninput="setCustomValidity('')"/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Stok Awal</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-circle-o"></i>
                                        </div>
                                        <input name="stockawal" type="text" class="form-control" placeholder="0" required pattern = "[0-9]+"
                                            oninvalid="this.setCustomValidity('Harus diisi angka!')"
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
                                            <option selected disabled="disabled" value="">Pilih Satuan</option>
                                            <option value="Gram">Gram</option>
                                            <option value="Kilogram">Kg</option>
                                            <option value="Mililiter">Ml</option>
                                            <option value="Liter">Liter</option>
                                            <option value="Pcs">Pcs</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-circle-o"></i>
                                        </div>
                                        <input name="tglstock" type="text" class="form-control" placeholder="Tanggal Stock" value="<?php echo $tanggal; ?>" readonly />
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
        
        <!-- Modal Popup Bahan Baku Edit -->
        <div id="ModalUbahBahan" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
        
        
        
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

<?php include('include/footer.php');?>