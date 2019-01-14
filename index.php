<?php
	session_start();

	# error
	error_reporting(0);


	# db
	$db = new PDO("mysql:host=localhost;dbname=deneme", "root", "");
	$db->exec("SET CHARSET utf8");

	#
	$page = $_GET['page'];

	if($page == '' || $page == null) {
		$page = 'index';
	}

	#
	include("controller/". $page . ".php");
	include("view/". $page . ".php");
?>