<?php 
	
	$query = $db->prepare("SELECT * FROM kategori ");
	$query->execute();
	$fetch = $query->fetchAll(PDO::FETCH_ASSOC);
	
	

?>