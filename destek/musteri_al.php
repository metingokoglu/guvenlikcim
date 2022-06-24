<?php

	require("mysql_ayar.php");
	oturum_kontrol();
	post_kontrol();
	
	$mus = trim($_POST["term"]);
	
	$db = baglan();
	
	$sorgu = $db -> query("select musteri, tel, adres from fis_hrk where musteri LIKE '%{$mus}%'",PDO::FETCH_ASSOC);
	
	if($sorgu -> rowCount()){
		$data = array();
		
		foreach($sorgu as $satir){
			$data[] = array (
				"value" => $satir["musteri"],
				"telefon" => $satir["tel"],
				"adres" => $satir["adres"]
			);
		}
		
		echo json_encode($data);
	}
	
	$db = null;

?>