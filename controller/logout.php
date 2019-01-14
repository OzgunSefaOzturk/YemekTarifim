<?php
	unset($_SESSION['user']);
	unset($_SESSION['user_id']);
	unset($_SESSION['FBRLH_state']);

	header("Location:/web/?page=index");
?>