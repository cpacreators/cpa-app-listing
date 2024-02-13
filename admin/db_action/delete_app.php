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
    $deleteSth = $file_db->prepare("DELETE FROM apps WHERE id = :id");
    $deleteSth->bindParam(":id", $_POST['id'], PDO::PARAM_INT);
    $deleteSth->execute();

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}