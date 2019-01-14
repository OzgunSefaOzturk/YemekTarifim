<?php
	include $_SERVER['DOCUMENT_ROOT']. '/web/Facebook/autoload.php';

	use Facebook\Facebook;

	$fb = new Facebook([
	  'app_id' => '746718029015423', // Replace {app-id} with your app id
	  'app_secret' => 'a99388d9c34e03f361da233a5675f595',
	  'default_graph_version' => 'v2.2',
	  ]);

	$helper = $fb->getRedirectLoginHelper();

	try {
	  $accessToken = $helper->getAccessToken();
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
	  // When Graph returns an error
	  echo 'Graph returned an error: ' . $e->getMessage();
	  exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	  // When validation fails or other local issues
	  echo 'Facebook SDK returned an error: ' . $e->getMessage();
	  exit;
	}

	if (! isset($accessToken)) {
	  if ($helper->getError()) {
	    header('HTTP/1.0 401 Unauthorized');
	    echo "Error: " . $helper->getError() . "\n";
	    echo "Error Code: " . $helper->getErrorCode() . "\n";
	    echo "Error Reason: " . $helper->getErrorReason() . "\n";
	    echo "Error Description: " . $helper->getErrorDescription() . "\n";
	  } else {
	    header('HTTP/1.0 400 Bad Request');
	    echo 'Bad request';
	  }
	  exit;
	}

	// Logged in
	// echo '<h3>Access Token</h3>';
	// var_dump($accessToken->getValue());

	// The OAuth 2.0 client handler helps us manage access tokens
	$oAuth2Client = $fb->getOAuth2Client();

	// Get the access token metadata from /debug_token
	$tokenMetadata = $oAuth2Client->debugToken($accessToken);
	// echo '<h3>Metadata</h3>';
	// var_dump($tokenMetadata);

	// Validation (these will throw FacebookSDKException's when they fail)
	$tokenMetadata->validateAppId('746718029015423'); // Replace {app-id} with your app id
	// If you know the user ID this access token belongs to, you can validate it here
	//$tokenMetadata->validateUserId('123');
	$tokenMetadata->validateExpiration();

	if (! $accessToken->isLongLived()) {
	  // Exchanges a short-lived access token for a long-lived one
	  try {
	    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
	  } catch (Facebook\Exceptions\FacebookSDKException $e) {
	    echo "<p>Error getting long-lived access token: " . $e->getMessage() . "</p>\n\n";
	    exit;
	  }

	  // echo '<h3>Long-lived</h3>';
	  // var_dump($accessToken->getValue());
	}

	$response = $fb->get("/me?fields=id,name,email", $accessToken->getValue());
	$user = $response->getGraphUser();

	if($user['email'] != '') {
		$check = $db->prepare("SELECT * FROM kullanici WHERE k_adi = '{$user['name']}' AND k_mail = '{$user['email']}'");
		$check->execute();
		$row = $check->rowCount();

		if($row == 0) {
			$exp  = explode(' ', $user['name']);
			$soy  = end($exp);
			$ad   = str_ireplace($soy, '', $user['name']);
			$mail = $user['email'];
			$add  = $db->prepare("INSERT INTO kullanici(k_isim, k_soy, k_adi, k_mail, k_sifre) VALUES('{$ad}', '{$soy}', '{$user['name']}', '{$mail}', '{$user['id']}')");
			$add->execute();
			$lid  = $db->lastInsertId();
			
			$_SESSION['user']    = $user['name'];
			$_SESSION['user_id'] = $lid;

			header("Location:/web/?page=index");
		} else {
			$fetch = $check->fetch(PDO::FETCH_ASSOC);

			$_SESSION['user']    = $fetch['k_adi'];
			$_SESSION['user_id'] = $fetch['id'];

			header("Location:/web/?page=index");
		}
	}

	// $_SESSION['fb_access_token'] = (string) $accessToken;

	// User is logged in with a long-lived access token.
	// You can redirect them to a members-only page.
	//header('Location: https://example.com/members.php');
?>