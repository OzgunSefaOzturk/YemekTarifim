<?php 

			if ($_POST['guncelle']) {
			if(isset($_SESSION['user']) && $_SESSION['user'] != '') {

				$isim = $_POST['ad'];
				$soyisim = $_POST['sa'];
				$kullanıcı = $_POST['ka'];
				$mail = $_POST['mail'];
				$sifre = $_POST['password'];
				if ($sifre != '') {
					
					$query3 = $db->prepare("UPDATE kullanici SET k_sifre='{$sifre}' WHERE id = '{$_SESSION['user_id']}' ");
				$query3->execute();
				}

				$query2 = $db->prepare("UPDATE kullanici SET k_isim='{$isim}',k_soy = '{$soyisim}',k_adi='{$kullanıcı}',k_mail='{$mail}' WHERE id = '{$_SESSION['user_id']}' ");
				$query2->execute();

				$ret = "Profiliniz düzenlendi.";
		}

	}

			$query = $db->prepare("SELECT * FROM kullanici WHERE id = '{$_SESSION['user_id']}' ");
			$query->execute();
			$fetch = $query->fetch(PDO::FETCH_ASSOC);

?>