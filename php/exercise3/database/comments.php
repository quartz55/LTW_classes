<?php
include_once('connection.php');

function getComments($news_id) {
    global $db;
    $a = $db->prepare('SELECT * FROM comments WHERE news_id = ?');
    $a->execute(array($news_id));
    return $a->fetchAll();
}

?>
