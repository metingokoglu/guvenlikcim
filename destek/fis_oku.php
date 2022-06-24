<?php

	require_once("mysql_ayar.php");
	oturum_kontrol();
	post_kontrol();
	
	//Y-m-d H:i:s
	
	$istek=$_POST["query"];
	$sayfa=$_POST["sayfa"];
	
	$db=baglan();
	
	$gosterim=30;
	
	switch($istek){
	    case "full":
	    $sorgu=$db->query("select * from fis_hrk where sil='0' order by id desc LIMIT ".(($sayfa*$gosterim)-$gosterim).",$gosterim",PDO::FETCH_ASSOC);
		$toplam=$db->query("select fis_toplam from tablo")->fetch(PDO::FETCH_ASSOC);
		break;
		
		case "ara":
		if($_POST["ara_tarih_bas"] && $_POST["ara_tarih_son"]){
			$tarih_bas = tarih_parcala($_POST["ara_tarih_bas"]);
			$tarih_son = tarih_parcala($_POST["ara_tarih_son"]);
			$nerede = $_POST["nerede"];
			$anahtar_kelime = trim($_POST["anahtar_kelime"]);
			$sorgu=$db->query("select * from fis_hrk where sil='0' AND {$nerede} LIKE '%{$anahtar_kelime}%' AND tarih BETWEEN '{$tarih_bas}' AND '{$tarih_son}' order by id desc LIMIT ".(($sayfa*$gosterim)-$gosterim).",$gosterim",PDO::FETCH_ASSOC);
			$toplam=$db->query("select count(id) as fis_toplam from fis_hrk where sil='0' AND {$nerede} LIKE '%{$anahtar_kelime}%' AND tarih BETWEEN '{$tarih_bas}' AND '{$tarih_son}' order by id desc")->fetch(PDO::FETCH_ASSOC);
		}
		else{
			$nerede = $_POST["nerede"];
			$anahtar_kelime = trim($_POST["anahtar_kelime"]);
			$sorgu=$db->query("select * from fis_hrk where sil='0' AND {$nerede} LIKE '%{$anahtar_kelime}%' order by id desc LIMIT ".(($sayfa*$gosterim)-$gosterim).",$gosterim",PDO::FETCH_ASSOC);
			$toplam=$db->query("select count(id) as fis_toplam from fis_hrk where sil='0' AND {$nerede} LIKE '%{$anahtar_kelime}%' order by id desc")->fetch(PDO::FETCH_ASSOC);
		}
		break;
	}
	
	if($sorgu -> rowCount()){
		$fisler=array();
		
		foreach($sorgu as $row){
			$t1 = ($row["teslimtarihi"] != '0000-00-00 00:00:00') ?  date( 'd.m.Y - H:i', strtotime($row["teslimtarihi"])) : '---';
			
			
			$fisler[]=array(
				"fis_id" => $row["id"],
				"user_id" => $row["user_id"],
				"musteri" => $row["musteri"],
				"tel" => $row["tel"],
				"durum" => $row["durum"],
				"cihaz" => $row["cihaz"],
				"aksesuar1" => $row["aksesuar1"],
				"aksesuar2" => $row["aksesuar2"],
				"aksesuar3" => $row["aksesuar3"],
				"aksesuar4" => $row["aksesuar4"],
				"marka" => $row["marka"],
				"model" => $row["model"],
				"fiyat" => $row["fiyat"],
				"tahsilat" => $row["tahsilat"],
				"ariza" => $row["ariza"],
				"adres" => $row["adres"],
				"teslimtarihi" => $t1,
				"tarih_siralama2" => $t1,
				"kayit_tarihi" => date( 'd.m.Y - H:i', strtotime($row["kayit_tarihi"])),
				"tarih_siralama" => date( 'YmdHis', strtotime($row["kayit_tarihi"])),
				"servis" => $row["yapilan_islem"],
				"son_islem_yapan" => $row["son_islem_yapan"],
				"son_islem_tarih" => date("d.m.Y - H:i", strtotime($row["son_islem_tarih"])),
				"iade" => $row["iade"]
			);	
		}
		$fisler[]=array("toplam" => $toplam['fis_toplam']);
		
		echo json_encode($fisler);
	}
	else{
		echo "0";
	}
	
	$db=null;
	
	//tarih parçalama
	function tarih_parcala($tarih_veri){
		$tarih_arr = explode(".",$tarih_veri);
		$mysql_tarih = $tarih_arr[2]."-".$tarih_arr[1]."-".$tarih_arr[0];
		return $mysql_tarih;
	}

?>