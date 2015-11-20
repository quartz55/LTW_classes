<?php

include_once("database/events.php");

$event = getEvent($_GET['id']);
$registered = getRegistered($_GET['id']);
$comments = getComments($_GET['id']);
?>

<h1>Event info:</h2>
<ul>
    <li>Created by: <?=$event['creator'] ?></li>
    <li>Type: <?=$event['type'] ?></li>
    <li>Date: <?=$event['date'] ?></li>
    <li>Description: <?=$event['description'] ?></li>
</ul>

<h3>Registered:</h3>
<ul>
    <?php foreach ($registered as $reg) { ?>
        <li><?=$reg['user']?></li>
    <?php } ?>
</ul>

<h4>Comments:</h4>
<ul>
    <?php foreach ($comments as $comment) { ?>
        <li><b><?=$comment['author']?>: <?=$comment['text']?></b></li>
    <?php } ?>
</ul>

