<?php

	error_reporting(0);
	date_default_timezone_set('Europe/Istanbul');
	require_once("kontrol.php");

	session_start();
		if($_SESSION["user"]=="ok"){
		
			$tarih1=new DateTime(date("Y-m-d H:i:s"));
			$tarih2=new DateTime($_SESSION["usersonislemtarihonce"]);
			$son=$tarih2->diff($tarih1);
			
			if($son->format('%i')>10){
				$db=null;
				$_SESSION["user"]="null";
				
				header("location:login.php");
				exit;
			}		
			else{
			$_SESSION["usersonislemtarihonce"]=$_SESSION["usersonislemtarih"];
			$tarih=date("Y-m-d H:i:s");
			$_SESSION["usersonislemtarih"]=$tarih;
			}
		
		}
	
	function oturum_kontrol(){
		session_start();
		if($_SESSION["user"]!="ok"){
			header("location:login.php");
			die();
		}
	}
	
	function post_kontrol(){
		if(!$_POST){
			header("location:index.php");
			die();
		}
	}
	
	function site(){
		return "<div id='site'><a href='http://www.ikikarefarki.com' target='_blank'>2 Kare Farkı</a> | <a href='http://www.damatmedya.com' target='_blank'>Damat Medya</a></div>";
	}
	
?>