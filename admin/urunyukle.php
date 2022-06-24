<?php
session_start();
include '../baglan.php';
if (isset($_SESSION['kvarmi'])) {

    $aciklama = $_POST["aciklama"];
    


  $kaynak = $_FILES["dosya"]["tmp_name"]; // tempdeki adı


        $ad =  $_FILES["dosya"]["name"]; // dosya adı


        $tip = $_FILES["dosya"]["type"]; // dosya tipi


        $boyut = $_FILES["dosya"]["size"]; // boyutu


        $hedef = "images/urunler"; // başta açtıgımız klasör adımız..


        


        $kaydet = move_uploaded_file($kaynak,$hedef."/".$ad); // resmimizi klasöre kayıt ettiriyoruz.




        
    
        $ekle = mysqli_query($con,"insert into urunler(urunler_url,urunler_aciklama) values ('admin/$hedef/$ad','$aciklama')");
        header('Location:urunler.php');
   

}else{
         
        echo "<script>
        alert('Lutfen Giriş Yapınız');
        window.location = 'index.php';

        </script>";
         } ?>