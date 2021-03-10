<?php
    date_default_timezone_set('Asia/Jakarta');
        $thedate = getdate();
        $day= $thedate["mday"];
        $month = $thedate["mon"];
        $year = $thedate["year"];
        $hours = $thedate["hours"];
        $minutes = $thedate["minutes"];
        $secounds = $thedate["seconds"];
        $tanggal ="$year/$month/$day";
        
    function angka($rp){
    $hasil= number_format($rp,0,",",".");
    return $hasil;
    }
    
?>

<script>
function FormatCurrency(objNum)
{
   var num = objNum.value
   var ent, dec;
   if (num != '' && num != objNum.oldvalue)
   {
     num = HapusTitik(num);
     if (isNaN(num))
     {
       objNum.value = (objNum.oldvalue)?objNum.oldvalue:'';
     } else {
       var ev = (navigator.appName.indexOf('Netscape') != -1)?Event:event;
       if (ev.keyCode == 190 || !isNaN(num.split('.')[1]))
       {
         alert(num.split('.')[1]);
         objNum.value = TambahTitik(num.split('.')[0])+'.'+num.split('.')[1];
       }
       else
       {
         objNum.value = TambahTitik(num.split('.')[0]);
       }
       objNum.oldvalue = objNum.value;
     }
   }
}
function HapusTitik(num)
{
   return (num.replace(/\./g, ''));
}

function TambahTitik(num)
{
   numArr=new String(num).split('').reverse();
   for (i=3;i<numArr.length;i+=3)
   {
     numArr[i]+='.';
   }
   return numArr.reverse().join('');
} 
        
function formatCurrency(num) {
   num = num.toString().replace(/\$|\./g,'');
   if(isNaN(num))
   num = "0";
   sign = (num == (num = Math.abs(num)));
   num = Math.floor(num*100+0.50000000001);
   cents = num0;
   num = Math.floor(num/100).toString();
   for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
   num = num.substring(0,num.length-(4*i+3))+'.'+
   num.substring(num.length-(4*i+3));
   return (((sign)?'':'-') + num);
}
</script>


<script>
        function hanyaAngka(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
 
            return false;
          return true;
        }
    </script>


<?php       
    $sqlidsupplier = mysqli_query ($konek, "SELECT max(ID_SUPPLIER) FROM supplier");
    $rowsupplier = mysqli_fetch_array($sqlidsupplier);
      if($rowsupplier){
        $nilaiidsupplier = substr($rowsupplier[0],2,4);
        $noidsupplier = (int) $nilaiidsupplier;
        $noidsupplier = $noidsupplier + 1;
        $noidsupplier1 = "SP".str_pad($noidsupplier, 4, "0", STR_PAD_LEFT);
      }else {
        $noidsupplier1 = "SP0001";
      }

      $sqlidorderbahan = mysqli_query ($konek, "SELECT ID_BAHAN_MASUK FROM bahan_masuk WHERE SUBSTR(ID_BAHAN_MASUK,9,4) = (SELECT MAX(SUBSTR(ID_BAHAN_MASUK,9,4)) FROM bahan_masuk) GROUP BY SUBSTR(ID_BAHAN_MASUK,9,4)");
    $roworderbahan = mysqli_fetch_array($sqlidorderbahan);
      if($roworderbahan){
        $nilaiidorderbahan = substr($roworderbahan[0],8,4);
        $noidorderbahan = (int) $nilaiidorderbahan;
        $noidorderbahan = $noidorderbahan + 1;
        $noidorderbahan1 = "BM".date('d').date('m').date('y').str_pad($noidorderbahan, 4, "0", STR_PAD_LEFT);
      }else {
        $noidorderbahan1 = "BM".date('d').date('m').date('y')."0001";
      }

    $sqliddetailbahan = mysqli_query ($konek, "SELECT max(ID_DETAIL) FROM detail_bahan_masuk");
        $rowdetailbahan = mysqli_fetch_array($sqliddetailbahan);
          if($rowdetailbahan){
            $nilaiiddetailbahan = substr($rowdetailbahan[0],2,4);
            $noiddetailbahan = (int) $nilaiiddetailbahan;
            $noiddetailbahan = $noiddetailbahan + 1;
            $noiddetailbahan1 = "DB".str_pad($noiddetailbahan, 4, "0", STR_PAD_LEFT);
          }else {
            $noiddetailbahan1 = "DB0001";
          }



    $sqlbahanbaku = mysqli_query($konek, "SELECT * FROM bahan_baku WHERE AKSI_BAHAN_BAKU = 1 ORDER BY NAMA_BAHAN_BAKU ASC");
?>