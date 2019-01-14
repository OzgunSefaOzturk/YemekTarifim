<?php
	if ($_POST['yeniTarif']) {
		if(isset($_SESSION['user']) && $_SESSION['user'] != '') {			
			$tarif = htmlspecialchars(addslashes($_POST['ekle']));
			$tarifAd = addslashes($_POST['tarif']);
			$kategori = $_POST['Kategori'];
			$malzeme = addslashes($_POST['malzeme']);


			if ($tarif == '' || $tarifAd == '') {
				$ret = "Tüm alanları doldurun";
			}else{
				/* upload image */
				if($_FILES['resim']['name'] != '') {
					$exp  = explode(".", $_FILES['resim']['name']);
					$ext  = end($exp);
					$name = time(). '_image.'. $ext;
					$dir  = $_SERVER['DOCUMENT_ROOT']. "/web/image/". $name; 

					if(move_uploaded_file($_FILES['resim']['tmp_name'], $dir)) {
						$query = $db->prepare("INSERT INTO tarif(tarif_adi,tarif,tarif_malzeme,tarif_sef,uye_id,kategori_id, tarif_resim) VALUES ('{$tarifAd}','{$tarif}','{$malzeme}','{$tarifAd}','{$_SESSION['user_id']}','{$kategori}', '{$name}') ");
						$a = $query->execute();
						

						if ($a) {
							$ret = "Tarifiniz Eklendi";
						}else{
							$ret =  "Tarifiniz eklenemedi";
				        }  
					} else {
						$ret = "Resim yüklenirken bir hata oluştu";
					}
				}	

		    }
	       }  else{
				   $ret =  "Giriş yapmadan tarif ekleyemezsiniz.<br/> Giriş yapmak için <a href='/web/?page=login'>tıkla</a>";
		
	          }

	       }

	        $query2 = $db->prepare("SELECT * FROM kategori ");
			$query2->execute();
			$fetch2 = $query2->fetchAll(PDO::FETCH_ASSOC); 
?>
