<?php
include 'baglan.php';
$id = $_POST["id"];

$sonuc=mysqli_query($con,"select * from musteri_bilgisi where musteri_id=$id");
while($veri=mysqli_fetch_array($sonuc)){
	$dosya=$veri["musteri_url"];
}


force_download($dosya); // İndirilecek dosya yolunu belirtiyoruz.

?>
