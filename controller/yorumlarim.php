<?php  
	if(isset($_SESSION['user']) && $_SESSION['user'] != '') {
				
				//EKLENEN YORUMLARI ÇEKME

				$query = $db->prepare("SELECT * FROM yorum WHERE yorumcu_id = '{$_SESSION['user_id']}' ");
				$query->execute();
				$fetch = $query->fetchAll(PDO::FETCH_ASSOC);
				/*print_r($fetch);*/	
		
	
	}
?>