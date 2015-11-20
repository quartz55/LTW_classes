<?php
include_once('database/connection.php');
include_once('database/news.php');
include_once('database/comments.php');

$id = $_GET['id'];
$content = getNewsItem($id);
$comments = getComments($id);

include("templates/header.php");
include("templates/view_news.php");
include("templates/footer.php");
?>

