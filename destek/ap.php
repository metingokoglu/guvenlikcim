<?php
$barkod = $_GET['barkod'];

$sunucu = "localhost";
						$kullanici_adi = "guvenli3_metin";
						$sifre = "Metin_2272609";
						$veritabani = "guvenli3_borgatec";

$link = mysql_connect($sunucu, $kullanici_adi, $sifre) or die(mysql_error());
$db = mysql_select_db($veritabani, $link) or die (mysql_error());
date_default_timezone_set('Europe/Istanbul');
mysql_query("SET NAMES UTF8");

$conf = mysql_fetch_assoc(mysql_query('SELECT * FROM fis_hrk WHERE barkod = "' . $barkod . '"'));

$durum = $conf["durum"];
$fiyat = ($conf["fiyat"] > 0) ? $conf["fiyat"] : '0';
$yapilan_islem = ($conf["yapilan_islem"] != "") ? $conf["yapilan_islem"] : 'Beklemede';
$durum = ($conf["ariza"] != "") ? $conf["ariza"] : 'Beklemede';

$veri = 'Durumu : ';

if($durum == 1){
	$veri .= 'Bekliyor';
}elseif($durum == 2){
	$veri .= 'Yapıldı';
}elseif($durum == 3){
	$veri .= 'İade';
}else{
	$veri .= 'Bilinmiyor';
}

$veri .= '<br/>Fiyatı : ' . $fiyat . ' TL';
$veri .= '<br/>Arıza : ' . $durum;
$veri .= '<br/>Yapılan İşlem : ' . $yapilan_islem;

print $veri;