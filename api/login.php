<?php
	session_start();

	# error
	error_reporting(0);


	# db
	$db = new PDO("mysql:host=localhost;dbname=deneme", "root", "");
	$db->exec("SET CHARSET utf8");

	 	
		if($_POST) {
			$user = $_POST['ka'] ;
			$pass = $_POST['sfr'] ;

			if ($user == "" && $pass == "") {
				echo "Kullanıcı adı ve şifre alanı boş olamaz";				
			}elseif ($user == "") {
				echo "Kullanıcı adı boş olamaz";
			}elseif ($pass == "") {			
				echo "Şifre boş olamaz";
			}else{
			

			$query = $db->prepare("SELECT * FROM kullanici WHERE k_adi = '{$user}' AND k_sifre = '{$pass}'");
			$query->execute();
			$row = $query->rowCount();
			$fetch = $query->fetch(PDO::FETCH_ASSOC);


			if($row > 0) {
				$_SESSION['user'] = $fetch['k_adi'];
				$_SESSION['user_id'] = $fetch['id'];

				echo "giriş yapıldı";
			}else {
				echo "hatalı kullanıcı adı veya şifre";
				
			}
		  }	
		}
	
?>
