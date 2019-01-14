<?php  
	if(isset($_SESSION['user']) && $_SESSION['user'] != '') {
				$id = $_GET['id'];
				$query = $db->prepare("DELETE FROM tarif WHERE uye_id = '{$_SESSION['user_id']}' AND tarif_id = '{$id}' ");
				$res = $query->execute();

				if($res) {
					header("Location:/web/?page=tariflerim");
				} else {
					echo "hata";
				}

				
	}
?>