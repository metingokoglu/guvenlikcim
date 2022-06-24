<?php
include '../baglan.php';
$id=$_GET["id"];
$sonuc=mysqli_query($con,"select * from musteri_bilgisi where musteri_id='$id'");
while ($veri=mysqli_fetch_array($sonuc)) {
	$link = $veri['musteri_url'];
}
if ($link != "musteri/"){

	unlink($link);
}


$sil = mysqli_query($con,"delete from musteri_bilgisi where musteri_id='$id'");
header('Location:musterigoruntule.php');

?>