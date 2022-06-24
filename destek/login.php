
<?php

	require_once("mysql_ayar.php");
	
	session_start();
	if($_SESSION["user"]=="ok"){ header("location:index.php"); die();}
	
	else{
?>
<!DOCTYPE html>
<html lang="tr-TR">
<head>
<meta charset="UTF-8">
<title>Servis Takip v1.00 : Login</title>
<script type="text/javascript" src="css_js/jquery-1.11.2.min.js"></script>
<link href="css_js/stil.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="png/favicon.ico"/>
</head>
	
<body>
<div id="login">

<div id="login_baslik">
<h1 id="servis_takip">Servis Takip</h1>
<p id="versiyon">v1.00</p>
</div>

<div id="login_texts">
<h1 id="login_giris">Kullanıcı Girişi</h1>
<form method="post" name="giris" id="giris" onsubmit="return false;">
<input name="user" type="text" size="30" maxlength="30" placeholder="Kullanıcı Adı"/>
<input id="sifre_kutu" name="sifre" type="password" size="30" maxlength="30" placeholder="Şifre"/>
<img src="png/loading.gif" width="30" height="30" deger="yukle"/>
<button name="gonder" type="submit" value="Devam" id="gonder">Giriş</button>
</form>
</div>

<h2 class="sonuc" id="sonuc"></h2>
</div>

<!--Jquery-->
<script>

$(document).ready(function(){
	
	$("#giris").submit(function(){
		$("#sonuc" ).hide();
		if($.trim($("input[name=user]").val())=="" || $.trim($("input[name=sifre]").val())==""){	
		    $("#sonuc").html("* Kullanıcı adı ve şifre girin!");
			$("#sonuc" ).slideDown();
		}
		else{
			$("img[deger=yukle]").css("display","block");
			$("button[name=gonder]").attr("disabled","disabled");
			$("#sonuc").empty();
			$.ajax({
			type:'POST',
			url:'giris.php',
			data:$('#giris').serialize(),
			success:function(cevap){
				$("#sonuc" ).slideDown();
				$("img[deger=yukle]").css("display","none");
				if(cevap=="0"){
				   $("#sonuc").html("* Kullanıcı adı veya şifre yanlış!");	
				   $("button[name=gonder]").removeAttr('disabled');
				}
				else if(cevap=="2"){
				   $("#sonuc").html("* Kullanıcı pasif!");
				   $("button[name=gonder]").removeAttr('disabled');				   
				}
				else if(cevap=="3"){
				   $("#sonuc").html("* Kullanıcı adı ve şifre girin!");	
				   $("button[name=gonder]").removeAttr('disabled');
				}
				else{
				var veri=JSON.parse(cevap);
				if(veri["id"].length>0){
					$("#sonuc").css("color","green");
					$("#sonuc").html("Giriş başarılı...");
					self.location="index.php";
					}
				}
			}
			
		});
		}
				 	
	});
	
}); 

</script>
<!--Jquery-->

</body>
</html>   
    
<?php	}

?>