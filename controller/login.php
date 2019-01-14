<?php

	if(isset($_SESSION['user']) && $_SESSION['user'] != '') {
		header("Location:/web/?page=index");
	} else {	
		if($_POST) {
			$user = $_POST['ka'] ;
			$pass = $_POST['sfr'] ;

			if ($user == "" && $pass == "") {
				$ret = "Kullanıcı adı ve şifre alanı boş olamaz";				
			}elseif ($user == "") {
				$ret =  "Kullanıcı adı boş olamaz";
			}elseif ($pass == "") {			
				$ret =  "Şifre boş olamaz";
			}else{
			

			$query = $db->prepare("SELECT * FROM kullanici WHERE k_adi = '{$user}' AND k_sifre = '{$pass}'");
			$query->execute();
			$row = $query->rowCount();
			$fetch = $query->fetch(PDO::FETCH_ASSOC);


			if($row > 0) {
				$_SESSION['2fa']    = $fetch['k_mail'];
				/*$_SESSION['user_id'] = $fetch['id'];*/

				if($fetch['user_2fa'] == '') {
					header("Location:/web/?page=2fa-create");
				} else {
					header("Location:/web/?page=2fa");
				}
			}else {
				$ret = "hatalı kullanıcı adı veya şifre";
				
			}
		  }	
		}
	}


	# facebook register
	use Facebook\Facebook;
	include $_SERVER['DOCUMENT_ROOT']. '/web/Facebook/autoload.php';

	$fb = new Facebook([
		'app_id' => '746718029015423',
		'app_secret' => 'a99388d9c34e03f361da233a5675f595',
		'default_graph_version' => 'v2.2',
	]);

	$helper      = $fb->getRedirectLoginHelper();
	$permissions = ['email'];
	$loginUrl    = $helper->getLoginUrl('http://localhost/web/?page=fb-callback', $permissions);

	# google login
	include_once($_SERVER['DOCUMENT_ROOT']. '/web/Google/vendor/autoload.php');
	include_once($_SERVER['DOCUMENT_ROOT']. '/web/Google/Google/Client.php');
	include_once($_SERVER['DOCUMENT_ROOT']. '/web/Google/Google/AccessToken/Verify.php');

	#
	$oauth_credentials = $_SERVER['DOCUMENT_ROOT']. '/web/Google/Google/client.json'; 
	$redirect_uri = 'http://localhost/web/?page=gl-callback';

	$Google = new Google_Client();
	$Google->setAuthConfig($oauth_credentials);
	$Google->setRedirectUri($redirect_uri);
	$Google->setScopes(array(
	    "https://www.googleapis.com/auth/plus.login",
	    "https://www.googleapis.com/auth/userinfo.email",
	    "https://www.googleapis.com/auth/userinfo.profile"
	));
	
	$google_login_url = $Google->createAuthUrl();
?>
