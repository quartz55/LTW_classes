<?php
include_once('connection.php');

function getAllNews() {
    global $db;
    $a = $db->prepare('SELECT * FROM news');
    $a->execute();

    return $a->fetchAll();
}

function getNewsItem($id) {
    global $db;
    $a = $db->prepare('SELECT * FROM news WHERE id = ?');
    $a->execute(array($id));

    return $a->fetch();
}

?>
