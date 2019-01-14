<?php
	session_start();

	# error
	error_reporting(0);


	# db
	$db = new PDO("mysql:host=localhost;dbname=deneme", "root", "");
	$db->exec("SET CHARSET utf8");

	if ($_POST['fav']) {
				if(isset($_SESSION['user']) && $_SESSION['user'] != '') {
				$id = $_POST['id'];

				$query7 = $db->prepare("SELECT * FROM favori WHERE tarif_id =  '{$id}' AND id = '{$_SESSION['user_id']}' ");
				$query7->execute();
			    //$fetch7 = $query7->fetch(PDO::FETCH_ASSOC);
				$row = $query7->rowCount();
				
				if ($row > 0) {
					echo "Tarif zaten favorilere eklenmiş.";
				}else{
					$query8 = $db->prepare("INSERT INTO favori(tarif_id,id) VALUES ('{$id}' , '{$_SESSION['user_id']}') ");
					$sonuc= $query8->execute();
					if ($sonuc) {
						echo "Eklendi";
					}else{
						echo "Hata";
					}
				}
			}else{
				echo "Giriş yap";
			}
	}

	
?>