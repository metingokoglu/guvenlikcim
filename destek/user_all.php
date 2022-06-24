<?php

	require("mysql_ayar.php");
	oturum_kontrol();
	post_kontrol();
	
	$db = baglan();
	
	$sorgu = $db -> query("select * from users",PDO::FETCH_ASSOC);
	
	foreach($sorgu as $user){
		$users[]=array("id" => $user["id"],"user" => $user["user"],"yetki" => $user["yetki"]);
	}
	
	echo json_encode($users);
	
	$db = null;

?>