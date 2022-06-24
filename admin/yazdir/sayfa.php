<?php
session_start();
include 'baglan.php'

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Çıktı Sayfası</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form">
				 <?php 
				 $id=$_GET['id'];
                                                              $sql =mysqli_query($con,"select * from musteri_bilgisi where musteri_id='$id'");

                                                              while ($veri=mysqli_fetch_assoc($sql)) {
                                                            ?>
				<span class="contact100-form-title">
					<span style="float:left;"><img widht="50px" height="70px" src="images/logo1.png"></span>
				
					<span style="float: right; font-size:16px; font-family: arial; margin-top: 20px;">Tarih : <input type="date" name="name" value="<?php echo $veri['tarih']; ?>" disabled></span>
				</span>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Please Type Your Name">
					<span class="label-input100">Ad ve Soyad</span>
					<input class="input100" type="text" name="name" value="<?php echo $veri['musteri_adi']; ?>" disabled>
				</div>

			<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Please Type Your Name">
					<span class="label-input100">Telefon</span>
					<input class="input100" type="text" name="name" value="<?php echo $veri['telefon']; ?>" disabled>
				</div>


			

				<div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Please Type Your Message">
					<span class="label-input100">Adres</span>
					<textarea class="input100" name="message" style="resize: none; min-height: 70px;" disabled><?php echo $veri['adres']; ?></textarea>
				</div>

				<div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Please Type Your Message">
					<span class="label-input100">Ürün Bilgisi</span>
					<textarea class="input100" name="message" style="resize: none;" disabled>Sistem : <?php echo $veri['sistem']; ?>

Marka  : <?php echo $veri['marka']; ?>

Model  : <?php echo $veri['model']; ?>

Hdd      : <?php echo $veri['hdd']; ?>
					</textarea>
				</div>
				<div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Please Type Your Message">
					<span class="label-input100">Numara Bilgisi</span>
					<textarea class="input100" name="message" style="resize: none; min-height: 90px;" disabled>Sn Bilgisi       : <?php echo $veri['sn_bilgisi']; ?>

Ip Bilgisi        : <?php echo $veri['ip_bilgisi']; ?>

Port Bilgisi    : <?php echo $veri['port_bilgisi']; ?>
					</textarea>
				</div>
				
				<div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Please Type Your Message">
					<span class="label-input100">Kullanıcı Bilgisi </span>
					<textarea class="input100" name="message" style="resize: none; min-height: 100px;" disabled><?php if ($veri['user1'] != ":") { echo "Kullanıcı1   :  ".$veri['user1'];} ?> <?php if ($veri['user2'] != ":") { echo "    &&   Kullanıcı2   :   ".$veri['user2'];} ?>

<?php if ($veri['user3'] != ":") { echo "Kullanıcı3  :   ".$veri['user3'];} ?> <?php if ($veri['user4'] != ":") { echo "      &&   Kullanıcı4   :   ".$veri['user4'];} ?>

<?php if ($veri['user5'] != ":") { echo "Kullanıcı5  :   ".$veri['user5'];} ?><?php if ($veri['user6'] != ":") { echo "      &&   Kullanıcı6   :   ".$veri['user6'];} ?>

					</textarea>
				</div>
				<div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Please Type Your Message">
					<span class="label-input100">Açıklama</span>
					<textarea class="input100" name="message" style="resize: none; min-height: 90px;" disabled><?php echo $veri['aciklama']; ?></textarea>
				</div>
				<span class="contact100-form-title">
					<div style="float:left; margin-left: 45px;">
					<span style="font-size:14px;">Teslim Alan </span><br>
					<span style="float:left; font-size:14px; margin-left:10px; font-family: arial; "><center>Ad - Soyad<br>İMZA :</center></span>
					</div>
					<div style="float:right; margin-right: 45px;">
					<span style="font-size:14px;">Teslim Eden </span><br>
					<span style="float:left; font-size:14px; margin-left:10px; font-family: arial; "><center>Ad - Soyad<br>İMZA :</center></span>
					</div>
					
				</span>
					
			<?php } ?>
			</form>
		</div>
	</div>



<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});


			$(".js-select2").each(function(){
				$(this).on('select2:close', function (e){
					if($(this).val() == "Please chooses") {
						$('.js-show-service').slideUp();
					}
					else {
						$('.js-show-service').slideUp();
						$('.js-show-service').slideDown();
					}
				});
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="vendor/noui/nouislider.min.js"></script>
	<script>
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 1500, 3900 ],
	        connect: true,
	        range: {
	            'min': 1500,
	            'max': 7500
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]);
	        $('.contact100-form-range-value input[name="from-value"]').val($('#value-lower').html());
	        $('.contact100-form-range-value input[name="to-value"]').val($('#value-upper').html());
	    });
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
