<?php
session_start();
if (!isset($_SESSION['user_admin'])) {
	$url = "login.php";
	header('Location: '.$url.'');
	exit;
} else {
	require(realpath(dirname(__FILE__) . '/../../includes/sqldb.inc.php'));	
	
	$isNum = false;
	foreach( $_POST['sort'] as $key => $value ) {
		if ( ctype_digit($value) ) {
			$isNum = true;
		} else {
			$isNum = false;
		}
	}
	
	if( isset($_POST) && $isNum == true ){
		$orderArr = $_POST['sort'];
		$order = 0;
		if ($stmt = $file_db->prepare("UPDATE apps SET app_display_order = :app_display_order WHERE id= :id ")) {
			foreach ( $orderArr as $item) {
				$stmt->bindParam(':app_display_order', $order);
				$stmt->bindParam(':id', $item);
				$stmt->execute();
				$order++;
			}
		}
		echo json_encode(  $orderArr );
	}
}
?>