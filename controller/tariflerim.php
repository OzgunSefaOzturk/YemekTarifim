<?php  
	if(isset($_SESSION['user']) && $_SESSION['user'] != '') {
				
				//EKLENEN TARİFLERİ ÇEKME
				$query = $db->prepare("SELECT * FROM tarif WHERE uye_id = '{$_SESSION['user_id']}' ");
				$query->execute();
				$fetch = $query->fetchAll(PDO::FETCH_ASSOC);
	
	}
?>