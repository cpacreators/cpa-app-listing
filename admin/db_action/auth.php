<?php
session_start();
require_once(realpath(dirname(__FILE__) . '/../../admin-configuration.php'));
if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])){
	$username = htmlspecialchars($_POST["username"]);
	$password = htmlspecialchars($_POST['password']);
}
if ($username_admin != $username) {
	$url = "../login.php?status=error";
	header('Location: '.$url.'');
	exit();
}
if ($password_admin != $password) {
	$url = "../login.php?status=error";
	header('Location: '.$url.'');
	exit();
}
if ($password_admin = $password && $username_admin = $username) {
	$token = md5(uniqid());
	$url = "../index.php";
	header('Location: '.$url.'');
	$_SESSION['user_admin'] = htmlspecialchars($token);    
	exit();
}