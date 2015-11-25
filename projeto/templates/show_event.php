<h1>Event info:</h2>
<ul>
    <li>Created by:
        <a href="show_user.php?username=<?=$event['creator']?>"> <?=$event['creator'] ?></a>
    </li>
    <li>Type: <?=$event['type'] ?></li>
    <li>Date: <?=$event['date'] ?></li>
    <li>Description: <?=$event['description'] ?></li>
</ul>

<h3>Registered:</h3>
<?php if (count($registered) <= 0) echo "<p>No users registered to this event yet</p>" ?>
<ul>
    <?php foreach ($registered as $reg) { ?>
        <li><a href="show_user.php?username=<?=$reg['user']?>"><?=$reg['user']?></a></li>
    <?php } ?>
</ul>

<h4>Comments:</h4>
<ul>
    <?php foreach ($comments as $comment) { ?>
        <li class="comment">
            <a href="show_user.php?username=<?=$comment['author']?>">
                <?=$comment['author']?>
            </a>
            <?=$comment['text']?>
        </li>
    <?php } ?>
</ul>

