<?php
include_once('database/connection.php');
include_once('database/news.php');

$news_list = getAllNews();

include('templates/header.php');
include('templates/list_news.php');
include('templates/footer.php');
?>

