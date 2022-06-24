<?php
		
		require_once("mysql_ayar.php");
		oturum_kontrol();
		post_kontrol();
		
		session_start();
		if($_SESSION["user"]=="ok"){
		
			$tarih1=new DateTime(date("Y-m-d H:i:s"));
			$tarih2=new DateTime($_SESSION["usersonislemtarihonce"]);
			$son=$tarih2->diff($tarih1);
			
			if($son->format('%i')>10){
				$_SESSION["user"]="null";
				echo "0";
			}		
		}
	
?>