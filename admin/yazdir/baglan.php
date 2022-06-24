<?php 
	$con = mysqli_connect("localhost", "arlinmzi_metin", "Metin_2272609", "arlinmzi_guvenlikcim");

	mysqli_query($con,"SET NAMES UTF8");
	if (!$con) {
	    echo "Error: Unable to connect to MySQL." . PHP_EOL;
	    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}
?>