<?php
include_once("database/events.php");
$events = getEvents();

?>

<link rel="stylesheet" href="css/list_events.css">
<h2 class="maintitle">Events:</h2>
    <?php if (count($events) <= 0)
        echo 'There are no events :('
    ?>
<ul id="events_list">
    <?php foreach ($events as $event) { ?>
        <li><a href="show_event.php?id=<?=$event['id']?>"><?=$event['date']?> | <?=$event['type']?> | <?=$event['description']?></a> Created by <?=$event['creator']?></li>
    <?php } ?>
</ul>
