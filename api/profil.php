<?php
	session_start();

	# error
	error_reporting(0);


	# db
	$db = new PDO("mysql:host=localhost;dbname=deneme", "root", "");
	$db->exec("SET CHARSET utf8");

	#profil çekme

	$query = $db->prepare("SELECT k_isim,k_soy,k_adi,k_mail FROM kullanici WHERE id = '{$_SESSION['user_id']}' ");
		$query->execute();
		$fetch = $query->fetch(PDO::FETCH_ASSOC);

		echo json_encode($fetch);

?>