<?php
	session_start();

	# error
	error_reporting(0);


	# db
	$db = new PDO("mysql:host=localhost;dbname=deneme", "root", "");
	$db->exec("SET CHARSET utf8");

	#tarif çekme
	if($_POST['id']) {
		$id    = $_POST['id'];
		$query = $db->prepare("SELECT * FROM tarif WHERE tarif_id = '{$id}'");
		$query->execute();
		$fetch = $query->fetch(PDO::FETCH_ASSOC);

		echo json_encode($fetch);
	}

	
?>