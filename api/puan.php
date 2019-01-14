<?php
	session_start();

	# error
	error_reporting(0);


	# db
	$db = new PDO("mysql:host=localhost;dbname=deneme", "root", "");
	$db->exec("SET CHARSET utf8");
	

	if ($_POST['oyla']) {
				
				$puan = $_POST['puan'];
				$id = $_POST['id'];

				$query5 = $db->prepare("INSERT INTO puan(puan,tarif_id) VALUES ('{$puan}', '{$id}') ");
				$sonuc = $query5->execute();

				if ($sonuc) {
					$query6 = $db->prepare("SELECT * , AVG(puan) as ortalama FROM puan WHERE tarif_id = '{$id}' GROUP BY tarif_id ");
					$query6->execute();
					$fetch6 = $query6->fetch(PDO::FETCH_ASSOC);

					echo json_encode($fetch6);
				}else{
					echo "error";
				}
	}
?>