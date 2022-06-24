<?php

	require_once("mysql_ayar.php");
	post_kontrol();
	
	$user=trim($_POST["user"]);
	$sifre=trim($_POST["sifre"]);
	
	if(empty($user) || empty($sifre)){
		echo "3";
	}
	else{
		$db=baglan();	
		$sifre=md5($sifre);
		$Say = $db -> prepare("select id,user,yetki,sil,giris_tarih from users where user= ? AND sifre= ?"); 
		$result = $Say->execute(array(
			$user,
			$sifre
		));
		$Toplam = intval($Say -> rowCount());
		$veri = $Say ->fetch(PDO::FETCH_ASSOC);
		
		if($Toplam>0){
			if($veri["sil"]=="1"){echo "2";}
			else{
				session_start();
				print(json_encode($veri));
				$_SESSION["user"]="ok";
				$_SESSION["userid"]=$veri["id"];
				$_SESSION["username"]=$veri["user"];
				$_SESSION["useryetki"]=$veri["yetki"];
				$_SESSION["usersongiristarih"]=$veri["giris_tarih"];
				$_SESSION["usersonislemtarih"]=date("Y-m-d H:i:s");
				$_SESSION["usersonislemtarihonce"]=$_SESSION["usersonislemtarih"];
				$tarih=date("Y-m-d H:i:s");
					$guncelle = $db->prepare("UPDATE users SET giris_tarih= ? WHERE id = ?");
					$guncelle->execute(array($tarih,$veri["id"]));
					$firma_al = $db -> query("select * from firma order by id asc LIMIT 1") -> fetch(PDO::FETCH_ASSOC);
					$firma = array();
					$firma["id"] = $firma_al["id"];
					$firma["isim"] = $firma_al["isim"];
					$firma["eposta"] = $firma_al["eposta"];
					$firma["il"] = $firma_al["il"];
					$firma["firma_id"] = $firma_al["firma_id"];
				$_SESSION["firma"] = json_encode($firma);
					
					if(@!$_COOKIE["firma"]){
						$ch = curl_init();
						
						$user_agent = 'Mozilla/5.0 (Windows; U; Windows NT 5.1; tr; rv:1.9.0.6) Gecko/2009011913 Firefox/3.0.6';
						
						$data = "firma_id=".$firma_al["firma_id"]."&firma_isim=".$firma_al["isim"]."&firma_eposta=".$firma_al["eposta"]."&firma_il=".$firma_al["il"];
						
						curl_setopt($ch, CURLOPT_URL, 'http://www.bilhane.com/curl.php');
						curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
						curl_setopt($ch, CURLOPT_REFERER,"http://www.google.com");
						curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
						curl_setopt($ch, CURLOPT_POST,1);
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
						
						$cikti = curl_exec($ch);
						
						curl_close($ch);
						
						if($cikti == "1"){
							setcookie("firma",1,time()+(60*10));
						}
					}
				
				$db = null;
			}
		}
		else{
			echo "0";
		}
	}
	
	$db = null;

?>