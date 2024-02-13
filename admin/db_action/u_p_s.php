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

    $update = $file_db->prepare("UPDATE proccessing_strings SET 
    proc_str_title_1 = :proc_str_title_1,
    proc_str_title_2 = :proc_str_title_2,
    proc_str_1 = :proc_str_1,
    proc_str_2 = :proc_str_2,
    proc_str_3 = :proc_str_3,
    proc_str_4 = :proc_str_4,
    proc_str_5 = :proc_str_5");
    $update->bindParam(":proc_str_title_1", $_POST['proc_str_title_1'], PDO::PARAM_STR);
    $update->bindParam(":proc_str_title_2", $_POST['proc_str_title_2'], PDO::PARAM_STR);
    $update->bindParam(":proc_str_1", $_POST['proc_str_1'], PDO::PARAM_STR);
    $update->bindParam(":proc_str_2", $_POST['proc_str_2'], PDO::PARAM_STR);
    $update->bindParam(":proc_str_3", $_POST['proc_str_3'], PDO::PARAM_STR);
    $update->bindParam(":proc_str_4", $_POST['proc_str_4'], PDO::PARAM_STR);
    $update->bindParam(":proc_str_5", $_POST['proc_str_5'], PDO::PARAM_STR);
    
    $update->execute();

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}