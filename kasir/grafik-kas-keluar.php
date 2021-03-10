<?php 
	include "../includes/koneksi.php";

	date_default_timezone_set('Asia/Jakarta');
	$tanggal2 = mktime(date("m"),date("d"),date("Y"));
	$tahun = date("Y", $tanggal2);
	$bulan = date("m", $tanggal2);
	
	//Membuat Query
	$k = mysqli_query ($konek, "SELECT SUM(TOTAL_KAS_KELUAR) AS TOTAL FROM kas_keluar WHERE YEAR(TGL_KAS_KELUAR) = '$tahun' AND MONTH(TGL_KAS_KELUAR) = '$bulan' GROUP BY TGL_KAS_KELUAR");
	$q = mysqli_query ($konek, "SELECT DAY(TGL_KAS_KELUAR) AS TGL FROM kas_keluar WHERE YEAR(TGL_KAS_KELUAR) = '$tahun' AND MONTH(TGL_KAS_KELUAR) = '$bulan' GROUP BY TGL_KAS_KELUAR ORDER BY TGL_KAS_KELUAR ASC");
?>

		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script src="js/highcharts.js"></script>
<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container2',
                type: 'areaspline'
            },
            title: {
                text: '',
                x: -20 //center
            },
            subtitle: {
                text: '<?php echo 'Tahun '.date("Y").', Bulan '.date("M")?>',
                x: -20
            },
            xAxis: {
                categories: [
					<?php 
						while($r=mysqli_fetch_array($q)){ 
						echo "'".$r["TGL"]."',";
					}
					?>
				]
            },
            yAxis: {
                title: {
                    text: 'Jumlah pengeluaran'
                }
            },
            tooltip: {
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        "Tanggal "+this.x +' : Rp. '+ Highcharts.numberFormat(this.y, 0, '.', ',');
                }
            },
			credits: {
				enabled: false
			},
            series: [{
				color: '#FF6347',
                name: 'Pengeluaran',
                data: [
					<?php 
						while($t=mysqli_fetch_array($k)){
						echo $t["TOTAL"].",";
					}
					?>
				]
            }]
        });
    });
    
});
</script>
	
<div id="container2"></div>