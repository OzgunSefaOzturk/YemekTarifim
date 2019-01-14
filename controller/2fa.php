<?php
	#
	require_once $_SERVER['DOCUMENT_ROOT']. '/web/Google/GoogleAuthenticator.php';

	#
	$ga        = new GoogleAuthenticator();
	$query = $db->prepare("SELECT * FROM kullanici WHERE k_mail = '{$_SESSION['2fa']}'");
	$query->execute();
	$fetch = $query->fetch(PDO::FETCH_ASSOC);
	// $qrCodeUrl = $ga->getQRCodeGoogleUrl($_SESSION['2fa_mail'], $get['2fa_secret'], 'Üninot');

	if($_POST) {
		$checkResult = $ga->verifyCode($fetch['user_2fa'], $_POST['secret']);

		if($checkResult === true) {
			$_SESSION['user'] = $fetch['k_adi'];
			$_SESSION['user_id'] = $fetch['id'];

			header("Location:/web/?page=index");
		}
	}
?>