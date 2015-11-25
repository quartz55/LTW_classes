<?php
include_once("database/users.php");
include_once("database/events.php");

$user = getUser($_GET['username']);
$user_events = getUserEvents($user['username']);
$user_events_reg = getUserRegisteredEvents($user['username']);
?>

<h1><?=$user['username']?> info</h1>
<ul>
    <li>Username: <?=$user['username'] ?></li>
    <li>Password: <?=$user['password'] ?></li>
    <li>Events created:</li>
    <ul>
        <?php if (count($user_events) > 0) {
            foreach ($user_events as $event) { ?>
            <li><a href="show_event.php?id=<?=$event['id']?>"><?=printEvent($event)?></a></li>
            <?php } ?>
        <?php } else {?>
            <li>User hasn't created any events</li>
            <?php } ?>
    </ul>
    <li>Events registered:</li>
    <ul>
        <?php if (count($user_events_reg) > 0) {
            foreach ($user_events_reg as $event) { ?>
            <li><a href="show_event.php?id=<?=$event['id']?>"><?=printEvent($event)?></a></li>
            <?php } ?>
        <?php } else {?>
            <li>User isn't registered in any events</li>
            <?php } ?>
    </ul>
</ul>

<h2>User menu</h2>
<ul>
    <li><a href="action_delete_user.php?username=<?=$user['username']?>">Delete user</a></li>
</ul>

<a href=<?=$_SERVER['HTTP_REFERER']?>>Back</a>
