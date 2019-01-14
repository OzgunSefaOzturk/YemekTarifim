<?php
	session_start();

	# error
	error_reporting(0);


	# db
	$db = new PDO("mysql:host=localhost;dbname=deneme", "root", "");
	$db->exec("SET CHARSET utf8");


	$query = $db->prepare("SELECT * , AVG(puan.puan) as ortalama FROM puan INNER JOIN tarif ON puan.tarif_id = tarif.tarif_id GROUP BY puan.tarif_id ORDER BY ortalama DESC ");
	$query->execute();
	$fetch = $query->fetchAll(PDO::FETCH_ASSOC);
	
	
	echo json_encode($fetch);



?>