<?php
session_start();

include_once("database/connection.php");

include_once("templates/header.php");
?>

<link rel="stylesheet" href="css/list_events.css">

<script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/database.js"></script>
<script type="text/javascript" src="js/list_user_events.js"></script>
<?php
include_once("templates/list_events.php");
?>
<script type="text/javascript">listAllEvents();</script>
<?php
if (isset($_SESSION['username'])) { ?>
    <div class = "nav_buttons">
        <ul>
            <li><a href="#" onclick="showCreateEventPopup();">Create Event</a></li>
            <li><a href="#" onclick="listAllEvents();">All Events</a></li>
            <li><a href="#" onclick="listUserEvents('<?=$_SESSION['username']?>');">My Events</a></li>
            <li><a href="#" onclick="listAttendingEvents('<?=$_SESSION['username']?>');">Events Registered</a></li>
        </ul>
    </div>
<?php }
include_once("templates/footer.php");
?>
