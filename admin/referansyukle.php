<?php
session_start();
include '../baglan.php';
if (isset($_SESSION['kvarmi'])) {

    $baslik = $_POST["baslik"];
    $yazi = $_POST["yazi"];

       


  $kaynak = $_FILES["dosya"]["tmp_name"]; // tempdeki adı


        $ad =  $_FILES["dosya"]["name"]; // dosya adı


        $tip = $_FILES["dosya"]["type"]; // dosya tipi


        $boyut = $_FILES["dosya"]["size"]; // boyutu


        $hedef = "images/galeri"; // başta açtıgımız klasör adımız..


        


        $kaydet = move_uploaded_file($kaynak,$hedef."/".$ad); // resmimizi klasöre kayıt ettiriyoruz.



    
        $ekle = mysqli_query($con,"insert into referanslar(referans_url,referans_baslik,referans_yazi) values ('admin/$hedef/$ad','$baslik','$yazi')");
        header('Location:referans.php');
        

}else{
         
        echo "<script>
        alert('Lutfen Giriş Yapınız');
        window.location = 'index.php';

        </script>";
         } ?>