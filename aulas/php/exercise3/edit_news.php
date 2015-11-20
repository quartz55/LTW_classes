<?php
include_once('database/news.php');

$id = $_GET['id'];
$news_content = getNewsItem($id);

include_once('templates/header.php');
include_once('templates/edit_news.php');
include_once('templates/footer.php');
?>
