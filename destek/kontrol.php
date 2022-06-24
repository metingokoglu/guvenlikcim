<?php
	
	$dosya = include("baglan.php");
	
	if($dosya && $kurulum_ok == 1){
		//Kurulum klasörünü silebilirsiniz
	}
	else{
		header("Location:kurulum");
	}

?>