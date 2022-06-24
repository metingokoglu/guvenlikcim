<! DOCTYPE html>
<html lang="tr-TR">
<head>
	<meta charset="UTF-8" />
	<title>Servis Takip::Evrak Basım Sayfası</title> 
	<script type="text/javascript" src="css_js/jquery-1.11.2.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="css_js/evrak.css" />
	<link href="css_js/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="png/favicon.ico" />
</head>
<body>

	<?php
		$sunucu = "localhost";
						$kullanici_adi = "guvenli3_metin";
						$sifre = "Metin_2272609";
						$veritabani = "guvenli3_borgatec";
		
		$link = mysql_connect($sunucu, $kullanici_adi, $sifre) or die(mysql_error());
		$db = mysql_select_db($veritabani, $link) or die (mysql_error());
		date_default_timezone_set('Europe/Istanbul');
		mysql_query("SET NAMES UTF8");
		
		$barcod = $_GET['id'];
		$conf = mysql_fetch_assoc(mysql_query('SELECT * FROM fis_hrk WHERE id = "' . $_GET['id'] . '"'));
		$tarih_exp1 = explode(' ', $conf["kayit_tarihi"]);
		$tarih_exp2 = explode('-', $tarih_exp1[0]);
		$tarih = $tarih_exp2[2] . '.' . $tarih_exp2[1] . '.' . $tarih_exp2[0] . ' ' . $tarih_exp1[1];
		$aksesuar = '';
		if($conf["aksesuar1"] == 1){ $aksesuar .= 'Çanta, ';}
		if($conf["aksesuar2"] == 1){ $aksesuar .= 'Şarj Aleti, ';}
		if($conf["aksesuar3"] == 1){ $aksesuar .= 'Mouse, ';}
		if($conf["aksesuar4"] == 1){ $aksesuar .= 'Batarya, ';}
		$aks = mb_substr($aksesuar,0,-2,'UTF8');
	?>
	<table class="table" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="6" class="servisbaslik">
				TEKNİK SERVİS FORMU
			</td>
		</tr>
		<tr>
			<td colspan="6"></td>
		</tr>
		<tr>
			<td colspan="3">
				<img src="barcode.php?size=40&text=<?=$conf["id"];?>&print=true" style="margin-left:10px;margin-bottom:10px;">
			</td>
			<td colspan="3">
				<table class="ictable">
					<tr>
						<td>BELGE NO</td>
						<td>:</td>
						<td><?=$conf["id"];?></td>
					</tr>
					<tr>
						<td>GİRİŞ TARİHİ</td>
						<td>:</td>
						<td><?=$tarih;?></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr class="icbaslik">
			<td colspan="6">MÜŞTERİ BİLGİLERİ</td>
		</tr>
		<tr class="trclass">
			<td class="w150">MÜŞTERİ ADI SOYADI</td>
			<td class="w1">:</td>
			<td class="w2"><?=$conf["musteri"];?></td>
			<td class="w150">TELEFON</td>
			<td class="w1">:</td>
			<td class="w243"><?=$conf["tel"];?></td>
		</tr>
		<tr class="icbaslik">
			<td colspan="6">CİHAZ BİLGİLERİ</td>
		</tr>
		<tr class="trclass">
			<td class="w150">CİHAZ MARKA</td>
			<td class="w1">:</td>
			<td class="w2"><?=$conf["marka"];?></td>
			<td class="w150">CİHAZ MODEL</td>
			<td class="w1">:</td>
			<td class="w243"><?=$conf["model"];?></td>
		</tr>
		<tr class="trclass">
			<td class="w150">TESLİM ALINAN AKSESUAR</td>
			<td class="w1">:</td>
			<td colspan="4"><?=$aks;?></td>
		</tr>
		<tr class="trclass">
			<td class="w150">CİHAZIN ARIZASI</td>
			<td class="w1">:</td>
			<td colspan="4"><?=$conf["ariza"];?></td>
		</tr>
		<tr>
		<td colspan="6" class="trclass2" style="padding:10px 5px;">
			1-) Arızalı ürünler üzerinde yer alan yazılımların lisanları ile ilgili sorumluluk tamamen müşterilerimize aittir.<br>
			2-) Gönderilen Arızalı cihazın kargo ve paketleme işlemlerinden tamamen müşterilerimiz sorumludur.<br>
			3-) Teknik servisimize bırakılan ürünlerin 30 Gün içerisinde teslim alınması gerekmektedir. Zamanında teslim<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;alınmayan ürünler için hiçbir hak talep edilemez.<br>
			4-) Ürün teslimi "Teknik Servis Formu" ile yapılır. Değiştirilerek yenisi takılan ürünler üreticisinin garantisindedir.
			</td>
		</tr>
	</table>
	
</body>
</html>