<div id="news_item">
    <h1><?= $content['title'] ?></h1>
    <p class="introduction"><?= $content['introduction'] ?></p>
    <p><?= $content['fulltext'] ?></p>

    <a href="edit_news.php?id=<?=$id?>">Edit article</a>

    <div id="comments">
        <?php include("templates/list_comments.php") ?>
    </div>
</div>
<a href="list_news.php">Back</a>
