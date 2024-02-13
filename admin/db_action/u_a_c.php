<?php
session_start();
if (!isset($_SESSION['user_admin'])) {
    $url = "login.php";
    header('Location: '.$url.'');
    exit;
} else {
    require_once(realpath(dirname(__FILE__) . '/../../includes/sqldb.inc.php'));
    require_once(realpath(dirname(__FILE__) . '/../../admin-configuration.php'));
    if ($password_admin == "123456") {
        $url = "c-psw.php";
        header('Location: '.$url.'');
    }
}

if(isset($_POST)) {
    
    // color_mode
    $update = $file_db->prepare("UPDATE accent_color SET 
    accent_color = :accent_color");
    $update->bindParam(":accent_color", $_POST['accent_color'], PDO::PARAM_STR);
    $update->execute();

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}