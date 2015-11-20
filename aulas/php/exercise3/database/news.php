<?php
include_once('connection.php');

function getAllNews() {
    global $db;
    $a = $db->prepare('SELECT * FROM news;');
    $a->execute();

    return $a->fetchAll();
}

function getNewsItem($id) {
    global $db;
    $a = $db->prepare('SELECT * FROM news WHERE id = ?;');
    $a->execute(array($id));

    return $a->fetch();
}

function editNewsItem($id, $title, $intro, $text) {
    global $db;
    try{
    $a = $db->prepare(
        'UPDATE news
SET title = ?, introduction = ?, fulltext = ?
WHERE id = ?'
    );
    $a->execute(array($title, $intro, $text, $id));
    }
    catch(Exception $e) {
        $e->getMessage();
        echo $e . "<br>";
    }
}

?>
