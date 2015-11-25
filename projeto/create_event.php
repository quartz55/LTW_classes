<?php

session_start();

if (!isset($_SESSION['username'])) {
    header('Location: ' . './login.php');
}

include_once("templates/header.php");
?>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/createEventForm.js"></script>

<h1>Create event</h1>
<form action="action_create_event.php" method="post" >
    <input type="hidden" name="creator" value="<?=$_SESSION['username']?>">

    Type: <select name="type" id="type"></select>
    <br>
    Date: <input type="datetime" name="date" id="date" >
    <br>
    Description: <input type="textarea" name="description">
    <br>
    <input type="submit" value="Create" onclick="return createEventForm(this.form);">
    <input type="submit" name="cancel_btn" value="Cancel">
</form>

<?php
include_once("templates/footer.php");
?>
