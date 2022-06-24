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






if ($yetki = 1) {


     $kaynak = $_FILES["dosya"]["tmp_name"]; // tempdeki adı


        $ad =  $_FILES["dosya"]["name"]; // dosya adı


        $tip = $_FILES["dosya"]["type"]; // dosya tipi


        $boyut = $_FILES["dosya"]["size"]; // boyutu


        $hedef = "kayit"; // başta açtıgımız klasör adımız..
       
         $kaydet = move_uploaded_file($kaynak,$hedef."/".$ad);

         
             $sql =mysqli_query($con,"insert into yenikayit (musteri_adi,telefon,adres,sistem,sistem_tipi,servis_nedeni,talep_tarihi,yapilis_tarihi,alinacak_ucret,alinan_ucret,kalan_tutar,kayit_url,durum) values ('$musteri_adi','$telefon','$adres','$sistem','$sistem_tipi','$servis_nedeni','$talep_tarihi','$yapilis_tarihi','$alinacak_ucret','$alinan_ucret','$kalan_tutar','kayit/$ad','$durum')");
        

         header("location:yenikayit.php");
         

        

		
		
}else{
	echo "<script> 
	alert('Ekleme Yetkiniz Yok');
	window.location = 'yenikayit.php';
	</script>";
}


}else{
         
        echo "<script>
        alert('Lutfen Giriş Yapınız');
        window.location = 'index.php';

        </script>";
         } ?>