<?php
	if($_POST){
		$searchValue = $_POST['search'];

	
		$query = $db->prepare("SELECT * FROM tarif WHERE tarif_adi LIKE '%{$searchValue}%' ");
		$query->execute();
		$fetch = $query->fetchAll(PDO::FETCH_ASSOC);
		

    }
?>