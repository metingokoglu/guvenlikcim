<?php

	require("mysql_ayar.php");
	oturum_kontrol();
	post_kontrol();
	
	$db = baglan();
	
	if($_POST["islem"]=="al"){
		$id = $_POST["fis_hrk_id"];
		$sorgu = $db -> query("select * from resim where fis_hrk_id='{$id}' and sil='0'",PDO::FETCH_ASSOC);
		
		$resimler=array("");
	
		foreach($sorgu as $resim){
			$resimler[]=array("id" => $resim["id"],"url" => $resim["url"]);
		}
		
		echo json_encode($resimler);
	}
	else if($_POST["islem"]=="sil"){
		$id = $_POST["resim_id"];
		$db -> query("update resim set sil='1' where id='{$id}'");
		
	}	
	
	$db = null;
	
?>