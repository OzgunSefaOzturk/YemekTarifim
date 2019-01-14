<?php
	session_start();

	# error
	error_reporting(0);


	# db
	$db = new PDO("mysql:host=localhost;dbname=deneme", "root", "");
	$db->exec("SET CHARSET utf8");

	#yorum çek
	if ($_POST['id']); {
		$id    = $_POST['id'];
		$query2 = $db->prepare("SELECT * FROM yorum INNER JOIN kullanici ON yorum.yorumcu_id = kullanici.id AND yorum.tarif_id = '{$id}'");
			$query2->execute();
			$fetch2 = $query2->fetchAll(PDO::FETCH_ASSOC);
			
			echo json_encode($fetch2);
	}

?>