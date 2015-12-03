<?php
include_once('database/events.php');

editEvent($_POST['id'], $_POST['date'], $_POST['desc'], $_POST['type']);

header('Location: ' . $_COOKIE['redirect']);
?>
