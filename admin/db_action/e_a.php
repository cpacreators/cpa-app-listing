<?php

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}

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

$updateImg = 0;
if($_FILES["app_img_src"]["tmp_name"]) {
    $target_dir = "../../assets/img/app_images/";
    $fName = generateRandomString(10).basename($_FILES["app_img_src"]["name"]);
    $target_file = $target_dir . $fName;
    
    $uName = "assets/img/app_images/".$fName;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["app_img_src"])) {
    $check = getimagesize($_FILES["app_img_src"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["app_img_src"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["app_img_src"]["tmp_name"], $target_file)) {

        $updateImg = 1;

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    }

}
$featured = 0;
if(isset($_POST['app_featured']) && @$_POST['app_featured'] == 1) {
    $featured = 1;
}

if($updateImg == 1) {
    $editSth = $file_db->prepare("UPDATE apps SET 
    app_featured = :app_featured,
    app_downloads = :app_downloads, 
    app_img_src = :app_img_src,
    app_name = :app_name, 
    app_short_name = :app_short_name,
    app_author = :app_author,
    app_rating = :app_rating, 
    app_description = :app_description,
    app_os = :app_os, 
    app_locker_url = :app_locker_url WHERE id = :id");
    $editSth->bindParam(":app_featured", $featured, PDO::PARAM_STR);
    $editSth->bindParam(":app_downloads", $_POST["app_downloads"], PDO::PARAM_STR);
    $editSth->bindParam(":app_img_src", $uName, PDO::PARAM_STR);
    $editSth->bindParam(":app_name", $_POST["app_name"], PDO::PARAM_STR);
    $editSth->bindParam(":app_short_name", $_POST["app_short_name"], PDO::PARAM_STR);
    $editSth->bindParam(":app_author", $_POST["app_author"], PDO::PARAM_STR);
    $editSth->bindParam(":app_rating", $_POST["app_rating"], PDO::PARAM_STR);
    $editSth->bindParam(":app_description", $_POST["app_description"], PDO::PARAM_STR);
    $editSth->bindParam(":app_os", $_POST["app_os"], PDO::PARAM_STR);
    $editSth->bindParam(":app_locker_url", $_POST["app_locker_url"], PDO::PARAM_STR);
    $editSth->bindParam(":id", $_POST["id"], PDO::PARAM_INT);
    $editSth->execute();

    header('Location: /admin/index.php?manage-apps');
    exit;
} else {
    $editSth = $file_db->prepare("UPDATE apps SET 
        app_featured = :app_featured,
        app_downloads = :app_downloads, 
        app_name = :app_name, 
        app_short_name = :app_short_name,
        app_author = :app_author,
        app_rating = :app_rating, 
        app_description = :app_description,
        app_os = :app_os, 
        app_locker_url = :app_locker_url WHERE id = :id");
    $editSth->bindParam(":app_featured", $featured, PDO::PARAM_STR);
    $editSth->bindParam(":app_downloads", $_POST["app_downloads"], PDO::PARAM_STR);
    $editSth->bindParam(":app_name", $_POST["app_name"], PDO::PARAM_STR);
    $editSth->bindParam(":app_short_name", $_POST["app_short_name"], PDO::PARAM_STR);
    $editSth->bindParam(":app_author", $_POST["app_author"], PDO::PARAM_STR);
    $editSth->bindParam(":app_rating", $_POST["app_rating"], PDO::PARAM_STR);
    $editSth->bindParam(":app_description", $_POST["app_description"], PDO::PARAM_STR);
    $editSth->bindParam(":app_os", $_POST["app_os"], PDO::PARAM_STR);
    $editSth->bindParam(":app_locker_url", $_POST["app_locker_url"], PDO::PARAM_STR);
    $editSth->bindParam(":id", $_POST["id"], PDO::PARAM_INT);
    $editSth->execute();

    header('Location: /admin/index.php?manage-apps');
    exit;
}

?>
