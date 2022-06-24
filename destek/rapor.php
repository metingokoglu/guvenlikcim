<?php

	require("mysql_ayar.php");
	require("php-excel.class.php");
	oturum_kontrol();
	post_kontrol();
	ob_start();
	
	// if($_SESSION["useryetki"] != 0){
		// header( "Refresh:5; url=index.php" );
		// die("Rapor Alma Yetkiniz Yok.Sadece Admin Yetkisi Olan Kullanıcılar Rapor Alabilir!..<br/>Ana Sayfaya Yönlendiriliyorsunuz...");
	// }
	
	if($_POST){
		
		$rapor = $_POST["tip"];
		$tarih_bas = tarih_parcala($_POST["rapor_tarih_bas"]);
		$tarih_bit = tarih_parcala($_POST["rapor_tarih_bit"]);
		
		$db = baglan();
		
		$durum_string = array("","Bekliyor","Yapıldı","İade");
		$cihaz_name = array("","Masaüstü","Dizüstü","Telefon","Tablet","Monitör","Elektronik Eşya","Diğer");
		$cihaz_id = array("",1,2,3,4,5,6,7);
		$cihazlar = array("Toplam :");
		
		if($_POST["rapor_tarih_bas"] && $_POST["rapor_tarih_bit"]){
					$tarih_sorgu = "AND tarih BETWEEN '".$tarih_bas."' AND '".$tarih_bit."'";
					$tarih_secildi = $_POST["rapor_tarih_bas"]." - ".$_POST["rapor_tarih_bit"]." Arası Tarih Seçildi.";
				}
		else{
					$tarih_sorgu = "";
				}
		
		switch($rapor){
			
			case "genel":
			
			?>
			
<!DOCTYPE html>

<html lang="tr-TR">
<head>
	<meta charset="UTF-8">
	<title>Servis Takip :: Rapor</title>
	
	<script type="text/javascript" src="css_js/jquery-1.11.2.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css_js/rapor.css" />
	<link rel="shortcut icon" href="png/favicon.ico" />
</head>

<body>

<div id="container">
			
			<?php
				$toplam_kayit = $db -> query("select count(id) as toplam_kayit from fis_hrk where sil='0' {$tarih_sorgu}")->FETCH(PDO::FETCH_ASSOC);
				$toplam_fiyat = $db -> query("select SUM(fiyat) as toplam_fiyat from fis_hrk where sil='0' {$tarih_sorgu}")->FETCH(PDO::FETCH_ASSOC);
				$toplam_tahsilat = $db -> query("select SUM(tahsilat) as toplam_tahsilat from fis_hrk where sil='0' {$tarih_sorgu}")->FETCH(PDO::FETCH_ASSOC);
				$toplam_bekleyen = $db -> query("select count(id) as toplam_bekleyen from fis_hrk where sil='0' AND durum='1' {$tarih_sorgu}")->FETCH(PDO::FETCH_ASSOC);
				$toplam_yapildi = $db -> query("select count(id) as toplam_yapildi from fis_hrk where sil='0' AND durum='2' {$tarih_sorgu}")->FETCH(PDO::FETCH_ASSOC);
				$toplam_iade = $db -> query("select count(id) as toplam_iade from fis_hrk where sil='0' AND durum='3' {$tarih_sorgu}")->FETCH(PDO::FETCH_ASSOC);
				$toplam_silinmis = $db -> query("select count(id) as toplam_silinmis from fis_hrk where sil='1' {$tarih_sorgu}")->FETCH(PDO::FETCH_ASSOC);
				
				for($i=1;$i<count($cihaz_id);$i++){
					$query = $db -> query("select count(cihaz) as cihaz from fis_hrk where sil='0' AND cihaz='{$cihaz_id[$i]}' {$tarih_sorgu}")->FETCH(PDO::FETCH_ASSOC);
					$cihazlar[$cihaz_name[$i]] = $query["cihaz"];
				}
				
				$cikti = array(array("","Fiş","Fiyat","Tahsilat","Bekleyen","Yapıldı","İade","Silinmiş"));
				$cikti[] = array(
						"Toplam :",
						$toplam_kayit["toplam_kayit"],
						number_format($toplam_fiyat["toplam_fiyat"],2,",","."),
						number_format($toplam_tahsilat["toplam_tahsilat"],2,",","."),
						$toplam_bekleyen["toplam_bekleyen"],
						$toplam_yapildi["toplam_yapildi"],
						$toplam_iade["toplam_iade"],
						$toplam_silinmis["toplam_silinmis"]
				);
				
				echo $tarih_secildi;
				echo "<table cellpadding=0 cellspacing=0>\n";
				echo "<thead>\n<tr>\n";
					for($i=0;$i<count($cikti[0]);$i++){
						echo "<th>";
						echo $cikti[0][$i];
						echo "</th>";
					}
				echo "</tr>\n</thead>\n";
				
				echo "<tfoot>\n<tr>\n";
					for($i=0;$i<count($cikti[1]);$i++){
						echo "<td>";
						echo $cikti[1][$i];
						echo "</td>";
					}
				echo "</tr>\n</tfoot>\n";
				echo "</table><br/>";
				
				echo "<table cellpadding=0 cellspacing=0>\n";
				echo "<thead>\n<tr>\n";
					foreach($cihazlar as $key => $value){
						echo "<th>";
						echo (!$key) ? "" : $key;
						echo "</th>";
					}
				echo "</tr>\n</thead>\n";
				
				echo "<tfoot>\n<tr>\n";
					foreach($cihazlar as $key => $value){
						echo "<td>";
						echo $value;
						echo "</td>";
					}
				echo "</tr>\n</tfoot>\n";
				echo "</table>";
				?>
				
</div>

</body>
</html>
				
				<?php
			break;
			
			case "servis":
				$sorgu = $db -> query("select * from fis_hrk where sil='0' {$tarih_sorgu} ORDER BY id desc",PDO::FETCH_ASSOC);
				$fisler = array(array($tarih_secildi,"","","","","","","","","","",""));
				$fisler[] = array("Fiş No","Müşteri","Telefon","Adres","Cihaz","Model","Durum","Fiyat","Tahsilat","Açıklama","Yapılan İşlem","Kayıt Tarihi");
		
				foreach($sorgu as $row){
					$fisler[]=array(
								$row["id"],
								$row["musteri"],
								$row["tel"],
								$row["adres"],
								$cihaz_name[$row["cihaz"]],
								$row["model"],
								$durum_string[$row["durum"]],
								$row["fiyat"],
								$row["tahsilat"],
								$row["ariza"],
								$row["yapilan_islem"],
								date( 'd.m.Y - H:i', strtotime($row["kayit_tarihi"]))
						);	
					}
					
				// echo "<pre>";
				// print_r($fisler);
				// echo "</pre>";

				$xls = new Excel_XML('UTF-8', false, 'Sheet');
				$xls->addArray($fisler);
				$xls->generateXML('tablo.xls');
			break;
			
		}
		
	}
	else{
		header("Location:index.php");
		exit();
	}
	
	$db = null;
	
	//tarih parçalama
	function tarih_parcala($tarih_veri){
		$tarih_arr = explode(".",$tarih_veri);
		$mysql_tarih = $tarih_arr[2]."-".$tarih_arr[1]."-".$tarih_arr[0];
		return $mysql_tarih;
	}

?>