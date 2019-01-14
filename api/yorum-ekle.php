<?php
	session_start();

	# error
	error_reporting(0);


	# db
	$db = new PDO("mysql:host=localhost;dbname=deneme", "root", "");
	$db->exec("SET CHARSET utf8");


	if($_POST['yorum-ekle']){

				$yorum = trim($_POST['yorum']);
				$id = $_POST['id'];
				if($yorum == '') {
					echo  "Yorum boş olamaz";
				} else {
					$query3 = $db->prepare("INSERT INTO yorum (yorum, tarif_id,yorumcu_id) VALUES ('{$yorum}', '{$id}','{$_SESSION['user_id']}')");
					$yorum_ekle = $query3->execute();

					if ($yorum_ekle) {
						echo  "Yorumunuz gönderildi.";
					}else{
						echo "Yorum gönderilemedi";
					}
				}
			}
		


?>