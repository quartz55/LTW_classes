<?php
include_once('database/events.php');
include_once("database/upload.php");

if (isset($_POST['confirm_btn'])) {
    $priv = 0;
    if ($_POST['privacy'] == 'Private') $priv = 1;

    $image_path = uploadImage($_FILES['image'], 'resources/images/uploaded/');
    if ($image_path == 'no_file') {
        editEventNoImage($_POST['id'], $_POST['date'], $_POST['desc'],
                         $_POST['type'], $priv);
    }
    else if ($image_path != 'error') {
        echo '<p> Final path: ' . $image_path;
        editEvent($_POST['id'], $_POST['date'], $_POST['desc'],
                  $_POST['type'], $image_path, $priv);
    }
}

header('Location: ' . $_COOKIE['redirect']);
?>
