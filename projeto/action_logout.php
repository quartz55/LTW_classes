<?php
session_start();
session_destroy();

if (isset($_POST['relogin_btn'])) {
    header('Location: ' . './login.php');
}
else header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
