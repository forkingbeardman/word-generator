<html lang="ge">

<head>
    <title>Georgian Words Generator</title>
    <link rel="stylesheet" type="text/css" href="./src/style.css">
    <link rel="stylesheet" href="src/icons.css">
    <meta charset="UTF-8">
    <meta name="keywords" content="Georgian, Words, Generator, Alphabet, Typography, Help, Placehoplder, Text">
    <meta name="author" content="ForkingBeardman">
    <meta name="description" content="Generate Random Georgian words using only the characters provided">
</head>

<body>
    <script>
        const select = document.querySelector('#language-select');
        select.addEventListener('change', function() {
            window.location.href = `?lang=${this.value}`;
        });
    </script>
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
            <div class="toggledark"><i id="icon-toogledark" class="lni lni-night"></i></div>
            <div class="languagedrop">
                <?php require("languagedrop.view.php"); ?>
            </div>
        </div>
        <div class="footer">
            © 2022. GRS
        </div>
        <div class="reset">
            <a id="refresh" value="Refresh" href="./?lang=<?= set_language() ?>">
                <div class="refreshicon"><i class="lni lni-spinner-arrow"></i></div>
            </a>
        </div>
    </div>
    <script src="src/jquery.min.js"></script>
    <script src="src/jquery.cookie.min.js"></script>
    <script src="src/custom.js"></script>
</body>

</html>