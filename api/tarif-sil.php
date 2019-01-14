<?php
	session_start();

	# error
	error_reporting(0);


	# db
	$db = new PDO("mysql:host=localhost;dbname=deneme", "root", "");
	$db->exec("SET CHARSET utf8");

	#
	if($_POST['id']) {
		$id    = $_POST['id'];
		$query = $db->prepare("DELETE FROM tarif WHERE tarif_id = '{$id}'");
		$result = $query->execute();
		
		if($result) {
			echo "OK";
		} else {
			echo "ERROR";
		}
	}
?>