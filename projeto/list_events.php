<?php
session_start();

include_once("database/events.php");

include_once("templates/header.php");
?>

<link rel="stylesheet" href="css/list_events.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/database.js"></script>
<script type="text/javascript" src="js/list_events.js"></script>
<?php
include_once("templates/list_events.php");

if (isset($_SESSION['username'])) {
    $user = (string)$_SESSION['username'];
}
else {
    $user = '';
}
?>
<script>
 listAllEvents('<?=$user?>');
</script>

<?php
if (isset($_SESSION['username'])) { ?>
    <div class = "nav_buttons">
        <ul>
            <li><a href="#" onclick="showCreateEventPopup();">Create Event</a></li>
            <li><a href="#" onclick="listAllEvents('<?=$_SESSION['username']?>');">All Events</a></li>
            <li><a href="#" onclick="listUserEvents('<?=$_SESSION['username']?>');">My Events</a></li>
            <li><a href="#" onclick="listAttendingEvents('<?=$_SESSION['username']?>');">Events Registered</a></li>
        </ul>
    </div>
<?php }
include_once("templates/footer.php");
?>
