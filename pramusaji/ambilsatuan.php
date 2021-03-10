<?php
include "../includes/koneksi.php";
$idbahan = $_GET['satuan'];
$namabahan = mysqli_query($konek, "SELECT ID_BAHAN_BAKU, NAMA_BAHAN_BAKU, SATUAN_BAHAN_BAKU, AKSI_BAHAN_BAKU FROM bahan_baku WHERE ID_BAHAN_BAKU='$idbahan'");

while($k = mysqli_fetch_array($namabahan)){
    echo "<option value='$k[SATUAN_BAHAN_BAKU]'>$k[SATUAN_BAHAN_BAKU]</option>";
}
?>