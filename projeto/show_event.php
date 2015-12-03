<?php
session_start();

include_once("database/events.php");

include_once("templates/header.php");


$logged = isset($_SESSION['username']);

$id = $_GET['id'];
$event = getEvent($id);
$registered = getRegistered($id);
$comments = getComments($id);
?>

<link rel="stylesheet" href="css/show_event.css">

<script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/database.js"></script>
<script type="text/javascript" src="js/show_event.js"></script>

<?php include_once("templates/show_event.php"); ?>

<div class="nav_buttons">
    <h2>Event menu</h2>
    <ul>
        <?php if ($logged) { ?>
            <?php if (!isRegisteredInEvent($id, $_SESSION['username'])) {?>
                <li><a href="action_register_event.php?id=<?=$id?>">Register</a></li>
            <?php } else {?>
                <li><a href="action_unregister_event.php?id=<?=$id?>">Unregister</a></li>
            <?php } ?>
            <?php if ($_SESSION['username'] == $event['creator']
                                            || $_SESSION['username'] == 'admin') { ?>
                <li id="edit_btn"><a onclick="toggleEditMode()" href="#">Edit event</a></li>
                <li><a onclick="confirmDelete('action_delete_event.php?id=<?=$id?>');" href="#">Delete event</a></li>
            <?php } ?>
        <?php }?>
        <li><a id="back_btn" href="list_events.php">Back</a></li>
    </ul>
</div>

<?php
include_once("templates/footer.php");
?>
