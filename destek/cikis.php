<?php

	require_once("mysql_ayar.php");
	oturum_kontrol();
	post_kontrol();
	
	$cikis=trim($_POST["cikis"]);
	
	if($cikis=="true"){
		session_start();
		$_SESSION["user"]="null";
		echo "1";
	}

?>