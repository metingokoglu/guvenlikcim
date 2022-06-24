<?php
session_start();
include '../baglan.php';
if (isset($_SESSION['kvarmi'])) {

include '../baglan.php';
$id=$_GET["id"];

$sil = mysqli_query($con,"delete from mesajlar where mesaj_id='$id'");
header('Location:iletisimmesaj.php');

}else{
         
        echo "<script>
        alert('Lutfen Giriş Yapınız');
        window.location = 'index.php';

        </script>";
         } ?>