<?php
session_start();
include '../baglan.php';
if (isset($_SESSION['kvarmi'])) {
	
$id=$_GET["id"];

$sil = mysqli_query($con,"delete from galeri where galeri_id='$id'");
header('Location:galerigoruntule.php');
}else{
         
        echo "<script>
        alert('Lutfen Giriş Yapınız');
        window.location = 'index.php';

        </script>";
         } 
?>