<div class="cb_cust">
    <?php foreach ($vb['options'] as $op => $op_val) : ?>
        <?php if ($op <> "wordcount") : ?>
            <input type="checkbox" name="<?= $op ?>" id="<?= $op ?>" <?= $op_val <> "off" ? "checked" : ""; ?> />
            <label for="<?= $op ?>"><span class="ui"></span><?= _l("$op") ?></label>
        <?php endif ?>
    <?php endforeach ?>
</div>
<div class="select--white wordcount">
    <select id="wordcount" name="wordcount" class="">
        <?php
        foreach ($vb['w_count'] as $sOption) {
            $sSel = $sOption == $vb['options']['wordcount'] ? 'selected="selected"' : "";
            echo "<option   $sSel>$sOption</option>";
        }
        ?>
    </select> <label for="wordcount"><span class="ui"></span><?= _l("wordcount") ?></label>
</div>