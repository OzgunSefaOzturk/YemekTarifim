<?php 

	$t_id = $_GET['id'];

	$query = $db->prepare("SELECT * FROM tartisma WHERE tartisma_id = '{$t_id}' ");
	$query->execute();
	$fetch = $query->fetch(PDO::FETCH_ASSOC);
	
	


	
	
	if ($_POST['yolla']) {
		if(isset($_SESSION['user']) && $_SESSION['user'] != '') {
		
		$konu = $_POST['konu'];
		if ($konu != '') {
			
			$query3 = $db->prepare("INSERT INTO tartisma_detay(tartisma_yorum,tartismaci_id,tartisma_id) VALUES ('{$konu}', '{$_SESSION['user_id']}', '{$t_id}') ");
			$query3->execute();
		}else{
			$ret = "Bu alan boş olamaz" ;
		}

		


	}else{
		$ret2 = "Giriş yapmadan yorum yollayamazsınız<br/> Giriş yapmak için <a href='/web/?page=login'>tıkla</a>" ;
	}

}
		$query2 = $db->prepare("SELECT * FROM tartisma_detay INNER JOIN kullanici ON tartisma_detay.tartismaci_id = kullanici.id AND tartisma_detay.tartisma_id = '{$t_id}' ");
		$query2->execute();
		$fetch2 = $query2->fetchAll(PDO::FETCH_ASSOC);


?>