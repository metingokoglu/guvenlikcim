<! DOCTYPE html>
<html lang="tr-TR">
<head>
	<meta charset="UTF-8" />
	<title>Servis Takip::Kullanıcı Yönetim Sayfası</title> 
	<script type="text/javascript" src="css_js/jquery-1.11.2.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="css_js/yonetim.css" />
	<link href="css_js/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="png/favicon.ico" />
</head>
<body>

	<?php

		require_once("mysql_ayar.php");
		oturum_kontrol();
		ob_start();
		
		if($_SESSION["useryetki"]!="0"){
			header("Refresh:4; url=index.php");
			die(" <br/> <span style='margin-left:20px;'>Bu Sayfaya Erişim Hakkınız Yoktur!.. Ana Sayfaya Yönlendiriliyorsunuz...</span>");
		}
		
	?>
	
	<div id="panel">
		<h2>Kullanıcı Ekle<i class="fa fa-plus" style="float:right;font-size:10px;line-height:14px;margin:5px;"></i></h2>
		<form action="" method="post" onsubmit="return false">
			<input type="text" name="kadi" maxlength="30" placeholder="Kullanıcı Adı" />
			<input type="password" name="sifre" maxlength="30" placeholder="Şifre" />
			<input type="text" name="eposta" maxlength="40" placeholder="Eposta" />
			<select name="yetki" style="padding:5px;height:36px;">
				<option value="-1">-Yetki Seçiniz-</option>
				<option value="0">Yönetici</option>
				<option value="1">Kullanıcı</option>
			</select>
			<input type="hidden" name="islem" value="ekle" />
			<input type="hidden" name="user_id" />
			<button type="submit" name="kaydet">Kaydet</button>
		</form>
	</div>
	<div id="users">
		<ul>
			
			<?php
			
				$db = baglan();
				$user_sorgu = $db -> query("select * from users where sil='0'",PDO::FETCH_ASSOC);
				
				foreach($user_sorgu as $row){
					echo "<li user_id='".$row["id"]."' master='".$row["master"]."' eposta='".$row["eposta"]."' yetki='".$row["yetki"]."'>".$row["user"]."<i class='fa fa-times' title='Sil' style='float:right;cursor:pointer;margin-left:8px;'></i><i class='fa fa-pencil' title='Düzenle' style='float:right;cursor:pointer'></i></li>\n";
				}
			
			?>
		</ul>
	</div>
	
	<!--JQUERY-->
	<script type="text/javascript">
	
		$(function(){
			
			var master = 0;
			
			/*Kullanıcı sil*/
			$("body").on("click","#users > ul > li i:nth-child(1)",function(){
				if($(this).parent().attr("master") == 1){
					alert("UYARI!...\n"+$(this).parent().text()+" hesabını silemezsiniz!")
				}
				else{
					if(confirm($(this).parent().text()+"\nAdlı Kullanıcıyı Silmek İstiyor musunuz?")){
						$.ajax({
							type : "post",
							url : "kullanici_yonetim_islem.php",
							data : {islem : "sil",user_id : $(this).parent().attr("user_id")}
						});
						$(this).parent().remove();
					}
				}
			});
			
			/*Kullanıcı düzenle*/
			$("body").on("click","#users > ul > li i:nth-child(2)",function(){
				$("#panel > h2").html('Kullanıcı Düzenle<i class="fa fa-pencil-square-o" style="float:right;font-size:10px;line-height:14px;margin:5px;"></i>');
				$("input[name=kadi]").val($(this).parent().text());
				$("input[name=eposta]").val($(this).parent().attr("eposta"));
				$("input[name=islem]").val("duzenle");
				$("input[name=user_id]").val($(this).parent().attr("user_id"));
				$("select[name=yetki]").val($(this).parent().attr("yetki"));
				master = $(this).parent().attr("master");
			});
			
			/*Form gönderiliyor*/
			$("#panel form").bind("submit",function(){
				$("#panel p:first").remove();
				if($.trim($("input[name=kadi]").val()) == "" || $.trim($("input[name=sifre]").val()) == "" || $.trim($("input[name=eposta]").val()) == "" || $("select[name=yetki]").val() == -1){
					$("<p>").appendTo($("#panel")).end().text("Bilgileri Tam Girin!").animate({"top":"230px"},300);
				}
				else{
					$("#panel button").attr("disabled","disabled");
					$("<p>").appendTo($("#panel")).end().text("Kaydediliyor...").css("color","#2D72CF").animate({"top":"230px"},300);
					$.ajax({
						type : "post",
						url : "kullanici_yonetim_islem.php",
						dataType : "json",
						data : $("#panel form").serialize(),
						success:function(c){
							$("#panel button").removeAttr("disabled");
							$("#panel p:first").remove();
							var p = c.sonuc;
							if(p == "hata"){
								$("<p>").appendTo($("#panel")).end().text("Hata oluştu!").animate({"top":"230px"},300);
							}
							else if(p == "user"){
								$("<p>").appendTo($("#panel")).end().text("Bu Kullanıcı Adı Kullanılıyor!").animate({"top":"230px"},300);
							}
							else if(p == "eposta"){
								$("<p>").appendTo($("#panel")).end().text("Bu Eposta Kullanılıyor!").animate({"top":"230px"},300);
							}
							else if(p == "bos"){
								$("<p>").appendTo($("#panel")).end().text("Bilgileri Tam Girin!").animate({"top":"230px"},300);
							}
							else{
								if(p == "duzenle_ok"){
									$("#users > ul li[user_id="+c.user_id+"]").attr("user_id",c.user_id);
									$("#users > ul li[user_id="+c.user_id+"]").attr("yetki",c.yetki);
									$("#users > ul li[user_id="+c.user_id+"]").attr("eposta",c.eposta);
									$("#users > ul li[user_id="+c.user_id+"]").attr("master",master);
									$("#users > ul li[user_id="+c.user_id+"]").html(c.kadi+"<i class='fa fa-times' title='Sil' style='float:right;cursor:pointer;margin-left:8px;'></i><i class='fa fa-pencil' title='Düzenle' style='float:right;cursor:pointer'></i>\n");
								}
								else if(p == "ekle_ok"){
									$("#users > ul").append(c.mesaj);
									$("#users > ul li").last().css("display","none").slideDown(200);
								}
							}
						},
						error:function(){
							$("#panel button").removeAttr("disabled");
							$("#panel p:first").remove();
							$("<p>").appendTo($("#panel")).end().text("Hata oluştu!").animate({"top":"230px"},300);
						}
					});
				}
			});
			
			/*Admin kullanıcısı yetki değiştirilmesi engelleniyor*/
			$("select[name=yetki]").change(function(){
				if(master == 1){
					if($(this,":selected").val() == 1){
						alert("Bu Kullanıcının Yetkisini Değiştiremezsiniz!..");
						$(this,":selected").val(0);
					}
				}
			});
			
		});
	
	</script>

</body>
</html>
	<?php

		$db = null;

	?>