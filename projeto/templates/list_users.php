<?php
include_once("database/users.php");
$users = getUsers();

?>
<h2>Users:</h1>
<ul>
    <?php foreach ($users as $user) { ?>
        <li><a href="show_user.php?username=<?=$user['username']?>"><?=$user['username']?></a></li>
    <?php } ?>
</ul>
