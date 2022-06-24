<?php
session_start();
include '../baglan.php';

$kadi=$_POST["kadi"];
$sifre=$_POST["sifre"];
 $sql =mysqli_query($con,"select * from uyeler where kullanici_adi='$kadi' and sifre='$sifre'");
$sayi=mysqli_num_rows($sql);

if ($sayi=1) {
	
while ($veri=mysqli_fetch_assoc($sql)) {
  	  $_SESSION['kvarmi'] = true;
		  $_SESSION['uye_id'] = $veri['uye_id'];
          $_SESSION['kullanici_adi'] = $veri['kullanici_adi'];
          $_SESSION['sifre'] = $veri['sifre'];
          $_SESSION['yetki'] = $veri['yetki'];
          header('Location: galeri.php');
 	}	 
}

  

?>