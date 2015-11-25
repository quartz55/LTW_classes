<?php
include_once("database/events.php");
$events = getEvents();

?>

<h2>Events:</h1>
    <?php if (count($events) <= 0)
        echo 'There are no events :('
    ?>
<ul>
    <?php foreach ($events as $event) { ?>
        <li><a href="show_event.php?id=<?=$event['id']?>"><?=$event['date']?> | <?=$event['type']?> | <?=$event['description']?></a> Created by <?=$event['creator']?></li>
    <?php } ?>
</ul>
