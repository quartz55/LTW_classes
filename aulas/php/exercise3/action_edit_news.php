<?php
include_once('database/news.php');

$id = $_GET['id'];
$title = $_GET['title'];
$intro = $_GET['introduction'];
$text = $_GET['fulltext'];

editNewsItem($id, $title, $intro, $text);
?>

<a href="news_item.php?id=<?=$id?>">Back</a>
