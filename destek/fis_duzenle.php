<?php

	require("mysql_ayar.php");
	oturum_kontrol();
	post_kontrol();
	
	$servis_pos = $_POST["servis_pos"];
	$fis_id=$_POST["fis_id"];
	$user_id = $_POST["aktif_user_id"];
	$tarih = date("Y-m-d H:i:s");
	
	if($servis_pos == "tam"){
		$musteri = htmlspecialchars(trim($_POST["d_musteri"]));
		$telefon = htmlspecialchars(trim($_POST["d_tel"]));
		$aciklama = htmlspecialchars(trim($_POST["d_aciklama"]));
		$adres = htmlspecialchars(trim($_POST["d_adres"]));
		$cihaz = htmlspecialchars(trim($_POST["d_cihaz"]));
		$aksesuar1 = htmlspecialchars(trim($_POST["d_aksesuar1"]));
		$aksesuar2 = htmlspecialchars(trim($_POST["d_aksesuar2"]));
		$aksesuar3 = htmlspecialchars(trim($_POST["d_aksesuar3"]));
		$aksesuar4 = htmlspecialchars(trim($_POST["d_aksesuar4"]));
		$marka = htmlspecialchars(trim($_POST["d_marka"]));
		$model = htmlspecialchars(trim($_POST["d_model"]));
		$fiyat = htmlspecialchars(trim($_POST["d_fiyat"]));
		$tahsilat = htmlspecialchars(trim($_POST["d_tahsilat"]));
		$durum = htmlspecialchars(trim($_POST["d_durum"]));
		$servis = htmlspecialchars(trim($_POST["d_servis"]));
		
		$iade = ($_POST["iade"] == 1) ? 1 : 0;
		
		if(empty($musteri) || empty($telefon) || empty($aciklama)){
			echo "bos";
			exit();
		}
		
		if($durum!="1" && empty($servis)){
			echo "bos";
			exit();
		}
		
		if($durum == 4){
			$sorgu = "update fis_hrk set musteri = ?, tel = ?, durum = ?, cihaz = ?, aksesuar1 = ?, aksesuar2 = ?, aksesuar3 = ?, aksesuar4 = ?, marka = ?, model = ?, adres = ?, ariza = ?, fiyat = ?, tahsilat = ?, yapilan_islem = ?, son_islem_tarih = ?, son_islem_yapan = ?, teslimtarihi = ?, iade = ? where id = ?";
			$dizi = array($musteri,$telefon,$durum,$cihaz,$aksesuar1,$aksesuar2,$aksesuar3,$aksesuar4,$marka,$model,$adres,$aciklama,$fiyat,$tahsilat,$servis,$tarih,$user_id,$tarih,$iade,$fis_id);
		}else{
			$sorgu = "update fis_hrk set musteri = ?, tel = ?, durum = ?, cihaz = ?, aksesuar1 = ?, aksesuar2 = ?, aksesuar3 = ?, aksesuar4 = ?, marka = ?, model = ?, adres = ?, ariza = ?, fiyat = ?, tahsilat = ?, yapilan_islem = ?, son_islem_tarih = ?, son_islem_yapan = ?, iade = ? where id = ?";
			$dizi = array($musteri,$telefon,$durum,$cihaz,$aksesuar1,$aksesuar2,$aksesuar3,$aksesuar4,$marka,$model,$adres,$aciklama,$fiyat,$tahsilat,$servis,$tarih,$user_id,$iade,$fis_id);
		}
	}
	else{
		$fiyat = htmlspecialchars(trim($_POST["d_fiyat"]));
		$tahsilat = htmlspecialchars(trim($_POST["d_tahsilat"]));
		$durum = htmlspecialchars(trim($_POST["d_durum"]));
		$servis = htmlspecialchars(trim($_POST["d_servis"]));
		
		if($durum!="1" && empty($servis)){
			echo "bos";
			exit();
		}
		
		if($durum == 4){
			$sorgu = "update fis_hrk set durum = ?,fiyat = ?, tahsilat = ?, yapilan_islem = ?, son_islem_tarih = ?, son_islem_yapan = ?, teslimtarihi = ?, iade = ? where id = ?";
			$dizi = array($durum,$fiyat,$tahsilat,$servis,$tarih,$user_id,$tarih,$iade,$fis_id);
		}else{
			$sorgu = "update fis_hrk set durum = ?,fiyat = ?, tahsilat = ?, yapilan_islem = ?, son_islem_tarih = ?, son_islem_yapan = ?, iade = ? where id = ?";
			$dizi = array($durum,$fiyat,$tahsilat,$servis,$tarih,$user_id,$iade,$fis_id);
		}
	}
	
	$db = baglan();
	
	$duzenle = $db -> prepare($sorgu);
	
	$kayit = $duzenle -> execute($dizi);
	
	if($kayit){
		echo "ok";
		
		$kayit2 = $db -> prepare("INSERT INTO logs SET userid= ?, idm= ?, isid = ?"); 
		$result2 = $kayit2->execute(array($_SESSION["userid"],$fis_id,$durum));
		
	}
	else{
		echo "no";
	}

	$db = null;
	
?>