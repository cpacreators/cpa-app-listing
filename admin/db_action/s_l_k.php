<?php
session_start();
if (!isset($_SESSION['user_admin'])) {
	$url = "login.php";
	header('Location: '.$url.'');
	exit;
} else {
	if (isset($_POST['l_key']) && !empty($_POST['l_key'])){		
		$lk = htmlspecialchars($_POST["l_key"]);
		$ad_f = realpath(dirname(__FILE__) . '/m_s_k.php');
		$data = '<?php' . PHP_EOL . '$lI = "' . $lk . '";' . PHP_EOL . '?>';
		$fp = fopen($ad_f, 'w');
		fwrite($fp, $data);
		fclose($fp);
		$url = "../index.php?rmsg=s";
		header('Location: '.$url.'');
		exit();
	}
}	
?>