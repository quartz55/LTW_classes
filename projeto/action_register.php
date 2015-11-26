<?php

include_once('database/connection.php');
include_once('database/users.php');

$referer;
if (isset($_COOKIE['redirect'])) $referer = $_COOKIE['redirect'];
else $referer = './index.php';

if (isset($_POST['confirm_btn'])) {
    if (!registerUser($_POST['username'], $_POST['password'])) {
        echo "<script>alert('User is already registered!')</script>";
    }
    else echo "<script>alert('Successfully registered')</script>";

    header('Location: ' . $referer);
}
else if(isset($_POST['cancel_btn'])) {
    header('Location: ' . $referer);
}
else {
    echo "<h1>You shouldn't be here</h1>";
}

?>
