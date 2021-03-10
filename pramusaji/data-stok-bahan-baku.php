<?php
include "../includes/koneksi.php";
function convertToRupiah($angka)
{
    return number_format($angka,0,',','.');
}
?>

<!--<link rel="stylesheet" type="text/css" href="../../assets/widgets/datatable/datatable.css">-->
<script type="text/javascript" src="../demo/monarch/assets/widgets/datatable/datatable.js"></script>
<script type="text/javascript" src="../demo/monarch/assets/widgets/datatable/datatable-bootstrap.js"></script>
<script type="text/javascript" src="../demo/monarch/assets/widgets/datatable/datatable-responsive.js"></script>
<script type="text/javascript" src="../demo/monarch/assets/widgets/datatable/datatable-fixedcolumns.js"></script>

<script type="text/javascript">

    /* Data table fixed columns */

    $(document).ready(function() {
        var table = $('#datatable-fixedcolumns').DataTable( {
            scrollY:        "475px",
            scrollX:        true,
            scrollCollapse: true,
            paging:         false
        } );
        new $.fn.dataTable.FixedColumns( table );
    } );

    $(document).ready(function() {
        $('.dataTables_filter').hide();
    });

</script>


            <table id="datatable-fixedcolumns" class="table table-striped table-bordered">   
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Bahan Baku</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 0;
                        $querytopmenu = mysqli_query ($konek, "SELECT a.ID_BAHAN_BAKU, a.TGL_STOK, a.STOK_AKHIR, b.NAMA_BAHAN_BAKU, b.SATUAN_BAHAN_BAKU, b.AKSI_BAHAN_BAKU
                        FROM stok_bahan_baku a JOIN bahan_baku b ON a.ID_BAHAN_BAKU=b.ID_BAHAN_BAKU WHERE a.TGL_STOK = (SELECT MAX(TGL_STOK) FROM stok_bahan_baku AS b WHERE a.ID_BAHAN_BAKU=b.ID_BAHAN_BAKU) AND b.AKSI_BAHAN_BAKU = 1 ORDER BY b.NAMA_BAHAN_BAKU ASC");
                        if($querytopmenu == false){
                            die ("Terjadi Kesalahan : ". mysqli_error($konek));
                        }
                        while ($hasiltopmenu = mysqli_fetch_array ($querytopmenu)){
                            $no++;
                            echo "
                                <tr>
                                    <td>$no</td>
                                    <td>$hasiltopmenu[NAMA_BAHAN_BAKU]</td>
                                    <td>".convertToRupiah($hasiltopmenu['STOK_AKHIR'])." $hasiltopmenu[SATUAN_BAHAN_BAKU]</td>
                                </tr>";
                        }
                    ?>
                </tbody>
            </table>