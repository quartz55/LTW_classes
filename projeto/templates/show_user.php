<?php
include_once("database/users.php");

$user = getUser($_GET['username']);
?>

<h2><?=$user['username']?> info:</h2>
<ul>
    <li>Username: <?=$user['username'] ?></li>
    <li>Password: <?=$user['password'] ?></li>
</ul>

<ul>
    <li><a href="action_delete_user.php?username=<?=$user['username']?>">Delete user</a></li>
</ul>

<a href=<?=$_SERVER['HTTP_REFERER']?>>Back</a>
