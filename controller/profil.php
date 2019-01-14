<?php 
	
	if(isset($_SESSION['user']) && $_SESSION['user'] != ''){

		$query = $db->prepare("SELECT k_isim,k_soy,k_adi,k_mail FROM kullanici WHERE id = '{$_SESSION['user_id']}' ");
		$query->execute();
		$fetch = $query->fetch(PDO::FETCH_ASSOC);
		


	}

?>