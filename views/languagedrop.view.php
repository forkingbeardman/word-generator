<form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
    <select id="lang" name="lang" class = "dropdown"onchange="this.form.submit();">
        <?php foreach (get_languages() as $lang => $lang_file) : ?>
            <?php $sSel = $lang == $vb['lang'] ? 'selected="selected"' : ""; ?>
            <option value="<?= $lang ?>" <?= $sSel?>><?= _l($lang) ?></option>
        <?php endforeach ?>
    </select>
</form>
