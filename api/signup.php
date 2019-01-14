<?php
	session_start();

	# error
	error_reporting(0);


	# db
	$db = new PDO("mysql:host=localhost;dbname=deneme", "root", "");
	$db->exec("SET CHARSET utf8");


	if($_POST) {
				$isim = $_POST['ad'];
				$soyad = $_POST['sa'];
				$user = $_POST['ka'];
				$pass = $_POST['sfr'];
				$mail = $_POST['mail'];

				$userQuery = $db->prepare("SELECT * FROM kullanici WHERE k_adi = '{$user}' ");
				$userQuery->execute();
				$rowUser = $userQuery->rowCount();
				$fetchUser = $userQuery->fetch(PDO::FETCH_ASSOC);


				$mailQuery = $db->prepare("SELECT * FROM kullanici WHERE k_mail = '{$mail}' ");
				$mailQuery->execute();
				$rowMail = $mailQuery->rowCount();
				$fetchMail = $mailQuery->fetch(PDO::FETCH_ASSOC);

				if ($rowUser > 0) {
					echo "Kullanıcı adı daha önce alınmış";
				}elseif ($rowMail > 0) {
					echo "Bu mail adresiyle daha önce kayıt olunmuş";
				}elseif ($user == "" || $pass == "" || $mail == "") {
					echo "Tüm alanların doldurulması gerekli";
				}else{
					$query = $db->prepare("INSERT INTO kullanici(k_isim,k_soy,k_adi,k_mail,k_sifre) VALUES ('{$isim}','{$soyad}','{$user}','{$mail}','{$pass}') ");
					$r = $query->execute();
					
					if($r) {
						echo "Kayıt başarılı!";
						
					} else {
						echo "Hata";
					}			
				}
				
		}


?>