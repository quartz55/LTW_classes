<?php
include_once('database/events.php');
include_once("database/upload.php");

$image_path = uploadImage($_FILES['image'], 'resources/images/');
if ($image_path != 'error') {
    echo '<p> Final path: ' . $image_path;
    editEvent($_POST['id'], $_POST['date'], $_POST['desc'], $_POST['type'], $image_path);
}

header('Location: ' . $_COOKIE['redirect']);
?>
