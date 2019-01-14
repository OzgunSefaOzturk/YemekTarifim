<?php
	#
	include_once($_SERVER['DOCUMENT_ROOT']. '/web/Google/vendor/autoload.php');
	include_once($_SERVER['DOCUMENT_ROOT']. '/web/Google/Google/Client.php');
	include_once($_SERVER['DOCUMENT_ROOT']. '/web/Google/Google/AccessToken/Verify.php');

	#
	$oauth_credentials = $_SERVER['DOCUMENT_ROOT']. '/web/Google/Google/client.json'; 
	$redirect_uri = 'http://localhost/web/?page=gl-callback';
	 
	$Google = new Google_Client();
	$Google->setAuthConfig($oauth_credentials);
	$Google->setRedirectUri($redirect_uri);
	// $this->Google->setScopes('email');
	$Google->setScopes(array(
	    "https://www.googleapis.com/auth/plus.login",
	    "https://www.googleapis.com/auth/userinfo.email",
	    "https://www.googleapis.com/auth/userinfo.profile"
	));

	if (isset($_GET['code'])){
	    $token = $Google->fetchAccessTokenWithAuthCode($_GET['code']);
	    $Google->setAccessToken($token);
	 
	    // store in the session also
	    $_SESSION['google_access_token'] = $token;
	 
	    $Google->setAccessToken($_SESSION['google_access_token']);
	 
	    if ($Google->getAccessToken())
	    {
	        $token_data = $Google->verifyIdToken();

	        $check = $db->prepare("SELECT * FROM kullanici WHERE k_adi = '{$token_data['name']}' AND k_mail = '{$token_data['email']}'");
			$check->execute();
			$row = $check->rowCount();

			if($row == 0) {
				$soy  = $token_data['family_name'];
				$ad   = $token_data['given_name'];
				$mail = $token_data['email'];
				$add  = $db->prepare("INSERT INTO kullanici(k_isim, k_soy, k_adi, k_mail, k_sifre) VALUES('{$ad}', '{$soy}', '{$token_data['name']}', '{$mail}', '{$token_data['sub']}')");
				$add->execute();
				$lid  = $db->lastInsertId();
				
				$_SESSION['user']    = $token_data['name'];
				$_SESSION['user_id'] = $lid;

				header("Location:/web/?page=index");
			} else {
				$fetch = $check->fetch(PDO::FETCH_ASSOC);

				$_SESSION['user']    = $fetch['k_adi'];
				$_SESSION['user_id'] = $fetch['id'];

				header("Location:/web/?page=index");
			}
	    }
	} else {
		echo "Bir hata oluştu. Tekrar girişe dönün: <a href='/giris'>Giriş</a>";
	}
?>