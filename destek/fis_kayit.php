<?php

	require_once("mysql_ayar.php");
	oturum_kontrol();
	post_kontrol();
	
	$musteri=htmlspecialchars(trim($_POST["musteri"]));
	$tel=trim($_POST["tel"]);
	$cihaz=trim($_POST["cihaz"]);
	$aksesuar1=trim($_POST["aksesuar1"]);
	$aksesuar2=trim($_POST["aksesuar2"]);
	$aksesuar3=trim($_POST["aksesuar3"]);
	$aksesuar4=trim($_POST["aksesuar4"]);
	$marka=htmlspecialchars(trim($_POST["marka"]));
	$model=htmlspecialchars(trim($_POST["model"]));
	$fiyat=htmlspecialchars(trim($_POST["fiyat"]));
	$adres=htmlspecialchars(trim($_POST["adres"]));
	$ariza=htmlspecialchars(trim($_POST["ariza"]));
	$tarih = date("Y-m-d H:i:s");
	$tarih2= date("Y-m-d");
	
	$db=baglan();
	
	session_start();
	$kayit = $db -> prepare("INSERT INTO fis_hrk SET user_id= ?, musteri = ?, tel = ?, durum='1', cihaz= ?, aksesuar1= ?, aksesuar2= ?, aksesuar3= ?, aksesuar4= ?, marka= ?, model= ?, fiyat= ?, adres= ?, ariza= ?, kayit_tarihi= ?, tarih = ?, sil='0', son_islem_tarih = ?, son_islem_yapan = ?"); 
	
	$result = $kayit->execute(array($_SESSION["userid"],$musteri,$tel,$cihaz,$aksesuar1,$aksesuar2,$aksesuar3,$aksesuar4,$marka,$model,$fiyat,$adres,$ariza,$tarih,$tarih2,$tarih,$_SESSION["userid"]));
	
	if($result){
		$last_id = $db->lastInsertId();
		echo $last_id;
		
		$say = strlen($last_id);
		$cik = 12 - $say;
		$a = "";
		for ($i = 0; $i<$cik; $i++){
			$a .= mt_rand(0,9);
		}
		$barcod = $a . $last_id;
		
		
		$toplam=$db->query("select count(*) as toplam from fis_hrk where sil='0'")->fetch(PDO::FETCH_ASSOC);
		$db->query("update fis_hrk set barkod='".$barcod."' WHERE id='".$last_id."'");
		$db->query("update tablo set fis_toplam='".$toplam["toplam"]."'");
	}
	
	$db = null;

?>