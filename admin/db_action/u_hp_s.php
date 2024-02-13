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
    
    $update = $file_db->prepare("UPDATE hps SET 
    hp_string_featured_title = :hp_string_featured_title,
    hp_string_all_title = :hp_string_all_title,
    hp_string_search = :hp_string_search");
    $update->bindParam(":hp_string_featured_title", $_POST['hp_string_featured_title'], PDO::PARAM_STR);
    $update->bindParam(":hp_string_all_title", $_POST['hp_string_all_title'], PDO::PARAM_STR);
    $update->bindParam(":hp_string_search", $_POST['hp_string_search'], PDO::PARAM_STR);
    
    $update->execute();

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}