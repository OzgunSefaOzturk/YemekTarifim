<?php
	session_start();

	# error
	error_reporting(0);


	# db
	$db = new PDO("mysql:host=localhost;dbname=deneme", "root", "");
	$db->exec("SET CHARSET utf8");

	#arama yapma

	if($_POST){
		$searchValue = $_POST['search'];
	
		$query = $db->prepare("SELECT * FROM tarif WHERE tarif_adi LIKE '%{$searchValue}%' ");
		$query->execute();
		$fetch = $query->fetchAll(PDO::FETCH_ASSOC);

		echo json_encode($fetch);
    }
?>