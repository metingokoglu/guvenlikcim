<?php

	include("mysql_ayar.php");
	include("resize_class.php");
	oturum_kontrol();
	post_kontrol();
	
	$fis_id=$_POST["fis_id"];
	$formatlar = array("image/jpg","image/jpeg");
	$toplam=count($_FILES["resim"]["name"]);

	
	$sonuc=array();
	$hata=array();
	for($i = 0; $i < $toplam; $i++){
		
		$isim=time()."_".rand(0,10000).".jpg";
		$path_by = "resim/by_".$isim;
		$path_kc = "resim/kc_".$isim;
		$boyut  = $_FILES['resim']['size'][$i];
		
		if(in_array($_FILES["resim"]["type"][$i],$formatlar)){
			if(floor(($boyut/1024)/1024)>2){
				$sonuc[$i]=0;
				$hata[$i]=($i+1).".Resim 2Mb'tan Büyük ! ";
			
			}
			else{
					if(move_uploaded_file($_FILES["resim"]["tmp_name"][$i],$path_by)){
						$resizeObj_by = new resize($path_by);
						$resizeObj_by -> resizeImage(45, 35, 'crop');
						$resizeObj_by -> saveImage($path_kc, 100);
						$sonuc[$i]=1;
						$hata[$i]="<font style='color:green;'>".($i+1).".Resim Yüklendi ! "."</font>";
						
						$db=baglan();
						$resim_kayit=$db -> prepare("insert into resim set fis_hrk_id = ?, url = ?, kayit_tarihi = ?, sil='0'");
						$resim_kayit -> execute(array($fis_id,$isim,date("Y-m-d H:i:s")));
						$db=null;
						
					}
			
			}
		}
		else{
			$sonuc[$i]=2;
			$hata[$i]="<font style='color:red;'>".($i+1).".Resim Yanlış Format ! "."</font>";
			}
			
	}
	
	foreach($sonuc as $s){
		echo $s;
		
	}
	foreach($hata as $s){
		echo $s;
		
	}

?>