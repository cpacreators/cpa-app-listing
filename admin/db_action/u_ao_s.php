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
    $update = $file_db->prepare("UPDATE app_o_s SET 
    app_o_title = :app_o_title,
    app_o_content = :app_o_content,
    app_o_button = :app_o_button");
    $update->bindParam(":app_o_title", $_POST['app_o_title'], PDO::PARAM_STR);
    $update->bindParam(":app_o_content", $_POST['app_o_content'], PDO::PARAM_STR);
    $update->bindParam(":app_o_button", $_POST['app_o_button'], PDO::PARAM_STR);
    
    $update->execute();

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}