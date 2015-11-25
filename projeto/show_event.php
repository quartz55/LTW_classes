<?php
session_start();

include_once("database/events.php");

include_once("templates/header.php");


$logged = isset($_SESSION['username']);

$id = $_GET['id'];
$event = getEvent($id);
$registered = getRegistered($id);
$comments = getComments($id);

include_once("templates/show_event.php");
?>

<!-- Comment form -->
<?php if ($logged && isRegisteredInEvent($id, $_SESSION['username'])) {?>
    <form action="action_comment.php" method="post" >
        <input type="hidden" name="id" value="<?=$id?>">
        <input type="hidden" name="author" value="<?=$_SESSION['username']?>">
        <input type="textarea" name="text">
        <br>
        <input type="submit" name="comment_btn" value="Comment">
    </form>
<?php } else { ?>
    <p>Register in the event to comment</p>
<?php } ?>

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
                <li><a href="action_delete_event.php?id=<?=$id?>">Delete event</a></li>
            <?php } ?>
        <?php } ?>
    </ul>
</div>
<a id="back_btn" href="list_events.php">Back</a>

<?php
include_once("templates/footer.php");
?>
