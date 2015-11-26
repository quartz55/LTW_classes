<?php
include_once("database/users.php");
$users = getUsers();

?>
<h2 class="maintitle">Users:</h2>
<ul>
    <?php foreach ($users as $user) { ?>
        <li><a href="show_user.php?username=<?=$user['username']?>"><?=$user['username']?></a></li>
    <?php } ?>
</ul>
