<?php
	session_start();

	# error
	error_reporting(0);


	# db
	$db = new PDO("mysql:host=localhost;dbname=deneme", "root", "");
	$db->exec("SET CHARSET utf8");
	

	$query = $db->prepare("SELECT * FROM kategori ");
	$query->execute();
	$fetch = $query->fetchAll(PDO::FETCH_ASSOC);
	

	echo json_encode($fetch);


?>