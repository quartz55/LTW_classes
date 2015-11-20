<?php

include_once('database/connection.php');
include_once('database/users.php');

session_start();

if (isset($_POST['login_btn'])) {
    if (checkCredentials($_POST['username'], $_POST['password'])) {
        $_SESSION['username'] = $_POST['username'];
        echo "<script>alert('Login successful')</script>";
    }
    else if (isRegistered($_POST['username'])) {
        echo "<script>alert('Wrong password!')</script>";
    }
    else echo "<script>alert('User is not registered!')</script>";

    header('Location: ' . './index.php');
}
else if (isset($_POST['cancel_btn'])){
    header('Location: ' . './index.php');
}
else {
    echo "<h1>You shouldn't be here</h1>";
}

?>
