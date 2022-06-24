<?php

	require_once("mysql_ayar.php");
	oturum_kontrol();
	post_kontrol();
	
	$fis_id=$_POST["fis_id"];
	
	$db=baglan();
	
	$sil = $db -> query("update fis_hrk set sil='1' where id='$fis_id'"); 
	
	if($sil){		
		$toplam=$db->query("select count(*) as toplam from fis_hrk where sil='0'")->fetch(PDO::FETCH_ASSOC);
		$db->query("update tablo set fis_toplam='".$toplam["toplam"]."'");
	}
	
	$db = null;

?>