<?php
	session_start();

	# error
	error_reporting(0);


	# db
	$db = new PDO("mysql:host=localhost;dbname=deneme", "root", "");
	$db->exec("SET CHARSET utf8");
	

	if ($_POST['oyla']) {
			$id = $_POST['id'];
			$query6 = $db->prepare("SELECT * , AVG(puan) as ortalama FROM puan WHERE tarif_id = '{$id}' GROUP BY tarif_id ");
				$query6->execute();
				$fetch6 = $query6->fetch(PDO::FETCH_ASSOC);

				echo json_encode($fetch6);
}

?>