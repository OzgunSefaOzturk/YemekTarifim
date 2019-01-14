<?php 
	
	if ($_POST['sikayet-ekle']) {
		if(isset($_SESSION['user']) && $_SESSION['user'] != '') {
			
			$sikayet = trim($_POST['sikayet']);
			$baslik = trim($_POST['s_baslik']);

			if ($sikayet == '') {
				$ret = "Şikayet/Öneri alanı boş olamaz";
			}else if ($baslik == ''){

				$ret = "Şikayet/öneri başlığı boş olamaz";

			}else{

				$query = $db->prepare("INSERT INTO sikayet_oneri(sikayet, sikayetci_id,sikayet_baslik) VALUES ('{$sikayet}' , '{$_SESSION['user_id']}' , '{$baslik}') ");
				$query->execute();

				$ret =  "Şikayet/Öneriniz alındı teşekkürler.";
			}
		}else{
			
			$ret = "Şikayet ya da öneride bulunmak için giriş yapmanız gerekli. <br/> Giriş yapmak için <a href='/web/?page=login'>tıkla</a>";
		}
	}
?>