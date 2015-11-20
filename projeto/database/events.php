<?php
include_once('connection.php');

function getEvent($id) {
    global $db;

    $a = $db->prepare('SELECT * FROM events WHERE id = ?');
    $a->execute(array($id));

    return $a->fetch();
}

function getEvents() {
    global $db;

    $a = $db->prepare('SELECT * FROM events');
    $a->execute();

    return $a->fetchAll();
}

function getComments($id) {
    global $db;

    $a = $db->prepare('SELECT * FROM event_comments WHERE event_id = ?');
    $a->execute(array($id));

    return $a->fetchAll();
}

function getRegistered($id) {
    global $db;

    $a = $db->prepare('SELECT * FROM event_registrations WHERE event_id = ?');
    $a->execute(array($id));

    return $a->fetchAll();
}

function createEvent($date, $description, $type, $creator) {
    global $db;

    $a = $db->prepare('INSERT INTO events VALUES(null, ?, ?, ?, ?)');
    $a->execute(array($date, $description, $type, $creator));

    return true;
}

?>
