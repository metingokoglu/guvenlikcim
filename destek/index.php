<?php

	require_once("mysql_ayar.php");
	oturum_kontrol();
	baglan();
	
	// $_SESSION["user"]="ok";
	// $_SESSION["userid"]=$veri["id"];
	// $_SESSION["username"]=$veri["user"];
	// $_SESSION["useryetki"]=$veri["yetki"];
	// $_SESSION["usersongiristarih"]=$veri["giris_tarih"];
	// $_SESSION["usersonislemtarih"]=date("Y-m-d H:i:s");
	// $_SESSION["usersonislemtarihonce"]=$_SESSION["usersonislemtarih"];
	
	$db=null;

?>

<!DOCTYPE html>
<html lang="tr-TR">
<head>
<meta charset="UTF-8" />
<title>Servis Takip v1.00 ::</title>
<script type="text/javascript" src="css_js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="css_js/jquery.inputmask.js"></script>
<script type="text/javascript" src="css_js/sorttable.js"></script>
<script type="text/javascript" src="css_js/jquery.formatCurrency-1.4.0.min.js"></script>
<script type="text/javascript" src="css_js/jquery-ui.min.js"></script>
<script type="text/javascript" src="css_js/datepicker-tr.js"></script>
<script type="text/javascript" src="css_js/jquery.number.min.js"></script>
<script type="text/javascript" src="css_js/servis_takip.js"></script>

<link href="css_js/stil.css" rel="stylesheet" type="text/css" />
<link href="css_js/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="css_js/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="png/favicon.ico"/>
</head>

<body>
<div id="rapor_ekran">
	<h2>Rapor Al<i class="fa fa-times" title="Kapat" style="float:right;cursor:pointer;"></i></h2>
	<form action="rapor.php" method="POST" target="_blank">
		<label style="float:left;width:auto;">Tarih :</label>
		<input type="checkbox" name="rapor_tarih" style="width:auto;margin-top:13px;"/>
		<input readonly="true" type="text" name="rapor_tarih_bas" placeholder="Başlangıç" />
		<input readonly="true" type="text" name="rapor_tarih_bit" placeholder="Bitiş" />
		<input type="hidden" name="tip" />
		<button type="submit" value="raporla">Rapor Al</button>
	</form>
</div>
<p id="kayit_yok">Kayıt Bulunamadı..!</p>
<div id="fis_duzenle">
<h2 id="fis_duzenle_baslik">Kayıt Düzenle</h2>
<div id="fis_duzenle_icerik">
<div id="duzenle_form">

<form method="post" id="form_fis_duzenle" name="form_fis_duzenle" onsubmit="return false;">
<fieldset>
<legend>İletişim Bilgileri</legend>
<input type="hidden" name="fis_id"/>
<input type="hidden" name="aktif_user_id"/>
<label for="d_musteri">Müşteri :</label>
<input name="d_musteri" type="text" class="duzenle_girdi" maxlength="50" placeholder="Müşteri *"/>
<label for="d_tel">Telefon :</label>
<input class="duzenle_girdi" type="text" name="d_tel" placeholder="Telefon *"/>
<label for="d_adres" style=" display:none;">Adres :</label>
<textarea name="d_adres" style=" display:none;"></textarea>
</fieldset>
<fieldset>
<legend>Cihaz Bilgileri</legend>
<label for="d_cihaz">Cihaz :</label>
<select name="d_cihaz" style="width:83%">
  <option value="1">Masaüstü</option>
  <option value="2">Dizüstü</option>
  <option value="3">Telefon</option>
  <option value="4">Tablet</option>
  <option value="5">Monitör</option>
  <option value="6">Elektronik Eşya</option>
  <option value="7">Diğer</option>
</select>
<label for="d_marka" style="float:left;">Marka :</label>
<input name="d_marka" style="float:left;" type="text" style="width:79%" class="duzenle_girdi" maxlength="35"/>
<label for="d_model" style="float:left;">Model :</label>
<input name="d_model" style="float:left;" type="text" style="width:79%" class="duzenle_girdi" maxlength="35"/>
<label for="d_aksesuar1">Çanta :</label>
<select name="d_aksesuar1" style="float:left;">
  <option value="1">Var</option>
  <option value="2">Yok</option>
</select>
<label for="d_aksesuar2">Şarj Aleti :</label>
<select name="d_aksesuar2" style="float:left;">
  <option value="1">Var</option>
  <option value="2">Yok</option>
</select>
<label for="d_aksesuar3">Mouse :</label>
<select name="d_aksesuar3" style="float:left;">
  <option value="1">Var</option>
  <option value="2">Yok</option>
