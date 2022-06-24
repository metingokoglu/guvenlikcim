<?php

	require("mysql_ayar.php");
	oturum_kontrol();
	post_kontrol();
	
	$db = baglan();
	
	if($_POST["islem"]=="al"){
		$id = $_POST["fis_hrk_id"];
		$sorgu = $db -> query("select * from logs where idm='{$id}' ORDER BY id DESC",PDO::FETCH_ASSOC);
		
		$loglar=array("");
	
		foreach($sorgu as $log){
			if($log["isid"] == 1){
				$durum = 'Beklemede';
			}
			else if($log["isid"] == 2){
				$durum = 'Hazır';
			}
			else if($log["isid"] == 3){
				$durum = 'İade';
			}
			else if($log["isid"] == 4){
				$durum = 'Teslim Edildi';
			}else{
				$durum = 'Beklemede';
			}
			$tarih = date("d.m.Y - H:i", strtotime($log["sontarih"]));
			$loglar[]=array("userid" => $log["userid"],"isid" => $durum,"sontarih" => $tarih);
		}
		
		echo json_encode($loglar);
	}	
	
	$db = null;
	
?>