<html lang="ge">

<head>
<link rel="stylesheet" type="text/css" href="./../src/style.css">
    <meta charset="UTF-8">
    <meta name="keywords" content="Georgian, Words, Generator, Alphabet, Typography, Help, Placehoplder, Text">
    <meta name="author" content="ForkingBeardman">
    <meta name="description" content="Generate Random Georgian words using only the characters provided">
</head>
<script>
    const select = document.querySelector('#language-select');
    select.addEventListener('change', function() {
        window.location.href = `?lang=${this.value}`;
    });
</script>
<body>
    <div class="container">
        <div class="select--white language">
        <select id="language" onchange="window.location.href = this.value;">
                <option value="#"><?= _l("lang")?></option>
                <?php foreach (get_languages() as $lang => $lang_file) : ?>
                        <option value="?lang=<?= $lang ?>"><?= _l($lang) ?></option>
                    <?php endforeach ?>
            </select>
        </div>
        <div class="frame">
            <div >
                <form class="form-signin" action="" method="post" id="">
                    <input type="text" class="form-styling" name="chars" id="chars" placeholder="<?= _l("placeholder") ?>" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" value="<?= clean_chars($vb['chars']) ?>"></input>
                    <?php require("options.view.php"); ?>
                    <div class="btn-animate">
                    <input type="submit" name="submit" value="<?= _l("search") ?>" class="btn-signin"></input>
                        <!-- <button  class="btn-signin" ><?= _l("search") ?></button> -->
                    </div>
                </form>
            </div>
            <div class="text-frame">
                <div class="text-block">
                    <p>
                        <?php require("$name.view.php"); ?>
                    </p>
                </div>
            </div>
            <a id="refresh" value="Refresh" href="./">
                <svg class="refreshicon" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="25px" height="25px" viewBox="0 0 322.447 322.447" style="enable-background:new 0 0 322.447 322.447;" xml:space="preserve">
                    <path d="M321.832,230.327c-2.133-6.565-9.184-10.154-15.75-8.025l-16.254,5.281C299.785,206.991,305,184.347,305,161.224
      c0-84.089-68.41-152.5-152.5-152.5C68.411,8.724,0,77.135,0,161.224s68.411,152.5,152.5,152.5c6.903,0,12.5-5.597,12.5-12.5
      c0-6.902-5.597-12.5-12.5-12.5c-70.304,0-127.5-57.195-127.5-127.5c0-70.304,57.196-127.5,127.5-127.5
      c70.305,0,127.5,57.196,127.5,127.5c0,19.372-4.371,38.337-12.723,55.568l-5.553-17.096c-2.133-6.564-9.186-10.156-15.75-8.025
      c-6.566,2.134-10.16,9.186-8.027,15.751l14.74,45.368c1.715,5.283,6.615,8.642,11.885,8.642c1.279,0,2.582-0.198,3.865-0.614
      l45.369-14.738C320.371,243.946,323.965,236.895,321.832,230.327z" />
                </svg>
            </a>
        </div>

    </div>

    <footer class="footer">
        <div class="footer-text"> © 2022. Idjit Brother Ltd</div>
    </footer>
</body>

</html>