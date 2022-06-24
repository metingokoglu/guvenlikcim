<?php

	require_once("mysql_ayar.php");
	oturum_kontrol();
	post_kontrol();
	
	$islem = $_POST["islem"];
	
	$db = baglan();
	$cikti = array();
	
	switch($islem){
		case "sil":
			$user_id = $_POST["user_id"];
			$sil = $db -> exec("update users set sil='1' where id={$user_id}");
		break;
		
		case "ekle":
			bosluk_kontrol();
			$kadi = strip_tags(trim($_POST["kadi"]));
			$sifre = strip_tags(trim($_POST["sifre"]));
			$eposta = strip_tags(trim($_POST["eposta"]));
			$yetki = strip_tags(trim($_POST["yetki"]));
			$ekle = $db -> prepare("insert into users set user = ?, sifre = ?, yetki = ?, sil = ?, eposta = ?");
			$ekle -> execute(array($kadi,md5($sifre),$yetki,"0",$eposta));
				if($ekle -> rowCount()){
				$cikti["mesaj"] = "<li user_id='".$db->lastInsertId()."' master='0' eposta='".$eposta."' yetki='".$yetki."'>".$kadi."<i class='fa fa-times' title='Sil' style='float:right;cursor:pointer;margin-left:8px;'></i><i class='fa fa-pencil' title='Düzenle' style='float:right;cursor:pointer'></i></li>\n";
				$cikti["sonuc"] = "ekle_ok";
					echo json_encode($cikti);
					}
				else{
					$cikti["sonuc"] = "hata";
					echo json_encode($cikti);
				}
		break;
		
		case "duzenle":
			$user_id = strip_tags(trim($_POST["user_id"]));
			$kadi = strip_tags(trim($_POST["kadi"]));
			$sifre = strip_tags(trim($_POST["sifre"]));
			$eposta = strip_tags(trim($_POST["eposta"]));
			$yetki = strip_tags(trim($_POST["yetki"]));
			if(empty($kadi) || empty($sifre) || empty($eposta)){
					$db = null;
					$cikti["sonuc"] = "bos";
					die(json_encode($cikti));
				}
			else{
				$duzenle = $db -> prepare("update users set user = ?, sifre = ?, yetki = ?, eposta = ? where id = ?");
				$d_tamam = $duzenle -> execute(array($kadi,md5($sifre),$yetki,$eposta,$user_id));
				if($d_tamam){
					$cikti["sonuc"] = "duzenle_ok";
					$cikti["user_id"] = $user_id;
					$cikti["eposta"] = $eposta;
					$cikti["yetki"] = $yetki;
					$cikti["kadi"] = $kadi;
					echo json_encode($cikti);
				}
				else{
					$cikti["sonuc"] = "hata";
					echo json_encode($cikti);
				}
			}
		break;
	}
	
	$db = null;
	
	function bosluk_kontrol(){
			global $db;
			$kadi = strip_tags(trim($_POST["kadi"]));
			$sifre = strip_tags(trim($_POST["sifre"]));
			$eposta = strip_tags(trim($_POST["eposta"]));
			$yetki = strip_tags(trim($_POST["yetki"]));
				if(empty($kadi) || empty($sifre) || empty($eposta)){
					$db = null;
					$cikti["sonuc"] = "bos";
					die(json_encode($cikti));
				}
				else{
					$kadi_varmi = $db -> prepare("select * from users where user = ?");
					$kadi_varmi -> execute(array($kadi));
					$eposta_varmi = $db -> prepare("select * from users where eposta = ?");
					$eposta_varmi -> execute(array($eposta));
					if($kadi_varmi -> rowCount()){
						$db = null;
						$cikti["sonuc"] = "user";
						die(json_encode($cikti));
					}
					else if($eposta_varmi -> rowCount()){
						$db = null;
						$cikti["sonuc"] = "eposta";
						die(json_encode($cikti));
					}
			}
	}
?>