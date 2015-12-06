<div class="container">
    <h1><?=$user['username']?> info</h1>
    <ul>
        <?php if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {?>
            <li>Password: <?=$user['password'] ?></li>
        <?php } ?>
    </ul>
    <div id="events_created" class="sub-category">
        <div class="header">
            <span>Events created</span>
        </div>
        <ul>
            <?php if (count($user_events) > 0) {
                foreach ($user_events as $event) { ?>
                <li><a href="show_event.php?id=<?=$event['id']?>"><?=printEvent($event)?></a></li>
            <?php } ?>
        <?php } else {?>
            <li>User hasn't created any events</li>
            <?php } ?>
        </ul>
    </div>

    <div id="events_registered" class="sub-category">
        <div class="header">
            <span>Events registered</span>
        </div>
        <ul>
            <?php if (count($user_events_reg) > 0) {
                foreach ($user_events_reg as $event) { ?>
                <li><a href="show_event.php?id=<?=$event['id']?>"><?=printEvent($event)?></a></li>
            <?php } ?>
        <?php } else {?>
            <li>User isn't registered in any events</li>
            <?php } ?>
        </ul>
    </div>
</div>
