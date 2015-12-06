<?php
session_start();

include_once("database/users.php");
include_once("database/events.php");

include_once("templates/header.php");

$user = getUser($_GET['username']);
$user_events = getUserEvents($user['username']);
$user_events_reg = getUserRegisteredEvents($user['username']);

include_once("templates/show_user.php");
?>

<link rel="stylesheet" href="css/show_user.css">

<div class="nav_buttons">
    <h2>User menu</h2>
    <ul>
        <?php if (isset($_SESSION['username']) &&
            ($_SESSION['username'] == $_GET['username']
                                   || $_SESSION['username'] == 'admin')) {?>
            <li>
                <a href="action_delete_user.php?username=<?=$user['username']?>">Delete user</a>
            </li>
        <?php }?>
        <li><a id="back_btn" href=<?=$_SERVER['HTTP_REFERER']?>>Back</a></li>
    </ul>
</div>

<?php
include_once("templates/footer.php");
?>
