<?php
include_once("database/events.php");
include_once("database/upload.php");

if (isset($_POST['create_btn'])) {
    $image_path = uploadImage($_FILES['image'], 'resources/images/uploaded/');
    echo '<p> Final path: ' . $image_path;
    if ($image_path != 'error') {
        if ($_POST['private'] == 'yes') $private = 1;
        else $private = 0;
        createEvent($_POST['date'], $_POST['description'], $_POST['type'], $_POST['creator'], $image_path, $private);
    }
}

header('Location: ' . './list_events.php');
?>
