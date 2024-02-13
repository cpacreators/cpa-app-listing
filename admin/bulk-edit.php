<?php

require_once(realpath(dirname(__FILE__) . '/../includes/sqldb.inc.php'));
require_once(realpath(dirname(__FILE__) . '/../admin-configuration.php'));
$update = $file_db->prepare("UPDATE apps SET app_locker_url = :post_url");
$update->bindParam(":post_url", $_POST['bulk_url']);
$update->execute();

header('Location: ' . $_SERVER['HTTP_REFERER']);