<?php
session_start();
if (!isset($_SESSION['user_admin'])) {
	$url = "login.php";
	header('Location: '.$url.'');
	exit;
} else {
	if (isset($_POST['new_username']) && !empty($_POST['new_username']) && isset($_POST['new_password']) && !empty($_POST['new_password'])){		
		$new_username = htmlspecialchars($_POST["new_username"]);
		$new_password = htmlspecialchars($_POST['new_password']);
		$ad_f = realpath(dirname(__FILE__) . '/../../admin-configuration.php');
		$data = '<?php' . PHP_EOL . '$username_admin = "' . $new_username . '";' . PHP_EOL . '$password_admin = "' . $new_password . '";' . PHP_EOL . '?>';
		$fp = fopen($ad_f, 'w');
		fwrite($fp, $data);
		fclose($fp);
		unset($_SESSION["user_admin"]); 
		session_destroy();
		$url = "../login.php?rmsg=s";
		header('Location: '.$url.'');
		exit();
	} else {
		$url = "../c-psw.php";
		header('Location: '.$url.'');
		exit();
	}
}	
?>