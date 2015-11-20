<?php
include_once("database/users.php");

session_start();

$user = $_GET['username'];
$loggedIn = $_SESSION['username'];

if ($loggedIn == 'admin') {
    deleteUser($user);
}
else if($loggedIn == $user){
    deleteUser($user);
    session_destroy();
}

header('Location: ' . 'list_users.php');
?>
