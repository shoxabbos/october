<h2>
    Select Language
</h2>

<div class="language-list">
    <?php foreach ($locales as $key => $info): ?>
        <a href="<?= Url::current() ?>?locale=<?= $key ?>">
            <span><?= $info[0] ?? '?' ?></span>
            <small><?= $info[1] ?? '?' ?></small>
        </a>
    <?php endforeach ?>
</div>
