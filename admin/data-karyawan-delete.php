<?php

include "../includes/koneksi.php";

if($delete = mysqli_query ($konek, "DELETE from karyawan WHERE ID_KARYAWAN = '".$_GET['kode']."'")){
    echo "<script> alert('Data Berhasil Dihapus'); location.href='App-Karyawan' </script>";
    exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($konek));

?>