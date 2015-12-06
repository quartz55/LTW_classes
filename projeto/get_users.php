<?php
include_once('database/users.php');

$users = [];
if (isset($_GET['event'])) {
    if (isset($_GET['attending'])) {
        $users = getRegisteredUsers($_GET['event']);
    }
    else {
        $users = getNonRegisteredUsers($_GET['event']);
    }
}
else {
    $users = getUsers();
}

echo json_encode($users);
?>
