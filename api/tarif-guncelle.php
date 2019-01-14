<?php
	session_start();

	# error
	error_reporting(0);


	# db
	$db = new PDO("mysql:host=localhost;dbname=deneme", "root", "");
	$db->exec("SET CHARSET utf8");
	

	$id = $_POST['id'];

	$query = $db->prepare("SELECT * FROM tarif WHERE tarif_id = '{$id}' ");
	$query->execute();
	$fetch = $query->fetch(PDO::FETCH_ASSOC);

	if ($_POST['gunceltarif']) {
		
		$tarifAdi = $_POST['tarif'];
		$tarif = $_POST['ekle'];

		$query2 = $db->prepare("UPDATE tarif SET tarif_id = '{$id}' ,tarif_adi ='{$tarifAdi}' ,tarif_sef='{$tarifAdi}',tarif='{$tarif}' WHERE tarif_id = '{$id}' ");
		$query2->execute();	
		echo "Tarif düzenlendi";
	}



?>