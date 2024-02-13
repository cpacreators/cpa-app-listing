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

if($_FILES["logo_img_src"]["tmp_name"]) {
    $target_dir = "../../assets/img/app_images/";
    $fName = generateRandomString(10).basename($_FILES["logo_img_src"]["name"]);
    $target_file = $target_dir . $fName;
    
    $uName = "assets/img/app_images/".$fName;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["logo_img_src"])) {
    $check = getimagesize($_FILES["logo_img_src"]["tmp_name"]);
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
    if ($_FILES["logo_img_src"]["size"] > 500000) {
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
    if (move_uploaded_file($_FILES["logo_img_src"]["tmp_name"], $target_file)) {

        $updateImg = 1;

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    }

}


if($updateImg == 1) {
    $editSth = $file_db->prepare("UPDATE header_settings SET 
    header_logo_img_src = :header_logo_img_src,
    header_title = :header_title, 
    header_subtitle = :header_subtitle,
    header_particles = :header_particles");
    
    $editSth->bindParam(":header_logo_img_src", $uName, PDO::PARAM_STR);
    $editSth->bindParam(":header_title", $_POST["header_title"], PDO::PARAM_STR);
    $editSth->bindParam(":header_subtitle", $_POST['header_subtitle'], PDO::PARAM_STR);
    $editSth->bindParam(":header_particles", $_POST["header_particles"], PDO::PARAM_STR);

    $editSth->execute();

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
} else {
    $editSth = $file_db->prepare("UPDATE header_settings SET 
    header_title = :header_title, 
    header_subtitle = :header_subtitle,
    header_particles = :header_particles");
    
    $editSth->bindParam(":header_title", $_POST["header_title"], PDO::PARAM_STR);
    $editSth->bindParam(":header_subtitle", $_POST['header_subtitle'], PDO::PARAM_STR);
    $editSth->bindParam(":header_particles", $_POST["header_particles"], PDO::PARAM_STR);

    $editSth->execute();

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

?>
