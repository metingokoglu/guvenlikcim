<?php
session_start();
include '../baglan.php';
if (isset($_SESSION['kvarmi'])) {

 include '../baglan.php';
session_start();
$yetki=$_SESSION['yetki'];
$musteri_adi=$_POST['musteri_adi'];
$telefon=$_POST['telefon'];
$adres=$_POST['adres'];
$sistem=$_POST['sistem'];
$sistem_tipi=$_POST['sistem_tipi'];
$servis_nedeni=$_POST['servis_nedeni'];
$talep_tarihi=$_POST['talep_tarihi'];
$yapilis_tarihi=$_POST['yapilis_tarihi'];
$alinacak_ucret=$_POST['alinacak_ucret'];
$alinan_ucret=$_POST['alinan_ucret'];
$kalan_tutar = $alinacak_ucret-$alinan_ucret;
$durum=$_POST['durum'];


$id = $_POST['id'];

if ($yetki = 1) {

  $kaynak = $_FILES["dosya"]["tmp_name"]; // tempdeki adı


        $ad =  $_FILES["dosya"]["name"]; // dosya adı


        $tip = $_FILES["dosya"]["type"]; // dosya tipi


        $boyut = $_FILES["dosya"]["size"]; // boyutu


        $hedef = "kayit"; // başta açtıgımız klasör adımız..
       
        $kaydet = move_uploaded_file($kaynak,$hedef."/".$ad);

        if ($ad != "") {
            
       
        	
            $sql =mysqli_query($con,"update yenikayit set musteri_adi='$musteri_adi',telefon='$telefon',adres='$adres',sistem='$sistem',sistem_tipi='$sistem_tipi',servis_nedeni='$servis_nedeni',talep_tarihi='$talep_tarihi',yapilis_tarihi='$yapilis_tarihi',alinacak_ucret='$alinacak_ucret',alinan_ucret='$alinan_ucret',kalan_tutar='$kalan_tutar',kayit_url='kayit/$ad',durum='$durum' where id=$id");
    
        }else{
             
            $sql =mysqli_query($con,"update yenikayit set musteri_adi='$musteri_adi',telefon='$telefon',adres='$adres',sistem='$sistem',sistem_tipi='$sistem_tipi',servis_nedeni='$servis_nedeni',talep_tarihi='$talep_tarihi',yapilis_tarihi='$yapilis_tarihi',alinacak_ucret='$alinacak_ucret',alinan_ucret='$alinan_ucret',kalan_tutar='$kalan_tutar',durum='$durum' where id=$id");
        }
		
		 
		  

		 header("location:kayitgoruntule.php");
}else{
	echo "<script> 
	alert('Ekleme Yetkiniz Yok');
	window.location = 'kayitgoruntule.php';
	</script>";
}


}else{
         
        echo "<script>
        alert('Lutfen Giriş Yapınız');
        window.location = 'index.php';

        </script>";
         } ?>