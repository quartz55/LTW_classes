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
else {
    $events = getEvents();
}
echo json_encode($events);
?>