</select>
<label for="d_aksesuar4">Batarya :</label>
<select name="d_aksesuar4" style="float:left;">
  <option value="1">Var</option>
  <option value="2">Yok</option>
</select>
<label for="d_aciklama">Arıza :</label>
<textarea name="d_aciklama" placeholder="Arıza *"></textarea>
</fieldset>

<fieldset>
<legend>Servis Bilgileri</legend>
<label style="margin-top:3px;">Durum :</label>
<label for="iade" class="etiket_durum">İade</label>
<input class="durum" id="iade" type="checkbox" name="iade" value="1"/>
<label for="bekliyor" class="etiket_durum">Bekliyor</label>
<input class="durum" id="bekliyor" type="radio" name="d_durum" value="1"/>
<label for="yapildi" class="etiket_durum">Hazır</label>
<input class="durum" id="yapildi" type="radio" name="d_durum" value="2"/>
<label for="teslimedildi" class="etiket_durum">Teslim Edildi</label>
<input class="durum" id="teslimedildi" type="radio" name="d_durum" value="4"/>
<div id="gnmz" style="width:150px;height:30px;"></div>
<label for="d_fiyat">Fiyat :</label>
<input name="d_fiyat" type="text" class="duzenle_girdi" maxlength="15" placeholder="TL"/>
<label for="d_tahsilat">Tahsilat :</label>
<input name="d_tahsilat" type="text" class="duzenle_girdi" maxlength="15" placeholder="TL"/>

<textarea name="d_servis" placeholder="Servis *" style="width: 442px;"></textarea>
</fieldset>
<button class="kayit_buton" type="submit" name="fis_duzenle_kaydet" style="margin-left:81px;">Kaydet</button>
<button class="kayit_buton" type="reset" name="fis_duzenle_iptal" style="margin-left:15px;text-align:right;background-image: url(png/Close-2-icon.png);">İptal&nbsp;&nbsp;&nbsp;&nbsp;</button>
</form>

</div>
<div id="fis_duzenle_loglar">
<h1>Loglar</h1>
</div>
<div id="fis_duzenle_resimler">
<h1>Resimler</h1>
</div>
<div id="fis_duzenle_footer"></div>
</div>
</div>


<div id="tablo_sonuc">
<ul></ul>
<div id="fiyat_toplam">
<h2 id="f_toplam" style="width:12%;"></h2>
<h2 id="t_toplam" style="width:15%;"></h2>
</div>
</div>
<div id="tablo">
<table name="tablo" cellspacing="0" cellpadding="0" width="100%" border="1" class="sortable" style="border-collapse:collapse;border-spacing:0px;border: 1px solid #CCC;table-layout:fixed;">
 <thead>
  <tr>
     <th class="sorttable_numeric" style="width:3%;"></th>
     <th class="sorttable_numeric" style="width:5%;">Kayıt No</th>
     <th style="width:12%;">Müşteri</th>
     <th class="sorttable_nosort" style="width:10%;">Telefon</th>
     <th style="width:10%;">Cihaz</th>
     <th style="width:6%; display:none;">Çanta</th>
     <th style="width:6%; display:none;">Şarj Aleti</th>
     <th style="width:6%; display:none;">Mouse</th>
     <th style="width:6%; display:none;">Batarya</th>
     <th style="width:6%;">Marka</th>
     <th style="width:6%;">Model</th>
     <th style="width:12%;">Durum</th>
     <th class="sorttable_numeric" style="width:50px;">Fiyat</th>
     <th class="sorttable_numeric" style="width:50px;">Tahsilat</th>
     <th style="width:11%;">Kayıt Tarihi</th>
     <th style="width:11%;">Teslim Tarihi</th>
     <th style="width:15%;">Arıza</th>
     <th class="sorttable_nosort" style="width:11%;">İşlem</th>
  </tr>
 </thead>
 <tbody name="data">
 </tbody>
</table>
</div>
<div id="yukleme_ekran">
<div id="yukleme_gif"></div>
</div>
<div id="golge"></div>
<div id="mesaj_ekran">
<h1 id="mesaj_baslik">Kayıt Başarılı</h1>
<p  id="mesaj_icerik">Kayıt Numarası<br /><strong id="fis_no" style="font-size:22px;margin-top:5px;display:block;"></strong></p>
<button id="fis_no_tamam">Tamam</button>
</div>

<div id="resim_yukle">
<div id="resim_yukle_kapat" title="kapat"></div>
<h2 id="resim_yukle_baslik">Resim Yükle</h2>

