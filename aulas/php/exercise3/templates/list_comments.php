<h3>
    <?php $n = count($comments); ?>
    <?= $n ?> comment<?php if ($n != 1) echo "s" ?>
</h3>
<ul>
    <?php foreach($comments as $c) { ?>
        <li>
            <p>
                <b><?= $c['author']?></b>
                <?= $c['text'] ?>
            </p>
        </li>
    <?php } ?>
</ul>
