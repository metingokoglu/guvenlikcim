<?php 
$kamerasayisi=$_POST["kamerasayisi"];
$gunsayisi =$_POST["gunsayisi"];

$ilksonuc = $kamerasayisi *21;
$sonuc = ilksonuc * $gunsayisi;

return sonuc;



?>