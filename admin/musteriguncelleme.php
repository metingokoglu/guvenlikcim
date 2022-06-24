<?php

session_start();
include '../baglan.php';
if (isset($_SESSION['kvarmi'])) {

 include '../baglan.php';
session_start();
$yetki=$_SESSION['yetki'];
$musteri_kodu=$_POST['musteri_kodu'];
$tarih=$_POST['tarih'];
$musteri_adi=$_POST['musteri_adi'];
$telefon=$_POST['telefon'];
$adres=$_POST['adres'];
$sistem=$_POST['sistem'];
$marka=$_POST['marka'];
$model=$_POST['model'];
$urun_bilgisi=$_POST['urun_bilgisi'];
$hdd=$_POST['hdd'];
$sn_bilgisi=$_POST['sn_bilgisi'];
$ip_bilgisi=$_POST['ip_bilgisi'];
$port_bilgisi=$_POST['port_bilgisi'];
$user1=$_POST['kadi_user1'];
$user2=$_POST['kadi_user2'];
$user3=$_POST['kadi_user3'];
$user4=$_POST['kadi_user4'];
$user5=$_POST['kadi_user5'];
$user6=$_POST['kadi_user6'];
$aciklama=$_POST['aciklama'];

$id = $_POST['musteri_id'];

        





if ($yetki = 1) {
 			  $kaynak = $_FILES["dosya"]["tmp_name"]; // tempdeki adı


        $ad =  $_FILES["dosya"]["name"]; // dosya adı


        $tip = $_FILES["dosya"]["type"]; // dosya tipi


        $boyut = $_FILES["dosya"]["size"]; // boyutu


        $hedef = "musteri"; // başta açtıgımız klasör adımız..
       
        $kaydet = move_uploaded_file($kaynak,$hedef."/".$ad);

        if ($ad != "") {
       

             $sql=mysqli_query($con,"update musteri_bilgisi set musteri_kodu='$musteri_kodu', tarih='$tarih', musteri_adi='$musteri_adi',telefon='$telefon',adres='$adres',sistem='$sistem',marka='$marka',model='$model',urun_bilgisi='$urun_bilgisi',hdd='$hdd',sn_bilgisi='$sn_bilgisi',ip_bilgisi='$ip_bilgisi',port_bilgisi='$port_bilgisi',user1='$user1',user2='$user2',user3='$user3',user4='$user4',user5='$user5',user6='$user6',aciklama='$aciklama',musteri_url='$musteri/$ad' where musteri_id=$id");
         

        		 
        }else{
        		
                 $sql=mysqli_query($con,"update musteri_bilgisi set musteri_kodu='$musteri_kodu', tarih='$tarih', musteri_adi='$musteri_adi',telefon='$telefon',adres='$adres',sistem='$sistem',marka='$marka',model='$model',urun_bilgisi='$urun_bilgisi',hdd='$hdd',sn_bilgisi='$sn_bilgisi',ip_bilgisi='$ip_bilgisi',port_bilgisi='$port_bilgisi',user1='$user1',user2='$user2',user3='$user3',user4='$user4',user5='$user5',user6='$user6',aciklama='$aciklama' where musteri_id=$id");
                }
        }


		
          
		 
		 header("location:musterigoruntule.php");
}else{
	echo "<script> 
	alert('Ekleme Yetkiniz Yok');
	window.location = 'musterigoruntule.php';
	</script>";
}


}else{
         
        echo "<script>
        alert('Lutfen Giriş Yapınız');
        window.location = 'index.php';

        </script>";
         } ?>