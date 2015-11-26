<?php
include_once("database/events.php");

if (isset($_POST['create_btn'])) {
    createEvent($_POST['date'], $_POST['description'], $_POST['type'], $_POST['creator']);
}

header('Location: ' . './list_events.php');
?>
