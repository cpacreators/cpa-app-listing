<?php
	session_start();
	unset($_SESSION["user_admin"]); 
	session_destroy();
	$url = "../login.php";
	header('Location: '.$url.'');
	exit();
?>