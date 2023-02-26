<form id="lang" action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
<select id="language" onchange="window.location.href = this.value;">
    <?php foreach (get_languages() as $lang => $lang_file) : ?>
        <?php $sSel = $lang == $vb['lang'] ? 'selected="selected"' : ""; ?>
        <option value="?lang=<?= $lang ?>" <?= $sSel?>><?= _l($lang) ?></option>
    <?php endforeach ?>
</select>
</div>
</form>