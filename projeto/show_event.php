<?php
session_start();

include_once("templates/header.php");
include_once("templates/show_event.php");
?>

<?php if (isset($_SESSION['username'])) {?>
    <form action="action_comment.php" method="post" >
        <input type="textarea" name="text">
        <br>
        <input type="submit" name="comment_btn" value="Comment">
    </form>
<?php } else echo '<p>Login to comment</p>'?>

<a href=<?=$_SERVER['HTTP_REFERER']?>>Back</a>

<?php
include_once("templates/footer.php");
?>
