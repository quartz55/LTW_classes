<?php
include_once('database/events.php');

if (isset($_POST['invites']) && is_array($_POST['invites'])) {
    foreach($_POST['invites'] as $user) {
        var_dump($user);
        registerEvent($_POST['event'], $user);
    }
}

header("Location: " . $_COOKIE['redirect']);
?>
