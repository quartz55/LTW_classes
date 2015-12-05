<?php
include_once("database/events.php");
include_once("database/upload.php");

if (isset($_POST['create_btn'])) {
    $image_path = uploadImage($_FILES['image'], 'resources/images/');
    echo '<p> Final path: ' . $image_path;
    if ($image_path != 'error') {
        createEvent($_POST['date'], $_POST['description'], $_POST['type'], $_POST['creator'], $image_path);
    }
}

header('Location: ' . './list_events.php');
?>
