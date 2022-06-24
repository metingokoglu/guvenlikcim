<?php
    include 'baglan.php';
    $isim = $_POST["isim"];
    $email = $_POST["email"];
    $konu = $_POST["konu"];
    $mesaj = $_POST["mesaj"];    
    $tarih = date("d-m-Y");
    $saat = date("H:i:s");

    if ($isim == "" || $email == "" || $konu =="" || $mesaj == "") {
         echo "<script type='text/javascript'>

    alert('Hata Lutfen forumda boş alan birakmayiniz');

    window.location.href = 'iletisim.php';

    </script>";
    }else{
        $ekle = mysqli_query($con,"insert into mesajlar(mesaj_isim,mesaj_email,mesaj_konu,mesaj_mesaj,mesaj_tarih,mesaj_saat) values ('$isim','$email','$konu','$mesaj','$tarih','$saat')");

    echo "<script type='text/javascript'>

    alert('Mesaj Gönderildi.');

    window.location.href = 'iletisim.php';

    </script>";

    }
    
        
?>