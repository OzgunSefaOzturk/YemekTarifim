<?php 
	
	$query = $db->prepare("SELECT * , AVG(puan.puan) as ortalama FROM puan INNER JOIN tarif ON puan.tarif_id = tarif.tarif_id GROUP BY puan.tarif_id ORDER BY ortalama DESC ");
	$query->execute();
	$fetch = $query->fetchAll(PDO::FETCH_ASSOC);
	/*print_r($fetch);*/


?>