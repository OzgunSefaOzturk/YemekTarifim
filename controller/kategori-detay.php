<?php 
	$id  = $_GET['id'];
	$order  = $_GET['order'];

	if ($order == 'puan-asc') {
		$o = 'opuan ASC';
	}else if($order == 'puan-desc'){
		$o = 'opuan DESC';
	} else {
		$o = 'opuan DESC';
	}


	$query = $db->prepare("SELECT *, AVG(puan.puan) as opuan FROM tarif INNER JOIN kategori LEFT JOIN puan ON puan.tarif_id = tarif.tarif_id WHERE tarif.kategori_id = kategori.kategori_id AND kategori.kategori_id = '{$id}' GROUP BY tarif.tarif_id ORDER BY {$o}");
	$query->execute();
	$fetch = $query->fetchAll(PDO::FETCH_ASSOC);
?>