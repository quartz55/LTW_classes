<?php
session_start();

include_once("database/connection.php");

include_once("templates/header.php");
include_once("templates/list_events.php");

if (isset($_SESSION['username'])) { ?>
    <ul>
        <li><a href="create_event.php">Create event</a></li>
        <li><a href="#">My events</a></li>
    </ul>
<?php }
include_once("templates/footer.php");
?>
