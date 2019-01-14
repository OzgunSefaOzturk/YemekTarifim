<?php
	# google 2fa
	require_once $_SERVER['DOCUMENT_ROOT']. '/web/Google/GoogleAuthenticator.php';

	#
	$ga        = new GoogleAuthenticator();

	# secret check
	$query = $db->prepare("SELECT * FROM kullanici WHERE k_mail = '{$_SESSION['2fa']}'");
	$query->execute();
	$row = $query->rowCount();
	$fetch = $query->fetch(PDO::FETCH_ASSOC);

	if(count($row) > 0 && $fetch['user_2fa'] != '') {
		$secret = $fetch['user_2fa'];
	} else {
		$secret = $ga->createSecret();

		# update secret
		$query = $db->prepare("UPDATE kullanici SET user_2fa = '{$secret}' WHERE k_mail = '{$_SESSION['2fa']}'");
		$query->execute();
	}

	# qr code	
	$qrCodeUrl = $ga->getQRCodeGoogleUrl($_SESSION['2fa'], $secret, 'Yemek');
?>