<?php
session_start();

include_once("database/events.php");

$id = $_GET['id'];

if (isset($_SESSION['username']))
    registerEvent($id, $_SESSION['username']);

header('Location: ' . './show_event.php?id=' . $id);
?>
