$(document).ready(function(){

	/*Kullanıcılar alınıyor*/
	$.ajax({
		type : "POST",
		url : "user_all.php",
		data : "bos=0",
		dataType : "json",
		success:function(e){		
			users = e;
		}
	});
	/*user id ile user name verir*/
	function username(id,yetki_bul){
		if(yetki_bul==true){
			for(var i=0;i<users.length;i++){
			if(users[i].id==id){
				return users[i].yetki;
			}
		}
		}
		else{
			for(var i=0;i<users.length;i++){
			if(users[i].id==id){
				return users[i].user;
			}
		}
		}
	}
	
	jQuery(function($){
		$.ajaxSetup( { type: "post" } );
		
		$("input[name=musteri]").autocomplete({
			source : "musteri_al.php",
			select : function(event,ui){
				$("input[name=tel]").val(ui.item.telefon);
				$("textarea[name=adres]").val(ui.item.adres);
			}
		});
		
		$("input[name=d_musteri]").autocomplete({
			source : "musteri_al.php",
			select : function(event,ui){
				$("input[name=d_tel]").val(ui.item.telefon);
				$("textarea[name=d_adres]").val(ui.item.adres);
			}
		});
		
		$("input[name=tel]").mask("(999) 999-9999");
		$("input[name=d_tel]").mask("(999) 999-9999");
	});
	
	$("input[name=rapor_tarih_bas],input[name=rapor_tarih_bit]").attr("disabled",true);
	
	$('input[name=d_fiyat],input[name=d_tahsilat],input[name=fiyat]').blur(function(){
		$('input[name=d_fiyat],input[name=d_tahsilat],input[name=fiyat]').formatCurrency({digitGroupSymbol:'',symbol: '' });
    });
	//$("#firma_isim").text(firma.isim+" / "+firma.il);
	
	$("#ust_menu").slideDown();
	
	/*satırları excele gönder*/
	$("#excel").click(function(){
		window.open("excel.php?"+excel_gonder, "_blank");
	});
	
	/*tüm fişleri göster*/
	$("#list").click(function(){
		query("full",1);
	});
	
	$("#cikis1").click(function(){
		if(cikis==false) {
			$.ajax({
			type:'POST',
			url:'cikis.php',
			data:"cikis=true",
			success:function(cevap){
				if(cevap=="1"){
				   self.location="login.php";	
				}
			}
		});
		}
		cikis=true;
		});
		
	$("button[value=raporla]").click(function(){
		if($("input[name=rapor_tarih]").is(":checked")){
			if(!$("input[name=rapor_tarih_bas]").val() || !$("input[name=rapor_tarih_bit]").val()){
				return false;
			}
		else{
			rapor_ekran("kapat");
		}
		}
	});
	
	$("button[name=yenifis]").click(function(){
		$("#golge").fadeIn(100);
		$("#yeni_fis_ekran").fadeIn(200);
		document.getElementById("yeni_fis_kayit").reset();
		oturum_kontrol();	
	});
	
	$('html').click(function(event) {
		if ($(event.target).closest("#arama_ekran,#ui-datepicker-div").length === 0) {
			$("#arama_ekran").slideUp();
		}
	});
	
	/*arama kısmında tarih aktif etme*/
	$("input[name=ara_tarih_bas],input[name=ara_tarih_son],input[name=rapor_tarih_bas],input[name=rapor_tarih_bit]").datepicker({changeMonth: true,changeYear: true});
	$("input[name=ara_tarih_bas],input[name=ara_tarih_son]").attr("disabled","disabled");
	$("input[name=ara_tarih]").click(function(){
		if($(this).is(":checked")){
			$("input[name=ara_tarih_bas],input[name=ara_tarih_son]").removeAttr("disabled");
		}
		else{
			$("input[name=ara_tarih_bas],input[name=ara_tarih_son]").attr("disabled","disabled");
		}
	});
	
	$("#ara_buton").click(function(){
		if($("input[name=ara_tarih]").prop("checked")){
			if( $("input[name=ara_tarih_bas]").val() == "" || $("input[name=ara_tarih_son]").val() == "" ){
				alert("Tarih Seçiniz!");
				return;
			}
		}
		ara_query = $("#arama_formu").serialize();
		query("ara",1);
		$("#arama_ekran").slideUp();
	});
	
	$("button[name=iptal]").click(function(){
		$("button[name=kaydet]").removeAttr("disabled");
		$("#golge").fadeOut(100);
		$("#yeni_fis_ekran").fadeOut(200);
		$("#kayit_sonuc").html("");	
	});
	
	$("button[name=fis_duzenle_iptal]").click(function(){
		$("button[name=fis_duzenle_kaydet]").removeAttr("disabled");
		$("#golge").fadeOut(100);
		$("#fis_duzenle").fadeOut(200);
		$("#fis_duzenle_footer").html("");	
	});
	
	$("#yeni_fis_kayit").submit(function(){
		$("#kayit_sonuc").html("");
		if($.trim($("input[name=musteri]").val())=="" || $.trim($("input[name=tel]").val())=="" || $.trim($("textarea[name=ariza]").val())==""){	
		 sonuc_yaz("* Müşteri, Telefon ve Açıklama Kısmını Boş Bırakmayınız!");
		}
		else{
			$("#kaydediliyor").show();
			$("button[name=kaydet],button[name=iptal]").attr("disabled","true");
			$.ajax({
			type:'POST',
			url:'fis_kayit.php',
			data:$("#yeni_fis_kayit").serialize(),
			success:function(cevap){
				if(cevap){
				   $("#yeni_fis_ekran").fadeOut(100);
				   $("#kayit_sonuc").html("");	
				   $("button[name=kaydet],button[name=iptal]").removeAttr("disabled");
				   $("#kayit_sonuc").slideDown();
				   $("#mesaj_ekran").slideDown();
				   $("#fis_no").html(cevap);
				   $("input[name=fis_id]").val(cevap);
				   $("#kaydediliyor").css("display","none");
				   query("full",1);
				   if($("input[name=resim_ekle]").is(":checked")){
					    $("#resim_yukle").slideDown();
						document.getElementById("resim_form").reset();
						$("#resim_sonuc").empty();
						$("input[type=file]").removeAttr("disabled");
						$("#yukle").removeAttr("disabled");
					  
				   }
				}
				else{
				   sonuc_yaz("* Hata Oluştu. Kayıt Başarısız !");
				   $("button[name=kaydet],button[name=iptal]").removeAttr("disabled");
				}
			},
		    error: function () {
				sonuc_yaz("* Hata Oluştu. Kayıt Başarısız !");
				$("button[name=kaydet],button[name=iptal]").removeAttr("disabled");
			  }
		});	
		}
	});
	
	$("#fis_no_tamam").click(function(){
		$("#golge").fadeOut(100);
		$("#mesaj_ekran").fadeOut(100);	
	});
	
	$("#resim_yukle_kapat").click(function(){
		$("#resim_yukle").slideUp(100);
	});
	
	for(var i=2;i<5;i++){
		$("#yukleme").append("<span>"+i+".Resim : <input type='file' name='resim[]' sira='"+(i-1)+"' accept='image/jpg, image/jpeg' style='width:255px;'/></span>");
	};
	
	$("#resim_form").bind("submit",function(){
		$("#yukle").attr("disabled","disabled");
		$("#resim_sonuc").empty();
		$(this).attr("target","gelen_bilgi");
		$("<img id='yukleniyor_gif'/>").attr({src:"png/loading.gif",width:"20px"}).appendTo($("#resim_sonuc"));
		
		$("#gelen_bilgi").bind("load",function(){
			var deger=$("#gelen_bilgi").contents().find("body").html();
			$("#yukleniyor_gif").remove();
			$("#yukle").removeAttr("disabled");
			$("#resim_sonuc").html(resim_sonuc_yaz(deger));
				
		});
		
	});
	
	$("li[tik=rapor]").click(function(){
		rapor_ekran("ac");
		$("#rapor_ekran h2").html($(this).text()+" "+'Rapor Al<i class="fa fa-times" title="Kapat" style="float:right;cursor:pointer;"></i>');
		$("input[name=tip]").val($(this).attr("tip"));
	});
	
	$("#rapor ul > li:first").hover(
		function(){
			$("#rapor > ul > li > ul").stop().slideDown(250);
		},
		function(){
			$("#rapor > ul > li > ul").stop().slideUp(200);
	});
	
	$("#ara").click(function(event){
		$("#arama_ekran").stop().slideToggle("slow");
		document.getElementById("arama_formu").reset();
		$("input[name=ara_tarih_bas],input[name=ara_tarih_son]").attr("disabled","disabled");
		event.stopPropagation();
	});
	
	$("body").on("click","span[name=sil]",function(){
		oturum_kontrol();
		var fis_id=$(this).attr("fis_id");
		if(confirm(fis_id+" Numaralı Fişi Silmek İstediğinize Emin misiniz?")){
			yukleme_ekran("ac");
			$.ajax({
				type:"POST",
				url: "fis_sil.php",
				data:"fis_id="+fis_id,
				success: function(){
					query(istek,sayfa);
				},
				error:function(){
				 alert("HATA OLUŞTU!");	
				}	
			});
		}	
	});
	
	$("body").on("click","span[class=resim_sil]",function(){
		if(confirm("Resmi Silmek İstediğinize Emin misiniz?")){
		$.post("resimler.php",{islem:"sil",resim_id:$(this).attr("resim_id")});
		$(this).parent().remove();
		}
	});
	
	$("body").on("click","span[name=edit]",function(){
		$("#golge").fadeIn(100);
		$("#fis_duzenle").fadeIn(200);
		document.getElementById("form_fis_duzenle").reset();
		oturum_kontrol();
		
		var fis_no = $(this).attr("fis_id");
		var musteri=$("tr[fis_id="+fis_no+"] td:nth-child(3)").text();
		var tel=$("tr[fis_id="+fis_no+"] td:nth-child(4)").text();
		var cihaz=$("tr[fis_id="+fis_no+"] td:nth-child(5)").attr("deger");
		var aksesuar1=$("tr[fis_id="+fis_no+"] td:nth-child(6)").attr("deger");
		var aksesuar2=$("tr[fis_id="+fis_no+"] td:nth-child(7)").attr("deger");
		var aksesuar3=$("tr[fis_id="+fis_no+"] td:nth-child(8)").attr("deger");
		var aksesuar4=$("tr[fis_id="+fis_no+"] td:nth-child(9)").attr("deger");
		var d_durum=$("tr[fis_id="+fis_no+"] td:nth-child(13)").attr("deger");
		var marka=$("tr[fis_id="+fis_no+"] td:nth-child(11)").text();
		var model=$("tr[fis_id="+fis_no+"] td:nth-child(12)").text();
		var fiyat=$("tr[fis_id="+fis_no+"] td:nth-child(14)").attr("deger");
		var tahsilat=$("tr[fis_id="+fis_no+"] td:nth-child(15)").attr("deger");
		var adres=$("tr[fis_id="+fis_no+"] input[name=adres]").val();
		var servis=$("tr[fis_id="+fis_no+"] input[name=servis]").val();
		var user_id=$("tr[fis_id="+fis_no+"] input[name=user_id]").val();
		var son_islem_yapan=$("tr[fis_id="+fis_no+"] input[name=son_islem_yapan]").val();
		var son_islem_tarih=$("tr[fis_id="+fis_no+"] input[name=son_islem_tarih]").val();
		var aciklama=$("tr[fis_id="+fis_no+"] td:nth-child(18)").text();
		var tarih=$("tr[fis_id="+fis_no+"] td:nth-child(16)").text();
		var iade=$("tr[fis_id="+fis_no+"] td:nth-child(10)").attr("deger");
		
		$("#fis_duzenle_resimler img").remove();
		$("#fis_duzenle_resimler p:eq(0)").remove();
		$("#fis_duzenle_resimler div").remove();
		$("<img width='25' height='25' border='0' src='png/loading.gif' style='float:left;margin:18px;'/>").appendTo("#fis_duzenle_resimler");
		
			$.ajax({
				type : "post",
				url : "resimler.php",
				data : {"fis_hrk_id":fis_no,"islem":"al"},
				dataType : "json",
				success:function(r){
					$("#fis_duzenle_resimler img:eq(0)").remove();
					if(r.length - 1){
						var resim_sil="";
						
						for(var i=1;i<r.length;i++){
							if(yetki==0){
							resim_sil="<span resim_id='"+r[i].id+"' title='Resmi Sil' class='resim_sil'></span>";
							}
							$("<div>").appendTo("#fis_duzenle_resimler").html(resim_sil+"<a href='resim/by_"+r[i].url+"' target='_blank'></a>").css("background-image","url(resim/kc_"+r[i].url+")");
						}
					}
					else{
						$("<p>").appendTo("#fis_duzenle_resimler").text("Resim Yok");
					}
				}
			});
			
			var tables = '<table class="tablolog" cellpadding="0" cellspacing="0"><tr><td>Kullanıcı</td><td>Yapılan İşlem</td><td>İşlem Tarihi</td></tr>';
			$.ajax({
				type : "post",
				url : "loglar.php",
				data : {"fis_hrk_id":fis_no,"islem":"al"},
				dataType : "json",
				success:function(r){
					$("#fis_duzenle_loglar .tablolog").remove();
					if(r.length - 1){
						for(var i=1;i<r.length;i++){
							tables = tables + '<tr><td>' + username(r[i].userid) + '</td><td>' + r[i].isid + '</td><td>' + r[i].sontarih + '</td></tr>';
						}
						$("<div>").appendTo("#fis_duzenle_loglar").html(tables);
					}
					else{
						$("<p>").appendTo("#fis_duzenle_loglar").text("Log Yok");
					}
				}
			});
		
			$("#form_fis_duzenle input[name=d_musteri]").val(musteri);
			$("#form_fis_duzenle input[name=d_tel]").val(tel);
			$("#form_fis_duzenle select[name=d_cihaz]").val(cihaz);
			$("#form_fis_duzenle select[name=d_aksesuar1]").val(aksesuar1);
			$("#form_fis_duzenle select[name=d_aksesuar2]").val(aksesuar2);
			$("#form_fis_duzenle select[name=d_aksesuar3]").val(aksesuar3);
			$("#form_fis_duzenle select[name=d_aksesuar4]").val(aksesuar4);
			$("#form_fis_duzenle input[name=d_marka]").val(marka);
			$("#form_fis_duzenle input[name=d_model]").val(model);
			$("#form_fis_duzenle input[name=fis_id]").val(fis_no);
			$("#form_fis_duzenle input[name=d_fiyat]").val(fiyat);
			$("#form_fis_duzenle input[name=d_tahsilat]").val(tahsilat);
			$("#form_fis_duzenle textarea[name=d_adres]").val(adres);
			$("#form_fis_duzenle textarea[name=d_servis]").val(servis);
			$("#form_fis_duzenle input[name=aktif_user_id]").val(aktif_user);
			$("#form_fis_duzenle textarea[name=d_aciklama]").val(aciklama);
			$("#form_fis_duzenle input[name=d_durum][value="+d_durum+"]").prop("checked",true);
			$("#form_fis_duzenle input[name=iade][value="+iade+"]").prop("checked",true);
			$("#fis_duzenle_baslik").html("Kayıt Düzenle / No: "+fis_no+" <span style='float:right;'>Ekleyen : "+username(user_id)+" / "+tarih+"</span>");
			$("#fis_duzenle_footer").append("<p style='float:right;'>Son İşlem : "+username(son_islem_yapan)+" / "+son_islem_tarih+"</p>");
			
			if(yetki!=0 && username(user_id,true)==0){
				/*alert("Admin mesajı");*/
				servis_pos = "yarim";
				$("#form_fis_duzenle input[name=d_musteri]").attr("disabled","disabled");
				$("#form_fis_duzenle input[name=d_tel]").attr("disabled","disabled");
				$("#form_fis_duzenle select[name=d_cihaz]").attr("disabled","disabled");
				$("#form_fis_duzenle select[name=d_aksesuar1]").attr("disabled","disabled");
				$("#form_fis_duzenle select[name=d_aksesuar2]").attr("disabled","disabled");
				$("#form_fis_duzenle select[name=d_aksesuar3]").attr("disabled","disabled");
				$("#form_fis_duzenle select[name=d_aksesuar4]").attr("disabled","disabled");
				$("#form_fis_duzenle input[name=d_model]").attr("disabled","disabled");
				$("#form_fis_duzenle textarea[name=d_adres]").attr("disabled","disabled");
				$("#form_fis_duzenle textarea[name=d_aciklama]").attr("disabled","disabled");
				/*$("#form_fis_duzenle input[name=d_fiyat]").val(fiyat);
				$("#form_fis_duzenle input[name=d_tahsilat]").val(tahsilat);
				$("#form_fis_duzenle textarea[name=d_servis]").val(servis);*/
			}
			else{
				servis_pos = "tam";
				$("input,select,textarea").removeAttr("disabled");
			}
			
			var durumlar=[false,true];
			$("textarea[name=d_servis]").attr("disabled",durumlar[d_durum]);
				if(d_durum == "1"){
					$("textarea[name=d_servis]").attr("disabled","disabled");
				}
				else{
					$("textarea[name=d_servis]").removeAttr("disabled");
				}
				
	});
	
	$("body").on("change","input[name=d_durum]",function(){
			if($(this).val()==1){
				$("textarea[name=d_servis]").attr("disabled","disabled");
			}
			else{
				$("textarea[name=d_servis]").removeAttr("disabled");
			}
	
	});
	
	$("button[name=fis_duzenle_kaydet]").click(function(){
		if(servis_pos == "tam"){
			if($.trim($("input[name=d_musteri]").val())=="" || $.trim($("input[name=d_tel]").val())=="" || $.trim($("textarea[name=d_aciklama]").val())==""){
				gonder = 0;
				alert("HATA : Zorunlu Alanları Boş Bırakmayın!");
			}
			
			else if($("input[name=d_durum]:checked").val()!="1" && $.trim($("textarea[name=d_servis]").val())==""){
				gonder = 0;
				alert("HATA : Servis Bilgisini Boş Bırakmayın!");
			}
			else{
				gonder = 1;
			}
		}
		else{
			if($("input[name=d_durum]:checked").val()!="1" && $.trim($("textarea[name=d_servis]").val())==""){
				gonder = 0;
				alert("HATA : Servis Bilgisini Boş Bırakmayın!");
			}
			else{
				gonder = 1;
			}
		}
		
			if(gonder == 1){
				gonder = 0;
				$("button[name=fis_duzenle_kaydet]").attr("disabled","disabled");
				$("#fis_duzenle_footer").append("<img src='png/loading.gif' height='20' width='20' border='0' style='float:left;margin:5px;'/><p>Kaydediliyor...</p>");
				$.ajax({
					type : "POST",
					url : "fis_duzenle.php",
					data : "servis_pos="+servis_pos+"&"+$("#form_fis_duzenle").serialize(),
					success:function(c){
						if(c=="ok"){
							gonder = 1;
							$("button[name=fis_duzenle_kaydet]").removeAttr("disabled");
							$("#golge").fadeOut(100);
							$("#fis_duzenle").fadeOut(200);
							$("#fis_duzenle_footer").html("");
							query(istek,sayfa);
						}
						else if(c=="bos"){
							alert("HATA : Zorunlu Alanları Boş Bırakmayın!");
						}
						else{
							alert("HATA OLUŞTU!");
						}
					},
					error:function(){
						alert("HATA OLUŞTU!");
					}
				});
			}
		
	});
	
	function sonuc_yaz(mesaj){
		$("button[name=kaydet]").removeAttr("disabled");
		$("#kayit_sonuc").html(mesaj);
		$("#kayit_sonuc" ).slideDown();
	};
	
	function resim_sonuc_yaz(e){
			var sayac=0; 
			var kod=e.split("",4);
			var mesaj=e.substring(4);
			
			for(var i=0;i<kod.length;i++){
				if(e[i]==1){
					sayac++;
				}	
			}
			if(sayac>0){
				for(var k=0;k<4;k++){
				$("input[sira="+k+"]").attr("disabled","disabled");
				}
			$("#yukle").attr("disabled","disabled");
			}
			return mesaj;
		}
	
	//Yükleme ekranını açar--------------------------------
			function yukleme_ekran(e){
				$("#yukleme_ekran").hide(1);
				if(e=="ac"){
					$("#yukleme_ekran").show(1);
				}
				else if(e=="kapat"){
					$("#yukleme_ekran").hide(1);
				}
		}
		
	//Yükleme ekranını açar--------------------------------
		
		function query(sorgu,page){
			istek=sorgu;
			sayfalama(0);
			sayfa=parseInt(page);
			yukleme_ekran("ac");
			var veri = "";
			if(sorgu == "ara"){
				veri = ara_query;
			}
			$("#kayit_yok").css("display","none");
			$.ajax({
			type:'POST',
			url:'fis_oku.php',
			data:"&query="+sorgu+"&sayfa="+page+"&"+veri,
			dataType:"json",
			success:function(cevap){
				excel_gonder = "istek="+sorgu+"&sayfa="+page+"&"+ara_query;
				yukleme_ekran("kapat");
				$("tr[name=sira]").remove();
				var data = cevap;
				if(data == 0){
					$("#kayit_yok").slideDown(200);
				}
				var toplam=data[data.length-1].toplam;				
				sayfalama(toplam);
				var fiyat_toplam=0;
				var tahsilat_toplam=0;
				for(var i=0;i<data.length-1;i++){
					fiyat_toplam+=parseInt(data[i].fiyat);
					tahsilat_toplam+=parseInt(data[i].tahsilat);
					$("tbody[name=data]").append(
					  "<tr name='sira' fis_id='"+data[i].fis_id+"' style='background-color:;'>"+
					  "<td>"+(i+1)+"</td>"+
					  "<td style='font-weight:bold;'>"+data[i].fis_id+"</td>"+
					  "<td>"+data[i].musteri+"</td>"+
					  "<td>"+data[i].tel+"</td>"+
					  "<td deger='"+data[i].cihaz+"' class='cihaz_resim' style='background-image: url(png/cihaz_"+data[i].cihaz+".png);'>"+cihaz[data[i].cihaz]+"</td>"+
					  "<td deger='"+data[i].aksesuar1+"' style='display:none;'>"+aksesuar1[data[i].aksesuar1]+"</td>"+
					  "<td deger='"+data[i].aksesuar2+"' style='display:none;'>"+aksesuar2[data[i].aksesuar2]+"</td>"+
					  "<td deger='"+data[i].aksesuar3+"' style='display:none;'>"+aksesuar3[data[i].aksesuar3]+"</td>"+
					  "<td deger='"+data[i].aksesuar4+"' style='display:none;'>"+aksesuar4[data[i].aksesuar4]+"</td>"+
					  "<td deger='"+data[i].iade+"' style='display:none;'>"+iade+"</td>"+
					  "<td>"+data[i].marka+"</td>"+
					  "<td>"+data[i].model+"</td>"+
					  "<td deger='"+data[i].durum+"' class='cihaz_resim' style='background-image: url(png/durum_"+data[i].durum+".png);'>"+durum[data[i].durum]+"</td>"+
					  "<td deger='"+data[i].fiyat+"'>"+data[i].fiyat+"<span class='tl'>TL</span></td>"+
					  "<td deger='"+data[i].tahsilat+"' style='background-color:"+arkaplan_renk(data[i].fiyat,data[i].tahsilat)+";'>"+data[i].tahsilat+"<span class='tl'>TL</span></td>"+
					  "<td sorttable_customkey='"+data[i].tarih_siralama+"'>"+data[i].kayit_tarihi+"</td>"+
					  "<td sorttable_customkey='"+data[i].tarih_siralama2+"'>"+data[i].teslimtarihi+"</td>"+
					  "<td>"+data[i].ariza+"</td>"+
					  "<td><span onclick='window.open(\"evrak_yazdir_.php?id="+data[i].fis_id+"\",\"_blank\")' name='evrakyazdir2' title='Müşteri Evrağı Yazdır' style='background-image:url(png/musterii.png);' class='islem'></span><span onclick='window.open(\"evrak_yazdir.php?id="+data[i].fis_id+"\",\"_blank\")' name='evrakyazdir' title='Evrak Yazdır' style='background-image:url(png/klavye.png);' class='islem'></span><span name='edit' fis_id='"+data[i].fis_id+"' title='Düzenle' style='background-image:url(png/edit.png);' class='islem'></span><span name='sil' fis_id='"+data[i].fis_id+"' title='Sil' style='display:"+sil_goster("block","none")+";background-image:url(png/delete.png);' class='islem'></span></td>"+
					  "<input type='hidden' name='servis' value='"+data[i].servis+"'/>"+
					  "<input type='hidden' name='adres' value='"+data[i].adres+"'/>"+
					  "<input type='hidden' name='user_id' value='"+data[i].user_id+"'/>"+
					  "<input type='hidden' name='son_islem_tarih' value='"+data[i].son_islem_tarih+"'/>"+
					  "<input type='hidden' name='son_islem_yapan' value='"+data[i].son_islem_yapan+"'/>"+
					  "</tr>"
					);
				}
				fiyat_toplam_yaz(fiyat_toplam,tahsilat_toplam);
			},
			error:function(){
				yukleme_ekran("kapat");
				alert("HATA OLUŞTU!\nLÜTFEN TEKRAR DENEYİN");	
			}
			});
		}
		
		$("body").on("click","li[name=sayfa]",function(){
			if($(this).attr("komut")=="ilk"){
			  	query(istek,1);
			}
			else if($(this).attr("komut")=="onceki"){
			  	query(istek,sayfa-1);
			}
			else if($(this).attr("komut")=="son"){
			  	query(istek,toplam_sayfa);
			}
			else if($(this).attr("komut")=="sonraki"){
			  	query(istek,sayfa+1);
			}
			else{
			if(sayfa!=$(this).text()){
				query(istek,$(this).text());
			}
			}
		});
		
	//-------------------------------------------------------	
		query(istek,sayfa);
		
		$("body").on("click","#rapor_ekran > h2 > i",function(){
			rapor_ekran("kapat");			
		});
		
		function rapor_ekran(par){
			if(par == "ac"){
				$("#golge").fadeIn(100);
				$("#rapor_ekran").fadeIn(100);
			}
			else{
				$("#golge").fadeOut(100);
				$("#rapor_ekran").fadeOut(100);
			}
		}
		
		$("input[name=rapor_tarih]").click(function(){
		if($(this).is(":checked")){
			$("input[name=rapor_tarih_bas],input[name=rapor_tarih_bit]").removeAttr("disabled");
		}
		else{
			$("input[name=rapor_tarih_bas],input[name=rapor_tarih_bit]").attr("disabled","disabled");
		}
	});
		
	//-------------------------------------------------------
		
		function arkaplan_renk(fiyat,tahsilat){
			var renk="";
			fiyat = parseInt(fiyat);
			tahsilat = parseInt(tahsilat);
			if(fiyat>tahsilat){ renk="#FFB0B0"; }
			else if(fiyat<=tahsilat){ renk="#AFA"; }
			if(fiyat==0 && tahsilat==0) { renk=""; }
			return renk;
		}
		
		function sil_goster(e,h){
			if(yetki==0){
			   return e;
			}
			else{
			   return h;	
			}
		}
	//oturum kontrol --------------------------------------------
		function oturum_kontrol(){
			$.ajax({
			type:'POST',
			url:'oturum_kontrol.php',
			data:"bos=bos",
			success:function(cevap){
				if(cevap=="0"){
				   self.location="login.php";	
				}
			}
			});
		}
	//oturum kontrol --------------------------------------------
	
	//oturum kontrol otomatik-------------------------------
		function oturum_kontrol_otomatik(){
			$.ajax({
			type:'POST',
			url:'oturum_kontrol_otomatik.php',
			data:"bos=bos",
			success:function(cevap){
				if(cevap=="0"){
				   self.location="login.php";	
				}
			}
			});
		}
	//oturum kontrol otomatik---------------------------------
		
		function sayfalama(toplam){
			$("li[name=sayfa]").remove();
			var sayfa_sayisi=Math.ceil(toplam/gosterim);
			toplam_sayfa=sayfa_sayisi;
			if(sayfa>1){
				$("#tablo_sonuc ul").append("<li title='İlk' name='sayfa' komut='ilk'><<</li>");	
				$("#tablo_sonuc ul").append("<li title='Önceki' name='sayfa' komut='onceki'><</li>");	
			}
			var basla=sayfa - gorunen;
			var bitis=(sayfa+gorunen)+1;
			
			for(var i=basla;i<bitis;i++){
				if(i>0 && i<=sayfa_sayisi){
					if(i==sayfa){
						$("#tablo_sonuc ul").append("<li name='sayfa' style='background-color:white;'>"+i+"</li>");	
					}
					else{
						$("#tablo_sonuc ul").append("<li name='sayfa'>"+i+"</li>");
					}
				}
			}
			
			if(sayfa!=sayfa_sayisi){
				$("#tablo_sonuc ul").append("<li title='Sayfa "+sayfa_sayisi+"' name='sayfa' komut='son'>>></li>");	
				$("#tablo_sonuc ul").append("<li title='Sonraki' name='sayfa' komut='sonraki'>></li>");	
			}
			
			if( toplam == 0){
				$("#tablo_sonuc ul").css("display","none");
			}
			else{
				$("#tablo_sonuc ul").css("display","block");
			}
		}
		
	//fiyat toplam yaz----------------------------------------
		function fiyat_toplam_yaz(fiyat,tahsilat){
			$("#f_toplam").number(fiyat).html($("#f_toplam").html()+"<span style='font-size:12px;'> TL</span>");
			$("#t_toplam").number(tahsilat).html($("#t_toplam").html()+"<span style='font-size:12px;'> TL</span>");
			if(fiyat>tahsilat){
				$("#t_toplam").css("color","#D90000");
			}
			else if(fiyat<tahsilat){
				$("#t_toplam").css("color","green");
			}
			if(fiyat==0 && tahsilat==0){
				$("#t_toplam").css("color","#666");
			}
		}
		
		setInterval(oturum_kontrol_otomatik,45000);
		
		
}); 