<?php
error_reporting(0);
session_start();
include "../includes/koneksi.php";
function angka1($rp){
    $hasil= number_format($rp,0,",",".");
    return $hasil;
    }
date_default_timezone_set('Asia/Jakarta');
$tanggal1 = mktime(date("m"),date("d"),date("Y"));
$tanggal = date("Y-m-d", $tanggal1);
?>          
            <div class="table-responsive">
            <table id="data" class="table table-bordered table-striped table-scalable">    
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Bahan</th>
                        <th>Tanggal</th>
                        <th>Stok Awal</th>
                        <th>Bahan Masuk</th>
                        <th>Bahan Keluar</th>
                        <th>Stok Akhir</th>
                        <th style='text-align:center'>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 0;
                        $queryopnamebahan = mysqli_query ($konek, "SELECT a.ID_BAHAN_BAKU, a.TGL_STOK, a.STOK_AWAL, a.BARANG_MASUK, a.BARANG_KELUAR, a.STOK_AKHIR, b.NAMA_BAHAN_BAKU, b.SATUAN_BAHAN_BAKU, b.AKSI_BAHAN_BAKU
                        FROM stok_bahan_baku a JOIN bahan_baku b ON a.ID_BAHAN_BAKU=b.ID_BAHAN_BAKU WHERE a.TGL_STOK = (SELECT MAX(TGL_STOK) FROM stok_bahan_baku AS b WHERE a.ID_BAHAN_BAKU=b.ID_BAHAN_BAKU) AND b.AKSI_BAHAN_BAKU = 1 ORDER BY b.NAMA_BAHAN_BAKU ASC");
                        if($queryopnamebahan == false){
                            die ("Terjadi Kesalahan : ". mysqli_error($konek));
                        }
                        while ($hasilopnamebahan = mysqli_fetch_array ($queryopnamebahan)){
                            $awal = angka1($hasilopnamebahan['STOK_AWAL']);
                            $masuk = angka1($hasilopnamebahan['BARANG_MASUK']);
                            $keluar = angka1($hasilopnamebahan['BARANG_KELUAR']);
                            $akhir = angka1($hasilopnamebahan['STOK_AKHIR']);
                            $no++;
                            if($hasilopnamebahan['TGL_STOK'] == $tanggal){
                                $tampil = $akhir;
                                $readonly = "readonly";
                            }else{
                                $tampil = "";
                                $readonly = "";
                            }
                            echo "
                                <tr>
                                    <td>$no</td>
                                    <td>$hasilopnamebahan[NAMA_BAHAN_BAKU]</td>
                                    <td>$hasilopnamebahan[TGL_STOK]</td>
                                    <td>$awal $hasilopnamebahan[SATUAN_BAHAN_BAKU]</td>
                                    <td>$masuk $hasilopnamebahan[SATUAN_BAHAN_BAKU]</td>
                                    <td>$keluar $hasilopnamebahan[SATUAN_BAHAN_BAKU]</td>
                                    <td style='text-align:center'><input type=text size=6 style='text-align:right;' class='form-control' onkeyup='FormatCurrency(this)' placeholder='Stok Akhir' value='$tampil' id='last_input_$hasilopnamebahan[ID_BAHAN_BAKU]' posisi='$hasilopnamebahan[ID_BAHAN_BAKU]' $readonly></td>
                                    <td style='text-align:center'>";
                                        if($hasilopnamebahan['TGL_STOK'] == $tanggal){
                                            echo "<a class='tombol-simpan' kode='$hasilopnamebahan[ID_BAHAN_BAKU]'><button type=button disabled id=simpandata class='btn btn-success'>Simpan</button></a>";
                                        }else{
                                            echo "<a class='tombol-simpan' kode='$hasilopnamebahan[ID_BAHAN_BAKU]'><button type=button id=simpandata title=simpan class='btn btn-success'>Simpan</button></a>";
                                        }
                                    
                            echo    "</td>
                                </tr>";
                        }
                    ?>
                </tbody>
            </table>
            </div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#data').DataTable();
});
</script>