<div class="addOptions">
    <?php foreach ($vb['options'] as $op => $op_val) : ?>
        <?php if ($op <> "wordcount") : ?>
            <div class="box">
                <span class="labeltitle"><?= _l("$op") ?></span>
                <input type="checkbox" name="<?= $op ?>" id="<?= $op ?>" <?= $op_val <> "off" ? "checked" : ""; ?> />
                <label for="<?= $op ?>" class="toggle"></label>
            </div>
        <?php endif ?>
    <?php endforeach ?>
    <div class="box">
        <label for="wordcount"><span></span><?= _l("wordcount") ?></label>
        <span class=""></span>
        <select id="wordcount" name="wordcount" class="dropdown">
            <?php
            foreach ($vb['w_count'] as $sOption) {
                $sSel = $sOption == $vb['options']['wordcount'] ? 'selected="selected"' : "";
                echo "<option   $sSel>$sOption</option>";
            }
            ?>
        </select>
    </div>
</div>