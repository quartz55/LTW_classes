<?php

include_once('database/connection.php');
include_once('database/users.php');

if (isset($_POST['confirm_btn'])) {
    if (!registerUser($_POST['username'], $_POST['password'])) {
        echo "<script>alert('User is already registered!')</script>";
    }
    else echo "<script>alert('Successfully registered')</script>";

    header('Location: ' . './index.php');
}
else if(isset($_POST['cancel_btn'])) {
    header('Location: ' . './index.php');
}
else {
    echo "<h1>You shouldn't be here</h1>";
}

?>
