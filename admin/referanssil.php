<?php

session_start();
include '../baglan.php';

$id=$_GET["id"];

$sil = mysqli_query($con,"delete from referanslar where referans_id='$id'");
header('Location:referansgoruntule.php');

?>