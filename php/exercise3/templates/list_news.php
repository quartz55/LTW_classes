<?php
foreach($news_list as $n) {?>
    <div class="news-item">
        <h3><?= $n['title'] ?> </h3>
        <p class="introduction" ><?= $n['introduction'] ?> </p>
        <p> <?= $n['fulltext'] ?> </p>
        <ul>
            <li>
            <a href=<?= "news_item.php?id=" . $n['id'] ?> > see more </a>
            </li>
        </ul>
    </div>
<?php } ?>
