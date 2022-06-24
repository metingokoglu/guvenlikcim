<?php
session_start();
include '../baglan.php';
    $aciklama = $_POST["aciklama"];
    


  $kaynak = $_FILES["dosya"]["tmp_name"]; // tempdeki adı


        $ad =  $_FILES["dosya"]["name"]; // dosya adı


        $tip = $_FILES["dosya"]["type"]; // dosya tipi


        $boyut = $_FILES["dosya"]["size"]; // boyutu


        $hedef = "images/galeri"; // başta açtıgımız klasör adımız..


        


        $kaydet = move_uploaded_file($kaynak,$hedef."/".$ad); // resmimizi klasöre kayıt ettiriyoruz.


        if($kaydet) // eğer kayıt ettiysek uyarı mesajı yazdırdık.


        {


            echo '<div style="background-colordd; border:1px solid #ccc">Kayit basarili</div>'; 


        }else { echo "Kayit yapilmadi"; }




       /* $ekle = mysqli_query($con,"insert into galeri(galeri_url,galeri_aciklama) values ('admin/$hedef','$aciklama')");*/
       /* header('Location:galeri.php');*/
   

 ?>