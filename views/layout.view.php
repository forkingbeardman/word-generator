<html lang="ge">

<head>
    <title>Georgian Words Generator</title>
    <link rel="stylesheet" type="text/css" href="./src/style.css">
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

    <body>
        <div class="container">
            <!-- side nav -->
            <div class="column-1">
                <div class="sidenav">
                    <form class="form-signin" action="" method="post" id="">
                        <div class="box">
                            <input type="text" class="searchbox" name="chars" id="chars" placeholder="<?= _l("placeholder") ?>" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" value="<?= clean_chars($vb['chars']) ?>"></input>
                        </div>
                        <?php require("options.view.php"); ?>
                        <div class="box">
                            <input type="submit" name="generate" value="<?= _l("action") ?>" class="btn">
                        </div>
                    </form>
                </div>
            </div>
            <div class="column-2">
                <div class="results">
                    <div class="title">
                        <h1><?= _l("pagetitle") ?></h1>
                    </div>
                    <div class="text-block">
                        <?php require("$name.view.php"); ?>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottomnav">
            <div class="language">
            <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 24 24"><path d="M12.02 0c6.614.011 11.98 5.383 11.98 12 0 6.623-5.376 12-12 12-6.623 0-12-5.377-12-12 0-6.617 5.367-11.989 11.981-12h.039zm3.694 16h-7.427c.639 4.266 2.242 7 3.713 7 1.472 0 3.075-2.734 3.714-7m6.535 0h-5.523c-.426 2.985-1.321 5.402-2.485 6.771 3.669-.76 6.671-3.35 8.008-6.771m-14.974 0h-5.524c1.338 3.421 4.34 6.011 8.009 6.771-1.164-1.369-2.059-3.786-2.485-6.771m-.123-7h-5.736c-.331 1.166-.741 3.389 0 6h5.736c-.188-1.814-.215-3.925 0-6m8.691 0h-7.685c-.195 1.8-.225 3.927 0 6h7.685c.196-1.811.224-3.93 0-6m6.742 0h-5.736c.062.592.308 3.019 0 6h5.736c.741-2.612.331-4.835 0-6m-12.825-7.771c-3.669.76-6.671 3.35-8.009 6.771h5.524c.426-2.985 1.321-5.403 2.485-6.771m5.954 6.771c-.639-4.266-2.242-7-3.714-7-1.471 0-3.074 2.734-3.713 7h7.427zm-1.473-6.771c1.164 1.368 2.059 3.786 2.485 6.771h5.523c-1.337-3.421-4.339-6.011-8.008-6.771"/></svg></div>
                <div class="languagedrop">
                <?php require("languagedrop.view.php"); ?>
                </div>
            </div>
            <div class="footer">
                © 2022. GRS
            </div>
            <div class="reset">
                <a id="refresh" value="Refresh" href="./?lang=<?= set_language() ?>">
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
    </body>

</html>