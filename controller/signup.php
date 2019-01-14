<?php
	if(isset($_SESSION['user']) && $_SESSION['user'] != ''){
		echo "Zaten giriş yapılmış. <a href='/web/logout.php'>Çıkış</a>";
	}else{
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
				$ret = "Kullanıcı adı daha önce alınmış";
			}elseif ($rowMail > 0) {
				$ret = "Bu mail adresiyle daha önce kayıt olunmuş";
			}elseif ($user == "" || $pass == "" || $mail == "") {
				$ret = "Tüm alanların doldurulması gerekli";
			}else{
				$query = $db->prepare("INSERT INTO kullanici(k_isim,k_soy,k_adi,k_mail,k_sifre) VALUES ('{$isim}','{$soyad}','{$user}','{$mail}','{$pass}') ");
				$r = $query->execute();
				echo "INSERT INTO kullanici(k_isim,k_soy,k_adi,k_mail,k_sifre) VALUES ('{$isim}','{$soyad}','{$user}','{$mail}','{$pass}') ";
				
				if($r) {
					$ret = "Kayıt başarılı! <a href='/web/?page=login'>Giriş</a>";
					/*header("Location:/web/?page=login");*/
				} else {
					$ret = "Hata";
				}			
			}
			
	}
}

?>