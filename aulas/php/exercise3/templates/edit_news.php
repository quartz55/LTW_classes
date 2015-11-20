<form action="action_edit_news.php" method="get">
    <fieldset>
        <input type="hidden" name="id" value="<?=$id?>"> Title:
        <br>
        <input type="text" name="title" value="<?=$news_content['title']?>">
        <br> Introduction:
        <br>
        <input type="text" name="introduction" value="<?=$news_content['introduction']?>">
        <br> Full text:
        <br>
        <textarea name="fulltext" rows="20" cols="80">
            <?=$news_content['fulltext']?>
        </textarea>
        <br>

        <p>
            <input type="submit" value="Edit">
        </p>

        <a href="news_item.php?id=<?=$id?>">Back</a>
</form>
