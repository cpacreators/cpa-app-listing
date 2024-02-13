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

if(isset($_POST["title_meta_tag"])) {
    
    $update = $file_db->prepare("UPDATE general_settings SET 
    page_title = :title_meta_tag,
    page_meta_description = :description_meta_tag");
    $update->bindParam(":title_meta_tag", $_POST['title_meta_tag'], PDO::PARAM_STR);
    $update->bindParam(":description_meta_tag", $_POST['description_meta_tag'], PDO::PARAM_STR);
    
    $update->execute();

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

// device_access
if(isset($_POST["device_access"])) {
    
    $update = $file_db->prepare("UPDATE d_acc SET 
    d_acc = :device_access,
    d_acc_title = :d_acc_title,
    d_acc_content = :d_acc_content");
    $update->bindParam(":device_access", $_POST['device_access'], PDO::PARAM_STR);
    $update->bindParam(":d_acc_title", $_POST['d_acc_title'], PDO::PARAM_STR);
    $update->bindParam(":d_acc_content", $_POST['d_acc_content'], PDO::PARAM_STR);
    
    $update->execute();

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

// ga_id
if(isset($_POST["ga_id"])) {
    
    $test = $file_db->prepare("SELECT * FROM ga_id");
    $test->execute();

    $ga_id = $test->fetch();

    if($ga_id) {
        $update = $file_db->prepare("UPDATE ga_id SET 
        ga_id = :ga_id");
        $update->bindParam(":ga_id", $_POST['ga_id'], PDO::PARAM_STR);
        $update->execute();
    } else {
        $insert = $file_db->prepare("INSERT INTO ga_id VALUES(:ga_id)");
        $insert->bindParam(":ga_id", $_POST['ga_id'], PDO::PARAM_STR);
        $insert->execute();
    }
    

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}