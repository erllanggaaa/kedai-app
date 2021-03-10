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
  $sqlidkasmasuk = mysqli_query ($konek, "SELECT max(ID_KAS_MASUK) FROM kas_masuk");
    $rowkasmasuk = mysqli_fetch_array($sqlidkasmasuk);
      if($rowkasmasuk){
        $nilaiidkasmasuk = substr($rowkasmasuk[0],1,4);
        $noidkasmasuk = (int) $nilaiidkasmasuk;
        $noidkasmasuk = $noidkasmasuk + 1;
        $noidkasmasuk1 = "M".str_pad($noidkasmasuk, 4, "0", STR_PAD_LEFT);
      }else {
        $noidkasmasuk1 = "M0001";
      }
      
  $sqlidkaskeluar = mysqli_query ($konek, "SELECT max(ID_KAS_KELUAR) FROM kas_keluar");
    $rowkaskeluar = mysqli_fetch_array($sqlidkaskeluar);
      if($rowkaskeluar){
        $nilaiidkaskeluar = substr($rowkaskeluar[0],1,4);
        $noidkaskeluar = (int) $nilaiidkaskeluar;
        $noidkaskeluar = $noidkaskeluar + 1;
        $noidkaskeluar1 = "K".str_pad($noidkaskeluar, 4, "0", STR_PAD_LEFT);
      }else {
        $noidkaskeluar1 = "K0001";
      }
      
  $sqlidnorut = mysqli_query ($konek, "SELECT max(NO_URUT) FROM jurnal_umum");
    $rownorut = mysqli_fetch_array($sqlidnorut);
      if($rownorut){
        $nilaiidnorut = substr($rownorut[0],1,4);
        $noidnorut = (int) $nilaiidnorut;
        $noidnorut = $noidnorut + 1;
        $noidnorut1 = "N".str_pad($noidnorut, 4, "0", STR_PAD_LEFT);
      }else {
        $noidnorut1 = "N0001";
      }
      
  $sqlidnoruta = mysqli_query ($konek, "SELECT max(NO_URUT) FROM jurnal_umum");
    $rownoruta = mysqli_fetch_array($sqlidnoruta);
      if($rownoruta){
        $nilaiidnoruta = substr($rownoruta[0],1,4);
        $noidnoruta = (int) $nilaiidnoruta;
        $noidnoruta = $noidnoruta + 2;
        $noidnorut2 = "N".str_pad($noidnoruta, 4, "0", STR_PAD_LEFT);
      }else {
        $noidnorut2 = "N0002";
      }
          
  $sqlidjurnal = mysqli_query ($konek, "SELECT max(NO_JURNAL) FROM jurnal_umum");
    $rowjurnal = mysqli_fetch_array($sqlidjurnal);
      if($rowjurnal){
        $nilaiidjurnal = substr($rowjurnal[0],1,4);
        $noidjurnal = (int) $nilaiidjurnal;
        $noidjurnal = $noidjurnal + 1;
        $noidjurnal1 = "J".str_pad($noidjurnal, 4, "0", STR_PAD_LEFT);
      }else {
        $noidjurnal1 = "J0001";
      }
                                    
?>