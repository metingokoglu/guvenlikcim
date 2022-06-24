<?php
session_start();
include '../baglan.php';
if (isset($_SESSION['kvarmi'])) {
include '../baglan.php';
$id=$_GET["id"];
$sonuc=mysqli_query($con,"select * from yenikayit where id='$id'");
while ($veri=mysqli_fetch_array($sonuc)) {
	$link = $veri['kayit_url'];
}
if ($link != "kayit/") {
	unlink($link);

}


$sil = mysqli_query($con,"delete from yenikayit where id='$id'");
header('Location:kayitgoruntule.php');

}else{
         
        echo "<script>
        alert('Lutfen Giriş Yapınız');
        window.location = 'index.php';

        </script>";
         } ?>