<?php
include_once('database/events.php');

$events = [];
if (isset($_GET['user'])) {
    if (isset($_GET['attending'])) {
        $events = getUserRegisteredEvents($_GET['user']);
    }
    else {
        $events = getUserEvents($_GET['user']);
    }
}
else if (isset($_GET['private'])){
    $events = getPrivateEvents();
}
else if (isset($_GET['admin'])) {
    $events = getEvents();
}
else {
    $events = getPublicEvents();
}

echo json_encode($events);
?>
