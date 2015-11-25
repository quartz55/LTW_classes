<?php
session_start();

include_once("database/connection.php");

include_once("templates/header.php");
include_once("templates/list_events.php");

if (isset($_SESSION['username'])) { ?>
    <div class = "nav_buttons">
        <ul>
            <li><a href="create_event.php">Create event</a></li>
            <li><a href="#">My events</a></li>
        </ul>
    </div>
<?php }
include_once("templates/footer.php");
?>
