<?php
define ('SITE_ROOT', realpath(dirname(__FILE__)));
include 'configuration.php';
extract($_POST);
$target_dir =  "data".$IMAGE_WEB_DIR;
$target_file = $target_dir . "/abc" . ".png";
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);


if ($_FILES["image_uploads"]["size"] > 5000000) {
    echo "Sorry, your file is too large.<br>";
    $uploadOk = 0;
}

if ($imageFileType != "jpg" && $imageFileType != "png" &&
    $imageFileType != "jpeg") {
    echo "Sorry, only JPG, JPEG, PNG files are allowed.<br>";
    $uploadOk = 0;
}


if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.<br>";
} else {
    if (file_exists($target_file))
        unlink($target_file);
    echo "FUCKKKKKKKKKK";

    move_uploaded_file($_FILES["image_uploads"]["tmp_name"],$_SERVER['DOCUMENT_ROOT'].'/'.$target_file);
    echo $_SERVER['DOCUMENT_ROOT'].'/image/'.$target_file;
}


?>