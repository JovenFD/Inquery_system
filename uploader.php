<?php
    function upload($file) {
    $target_dir = './uploads/';
    $file_extension = array_reverse(explode(".", basename($file["name"])))[0];
    $file_name = "avatar_" . microtime() . "." . $file_extension;
    $target_file = $target_dir . $file_name;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    list($width, $height) = getimagesize($file["tmp_name"]);
    if($width == 0 || $height == 0) {
        return array(
        "message" => "File is not an image.",
        "status"  => "error"
        );
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        return array(
        "message" => "File already exists.",
        "status" => "error"
        );
    }

    // Check file size
    if ($file["size"] > 2000000) {
        return array(
        "message" => "File is too large.",
        "status" => "error"
        );
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        return array(
        "message" => "Only JPG, JPEG, PNG & GIF files are allowed.",
        "status" => "error"
        );
    }

    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        return array(
        "avatar" => $file_name,
        "message" => "The file ". htmlspecialchars( basename( $file["name"])). " has been uploaded.",
        "status" => "success"
        );
    } else {
        return array(
        "message" => "An unknown error occured while uploading the file.",
        "status" => "error"
        );
    }
    }
?>