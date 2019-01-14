<?php 
	
	$id = $_GET['id'];

	if($_POST) {
		if(isset($_SESSION['user']) && $_SESSION['user'] != '') {
			$tarifAdi = $_POST['tarif'];
			$tarif 	  = $_POST['ekle'];

			$query2   = $db->prepare("UPDATE tarif SET tarif_id = '{$id}', tarif_adi = '{$tarifAdi}', tarif_sef = '{$tarifAdi}', tarif = '{$tarif}' WHERE tarif_id = '{$id}'");
			$query2->execute();
		}

		/* upload image */
		if($_FILES['resim']['name'] != '') {
			$exp  = explode(".", $_FILES['resim']['name']);
			$ext  = end($exp);
			$name = time(). '_image.'. $ext;
			$dir  = $_SERVER['DOCUMENT_ROOT']. "/web/image/". $name; 

			if(move_uploaded_file($_FILES['resim']['tmp_name'], $dir)) {
				$query3 = $db->prepare("UPDATE tarif SET tarif_resim = '{$name}' WHERE tarif_id = '{$id}'");
				$query3->execute();
			}
		}
	}

	/* kategoriler */
	$query2 = $db->prepare("SELECT * FROM kategori ");
	$query2->execute();
	$fetch2 = $query2->fetchAll(PDO::FETCH_ASSOC);

	/* tarif detay */
	$query = $db->prepare("SELECT * FROM tarif WHERE tarif_id = '{$id}' ");
	$query->execute();
	$fetch = $query->fetch(PDO::FETCH_ASSOC);

?>