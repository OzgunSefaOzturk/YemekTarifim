<?php 

		/* TARİF ÇEKME */

			$id = $_GET['id'];

			$query = $db->prepare("SELECT * FROM tarif WHERE tarif_id = '{$id}'");
			$query->execute();
			$fetch = $query->fetchAll(PDO::FETCH_ASSOC);
			$fetch = $fetch[0];


		
	
		
		/*PUAN HESABI*/

			if ($_POST['oyla']) {
				if(isset($_SESSION['user']) && $_SESSION['user'] != '') {
				
				$puan = $_POST['puan'];

				$query5 = $db->prepare("INSERT INTO puan(puan,tarif_id) VALUES ('{$puan}', '{$id}') ");
				$query5->execute();

			}else{
				echo "Giriş yapmadan puan veremezsiniz.";
				echo "Giriş yapmak için <a href='/web/?page=login'>tıkla</a>";
			}
		}
				$query6 = $db->prepare("SELECT * , AVG(puan) as ortalama FROM puan WHERE tarif_id = '{$id}' GROUP BY tarif_id ");
				$query6->execute();
				$fetch6 = $query6->fetch(PDO::FETCH_ASSOC);
   

		//FAVORİLERE EKLEME

			
	

		/* YORUM EKLEME */

			if($_POST['yorum-ekle']){
				if(isset($_SESSION['user']) && $_SESSION['user'] != '') {

				$yorum = trim($_POST['yorum']);

				if($yorum == '') {
					$ret =  "Yorum boş olamaz";
				} else {
					$query3 = $db->prepare("INSERT INTO yorum (yorum, tarif_id,yorumcu_id) VALUES ('{$yorum}', '{$id}','{$_SESSION['user_id']}')");
					$yorum_ekle = $query3->execute();

					if ($yorum_ekle) {
						$ret =  "Yorumunuz gönderildi.";
					}else{
						$ret = "Yorum gönderilemedi";
					}
				}
			}else{
				$ret = "Yorum yapmak için giriş yapmalısınız.";
				$ret = "Giriş yapmak için <a href='/web/?page=login'>tıkla</a>";
			}




		}

		/* YORUMLARI ÇEKME */

			$query2 = $db->prepare("SELECT * FROM yorum INNER JOIN kullanici ON yorum.yorumcu_id = kullanici.id AND yorum.tarif_id = '{$id}'");
			$query2->execute();
			$fetch2 = $query2->fetchAll(PDO::FETCH_ASSOC);

	

?>