<form action="resim_yukle.php" method="post" enctype="multipart/form-data" id="resim_form">
<input type='hidden' name='fis_id'>
<div id="yukleme">
<span>1.Resim : <input type="file" name="resim[]" accept="image/jpg, image/jpeg" sira="0" style="width:255px;"/></span>
</div>
<button id="yukle" type="submit">Yükle</button>
</form>

<span style="float:right;font:12px Arial;color:#999;margin:12px 6px;padding:0;">2mb [ ' jpg ' , ' jpeg ' ]</span>
<iframe id="gelen_bilgi" name="gelen_bilgi" src="" style="display:none;"></iframe>
<div id="resim_sonuc"></div>
</div>

<div id="yeni_fis_ekran">
<h2>Yeni Servis Kaydı</h2>
<div id="kayit_form">

<form id="yeni_fis_kayit" method="post" name="yeni_fis_kayit" onsubmit="return false;">
<fieldset>
<legend>Müşteri Bilgileri</legend>
<input class="fis_kayit_girdi" placeholder="Müşteri *" name="musteri" type="text" size="50" style="float:left;width:160px;margin-right:0px;" maxlength="50" />
<img src="png/musteri.png" draggable="false" width="16" height="16" style="float:left;margin-right:5px;margin-top: 13px;" border="0" 
style="margin:10px;margin-top:13px;"/>

<input class="fis_kayit_girdi" placeholder="Telefon *" name="tel" type="text" size="50" style="float:left;width:160px;margin-right:0px;" maxlength="50" />
<img src="png/tel.png" draggable="false" width="16" height="16" style="float:left;margin-right:5px;margin-top: 13px;" border="0" 
style="margin:10px;margin-top:20px;"/>

<textarea name="adres" cols="50" rows="2" class="fis_kayit_girdi" placeholder="Adres" style=" display:none;height:50px;resize: none;overflow:auto;"></textarea>
<img src="png/adres.png" draggable="false" width="16" height="16" border="0" 
style="margin:15px 0px 0px 10px; display:none;"/>
</fieldset>
<fieldset style = "margin-top:10px;">
<legend style="float:left;width:100%;">Cihaz Bilgileri</legend>
<select class="fis_kayit_girdi" name="cihaz" style="height:36px;width:100%;cursor:">
  <option value="1">Masaüstü</option>
  <option value="2">Dizüstü</option>
  <option value="3">Telefon</option>
  <option value="4">Tablet</option>
  <option value="5">Monitör</option>
  <option value="6">Elektronik Eşya</option>
  <option value="7">Diğer</option>
</select>

<input class="fis_kayit_girdi" name="marka" type="text" size="30" maxlength="30" placeholder="Marka" style="margin-right:19px;width:160px;float:left;"/>
<input class="fis_kayit_girdi" name="model" type="text" size="30" maxlength="30" placeholder="Model" style="margin-right:19px;width:160px;float:right;"/>

<table style="border:0px;padding:0px;width:100%;" border="0" cellpadding="0" cellspacing="0">
	<tr style="border:none;">
		<td style="border:none;">
			Çanta<br/>
			<select name="aksesuar1" style="height:36px;width:171px;cursor:pointer;margin:0px;">
			  <option value="1">Var</option>
			  <option value="2" selected>Yok</option>
			</select>
		</td>
		<td style="border:none;">
			Şarj Aleti<br/>
			<select name="aksesuar2" style="height:36px;width:171px;cursor:pointer;margin:0px;">
			  <option value="1">Var</option>
			  <option value="2" selected>Yok</option>
			</select>
		</td>
	</tr>
	<tr style="border:none;">
		<td style="border:none;">
			Mouse<br/>
			<select name="aksesuar3" style="height:36px;width:171px;cursor:pointer;margin:0px;">
			  <option value="1">Var</option>
			  <option value="2" selected>Yok</option>
			</select>
		</td>
		<td style="border:none;">
			Batarya<br/>
			<select name="aksesuar4" style="height:36px;width:171px;cursor:pointer;margin:0px;">
			  <option value="1">Var</option>
			  <option value="2" selected>Yok</option>
			</select>
		</td>
	</tr>
</table>

<input name="fiyat" type="text" class="fis_kayit_girdi" maxlength="15" placeholder="TL" style="width:359px;"/>

<textarea name="ariza" placeholder="Arıza *" cols="50" rows="2" class="fis_kayit_girdi" style="height:50px;width:359px;resize: none;overflow:auto;"></textarea>
</fieldset>
<input name="resim_ekle" type="checkbox" style="float:left;margin:5px 5px 0px 10px;padding:0;width:17px;height:17px;"/><span class="onay_kutusu">Resim Ekle</span>
<button class="kayit_buton" type="submit" name="kaydet">Kaydet</button>
<button class="kayit_buton" type="reset" name="iptal" style="margin-left:15px;text-align:right;background-image: url(png/Close-2-icon.png);">İptal&nbsp;&nbsp;&nbsp;&nbsp;</button>
</form>

