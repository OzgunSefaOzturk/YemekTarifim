<?php
	session_start();

	# error
	error_reporting(0);


	# db
	$db = new PDO("mysql:host=localhost;dbname=deneme", "root", "");
	$db->exec("SET CHARSET utf8");


	if ($_POST['sikayet-ekle']) {
		
			
			$sikayet = trim($_POST['sikayet']);

			if ($sikayet == '') {
				echo "Şikayet/Öneri alanı boş olamaz";
			}else{

				$query = $db->prepare("INSERT INTO sikayet_oneri(sikayet, sikayetci_id) VALUES ('{$sikayet}' , '{$_SESSION['user_id']}') ");
				$query->execute();

				echo "Şikayet/Öneriniz alındı teşekkürler.";
			}
		}
	


?>