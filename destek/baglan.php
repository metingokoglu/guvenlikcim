<?php
						$kurulum_ok = 1;
						function baglan(){
						//sadece bu bilgiler değştirilecek
						$sunucu = "localhost";
						$kullanici_adi = "guvenli3_metin";
						$sifre = "Metin_2272609";
						$veritabani = "guvenli3_borgatec";
						//-----------------------------------------------
						$baglanti = "mysql:host=".$sunucu.";dbname=".$veritabani.";charset=utf8";
						try{ $db = new PDO($baglanti,$kullanici_adi,$sifre);
							 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							 $db->setAttribute(PDO::ATTR_PERSISTENT, true);
						}
						catch(PDOException $h){die($h->getMessage());}
						return $db;
						}
					?>