<?php
	session_start();

	# error
	error_reporting(0);


	# db
	$db = new PDO("mysql:host=localhost;dbname=deneme", "root", "");
	$db->exec("SET CHARSET utf8");


	if ($_POST['yeniTarif']) {			
			$tarifAd = $_POST['tarif'];
			$tarif = $_POST['ekle'];			
			$kategori = $_POST['Kategori'];


			if ($tarif == '' || $tarifAd == '') {
				echo "Tüm alanları doldurun";
			}else{
		
				$query = $db->prepare("INSERT INTO tarif(tarif_adi,tarif,tarif_sef,uye_id,kategori_id) VALUES ('{$tarifAd}','{$tarif}','{$tarifAd}','{$_SESSION['user_id']}','{$kategori}') ");
				$a = $query->execute();

				if ($a) {
				echo "Tarifiniz Eklendi";
				}else{
					echo "Tarifiniz eklenemedi";
		        }  	

		    }
	      } 

	       


?>