<div id="info">
    <h1>Event info</h1>
    <form action="action_edit_event.php" method="post" >
        <input type="hidden" name="id" value="<?=$event['id']?>">
        <ul>
            <li><b>Created by</b>
                <a href="show_user.php?username=<?=$event['creator']?>"> <?=$event['creator'] ?></a>
            </li>
            <li><b>Type</b> <span id="type"><?=$event['type']?></span></li>
            <li><b>Date</b> <span id="date"><?=$event['date']?></span></li>
            <li><b>Description</b> <span id="desc"><?=$event['description']?></span></li>
        </ul>
    </form>

    <div id="registered">
        <h3>Registered users</h3>
        <ul>
            <?php if (count($registered) <= 0) {?>
                <s>No users have registered in this event</s>
            <?php
            }
            foreach ($registered as $reg) { ?>
                <li><a href="show_user.php?username=<?=$reg['user']?>"><?=$reg['user']?></a></li>
            <?php } ?>
        </ul>
    </div>
</div>

<br>

<div id="comments">
    <h4>Comments</h4>
    <ul>
        <?php if (count($comments) > 0) { ?>
            <?php foreach ($comments as $comment) { ?>
                <li class="comment">
                    <a href="show_user.php?username=<?=$comment['author']?>"><?=$comment['author']?></a>
                    <?=$comment['text']?>
                </li>
            <?php }
            } else { ?>
                <s>No comments yet :(</s>
            <?php } ?>
    </ul>

    <!-- Comment form -->
    <div id="comment_form">
        <?php
        if ($logged &&
            (isRegisteredInEvent($id, $_SESSION['username'])
                || $_SESSION['username'] == $event['creator'])) {?>
            <form action="action_comment.php" method="post" >
                <input type="hidden" name="id" value="<?=$id?>">
                <input type="hidden" name="author" value="<?=$_SESSION['username']?>">
                <input type="text" name="text" required placeholder="Write a comment...">
                <input type="submit" name="comment_btn" value="Post">
            </form>
        <?php } else { ?>
            Register in the event to comment
        <?php } ?>
    </div>
</div>
<br>