<h1 id="kayit_sonuc"></h1>
<img id="kaydediliyor" src="png/loading.gif" width="20" height="20" style="position:absolute;left:15px;margin:0;padding:0;display:none;bottom:15px"/>
</div>
</div>

<div id="ust_menu">
<h1 id="servis_takip2">Servis Takip</h1><p id="versiyon1">v1.00</p>
<h2 id="firma_isim"></h2>
<div id="user_bilgi">
<h1 id="user_isim"><?php echo $_SESSION["username"];?></h1>
<img id="user_resim" src="png/user.png" width="24" height="24" />
<h1 id="user_son_giris">Son Giriş : <?php echo date( 'd.m.Y H:i', strtotime($_SESSION["usersongiristarih"]));?></h1>
<img id="cikis1" src="png/cikis.png" width="32" height="32" alt="Çıkış" title="Çıkış"/> 
</div>
<?php  if($_SESSION["useryetki"] == 0){ echo "<button title='Kullanıcı Yönetim Paneli' onclick='window.open(\"kullanici_yonetim.php\",\"_blank\")'>Kullanıcı Yönetim <i class='fa fa-user-plus' style='font-size:12px;line-height:12px;'></i></button>";} ?>
<div id="menu1">
<button name="yenifis" id="yenifis">Yeni Kayıt</button>
<div id="arama">
	<button id="ara">Ara</button>
	<div id="arama_ekran">
		<h2>Arama Formu</h2>
		<form id="arama_formu" name="arama_formu" method="post" action="" onsubmit="javascript:return false" style="padding:10px;">
			<label for="ara_tarih">Tarih</label>
			<input type ="checkbox" name="ara_tarih" style="margin-top:20px;"/>
			<input type="text" name="ara_tarih_bas" placeholder="başlangıç" readonly="true" style="width:109px;"/>
			<input type="text" name="ara_tarih_son" placeholder="bitiş" readonly="true" style="width:109px;"/>
			<label>Nerede</label>
			<select name="nerede" style="margin-left:20px;padding:4px;height:31px;">
				<option value="musteri">Müşteri</option>
				<option value="id">Kayıt No</option>
				<option value="tel">Telefon</option>
				<option value="model">Cihaz</option>
				<option value="ariza">Arıza</option>
			</select>
			<input type="text" name="anahtar_kelime" placeholder="anahtar kelime" style="width:150px;"/>
			<button type="submit" id="ara_buton">Ara</button>
		</form>
	</div>
</div>
	<div id="rapor" class="noselect">
		<ul>
		<li><i class="fa fa-list-alt"></i> Rapor<i class="fa fa-angle-down" style="float:right;"></i>
			<ul>
				<li tip="genel" tik="rapor"><i class="fa fa-pie-chart"></i> Genel</li>
				<li tip="servis" tik="rapor"><i class="fa fa-cog"></i> Servis<i class="fa fa-table" style="float:right;width:8px;height:8px;margin:2px;margin-right:14px;"></i></li>
			</ul>
		</li>
		</ul>
	</div>
	
	<div id="excel_list">
		<span id="list" class="excel_list_class" title="Tüm Kayıtlar"></span>
		<span id="excel" class="excel_list_class" title="Excele Aktar"></span>
	</div>

</div>
</div>
<?php echo site(); ?>
<div id="reklam">
	<a href="" target=""><span> x </span></a>
</div>

<script>

    var yetki= <?php echo $_SESSION["useryetki"];?>;
	var aktif_user = <?php echo $_SESSION["userid"];?>;
	var cikis=false;
	var sayfa=1;
	var istek="full";
	var gosterim=30;
	var gorunen=3;
	var toplam_sayfa=0;
	var users=[];
	var servis_pos = "tam";
	var ara_query = "";
	var excel_gonder = "";
	
	var gonder = 1;
	
	var durum=["","Bekliyor","Hazır","İade","Teslim Edildi"];
	
	var cihaz=["","Masaüstü","Dizüstü","Telefon","Tablet","Monitör","Elektronik Eşya","Diğer"];
	
	var aksesuar1=["","Var","Yok"];
	var aksesuar2=["","Var","Yok"];
	var aksesuar3=["","Var","Yok"];
	var aksesuar4=["","Var","Yok"];
	
	var firma = <?php  echo $_SESSION["firma"]; ?>;

</script>

</body>
</html>