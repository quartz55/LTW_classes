<?php

$target_dir = "resources/images/";
function uploadImage($image, $dir) {
    $file_name = $image['name'];
    $tmp_name = $image['tmp_name'];

    $target_file = $dir . basename($image['name']);
    $uploadOk = 1;

    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    $check = getimagesize($image["tmp_name"]);
    if($check !== false) {
        echo "<p>File is an image - " . $check["mime"] . "";
        $uploadOk = 1;
    } else {
        echo "<p>File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "<p>File already exists.";
        return $target_file;
    }
    // Check file size
    /* if ($_FILES["fileToUpload"]["size"] > 500000) {
       echo "Sorry, your file is too large.";
       $uploadOk = 0;
       } */

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "<p>Only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<p>File was not uploaded.";
        return "error";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($image["tmp_name"], $target_file)) {
            echo "<p>The file ". basename($image["name"]). " has been uploaded.";
            return $target_file;
        } else {
            echo "<p>There was an error uploading the file.";
            return "error";
        }
    }
}

?>
