<?php

if (isset($vb['chars'])  ) {
    echo my_text_finder($vb);
} else {
    echo '<div class="dummy">' .  _l("dummy") . '</div>';
}
