<?php
include_once("database/events.php");
$events = getEvents();

?>

<h2 class="maintitle">Events:</h2>
<ul id="events_list">
    <?php if (count($events) <= 0)
        echo 'There are no events :('
    ?>
    <?php foreach ($events as $event) { ?>
        <li><a href="show_event.php?id=<?=$event['id']?>"><?=$event['date']?> | <?=$event['type']?> | <?=$event['description']?></a> Created by <?=$event['creator']?></li>
    <?php } ?>
</ul>

<!-- Create event popup -->

<div class="popup">
    <div class="popup-container">
        <h1>Create event</h1>
        <form action="action_create_event.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="creator" value="<?=$_SESSION['username']?>">
            <img id="preview" src="resources/images/preview.png" alt="Image preview" >
            <br>
            Image: <input name="image" type="file" id="image"/>
            <br>
            Type: <select name="type" id="type"></select>
            <br>
            Date: <input type="datetime" name="date" id="date" >
            <br>
            Description: <input type="textarea" name="description" id="description">
            <br>
        </form>
        <div id="btn_container">
            <input class="button" type="button" value="Create" onclick="confirmCreateEvent();">
            <input class="button" type="button" name="cancel_btn" value="Cancel" onclick="cancelCreateEventPopup();">
        </div>
    </div>
</div>
<div class="black_overlay" onclick="hideCreateEventPopup();"></div>
