<?php

	require("php-excel.class.php");
	require("mysql_ayar.php");
	oturum_kontrol();
	
	//Y-m-d H:i:s
	
	$istek=$_GET["istek"];
	$sayfa=$_GET["sayfa"];
	
	$db=baglan();
	
	$gosterim=30;
	
	switch($istek){
	    case "full":
	    $sorgu=$db->query("select * from fis_hrk where sil='0' order by id desc",PDO::FETCH_ASSOC);
		break;
		
		case "ara":
		if($_GET["ara_tarih_bas"] && $_GET["ara_tarih_son"]){
			$tarih_bas = tarih_parcala($_GET["ara_tarih_bas"]);
			$tarih_son = tarih_parcala($_GET["ara_tarih_son"]);
			$nerede = $_GET["nerede"];
			$anahtar_kelime = trim($_GET["anahtar_kelime"]);
			$sorgu=$db->query("select * from fis_hrk where sil='0' AND {$nerede} LIKE '%{$anahtar_kelime}%' AND tarih BETWEEN '{$tarih_bas}' AND '{$tarih_son}' order by id desc LIMIT ".(($sayfa*$gosterim)-$gosterim).",$gosterim",PDO::FETCH_ASSOC);
		}
		else{
			$nerede = $_GET["nerede"];
			$anahtar_kelime = trim($_GET["anahtar_kelime"]);
			$sorgu=$db->query("select * from fis_hrk where sil='0' AND {$nerede} LIKE '%{$anahtar_kelime}%' order by id desc LIMIT ".(($sayfa*$gosterim)-$gosterim).",$gosterim",PDO::FETCH_ASSOC);
		}
		break;
	}
	
	if($sorgu -> rowCount()){
		$durum_string = array("","Bekliyor","Hazır","İade","Teslim Edildi");
		$cihaz_string = array("","Masaüstü","Dizüstü","Telefon","Tablet","Monitör","Elektronik Eşya","Diğer");
		$aksesuar_string = array("","Var","Yok");
		
		$fisler=array(array("Fiş No","Müşteri","Telefon","Adres","Cihaz","Çanta","Şarj Aleti","Mouse","Batarya","Marka","Model","Durum","İade","Fiyat","Tahsilat","Açıklama","Yapılan İşlem","Kayıt Tarihi","Teslim Tarihi"));
		
		foreach($sorgu as $row){
			$t1 = ($row["teslimtarihi"] != '0000-00-00 00:00:00') ?  date( 'd.m.Y - H:i', strtotime($row["teslimtarihi"])) : '---';
			$iade = ($row["iade"] == 1) ? "İade Edildi" : "";
			$fisler[]=array(
						$row["id"],
						$row["musteri"],
						$row["tel"],
						$row["adres"],
						$cihaz_string[$row["cihaz"]],
						$aksesuar_string[$row["aksesuar1"]],
						$aksesuar_string[$row["aksesuar2"]],
						$aksesuar_string[$row["aksesuar3"]],
						$aksesuar_string[$row["aksesuar4"]],
						$row["marka"],
						$row["model"],
						$durum_string[$row["durum"]],
						$iade,
						$row["fiyat"],
						$row["tahsilat"],
						$row["ariza"],
						$row["yapilan_islem"],
						date( 'd.m.Y - H:i', strtotime($row["kayit_tarihi"])),
						$t1
				);	
		}
	
	// echo "<pre>";
	// print_r($fisler);
	// echo "</pre>";

	$xls = new Excel_XML('UTF-8', false, 'Sheet');
	$xls->addArray($fisler);
	$xls->generateXML('tablo.xls');
	
	}
	else{
		echo "<script type = 'text/javascript'>this.close();</script>";
	}
	
	$db=null;
	
	//tarih parçalama
	function tarih_parcala($tarih_veri){
		$tarih_arr = explode(".",$tarih_veri);
		$mysql_tarih = $tarih_arr[2]."-".$tarih_arr[1]."-".$tarih_arr[0];
		return $mysql_tarih;
	}

?>