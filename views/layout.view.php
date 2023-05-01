<html lang="<?= set_language() ?>">

<head>
    <title><?= _l("sitetitle") ?> - GRS</title>
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
                <form class="form-signin" action="" method="post" id="" enctype="multipart/form-data">
                    <div class="box">
                        <input type="text" class="searchbox" name="chars" id="chars" placeholder="<?= _l("placeholder") ?>" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" value="<?= clean_chars($vb['chars']) ?>"></input>
                    </div>
                    <?php require("options.view.php"); ?>
                    <!-- font size -->
                    <div class="box slider-box">
                        <div class="fontSliderLabel" id="fontSliderLabel"><?= _l("fontsize") ?></div>
                        <input id="fontsize" type="range" min="8" max="72" value="16" class="fontSlider">
                        <div class="fontSliderValue" id="fontSizeValue">16</div>
                    </div>
                    <!-- font weight -->
                    <div class="box slider-box">
                        <div class="fontSliderLabel" id="fontSliderLabel"><?= _l("fontweight") ?></div>
                        <input id="fontweight" type="range" min="100" max="900" value="400" step="10" class="fontSlider">
                        <div class="fontSliderValue" id="fontWeightValue">400</div>
                    </div>
                    <!-- font width -->
                    <div class="box slider-box">
                        <div class="fontSliderLabel" id="fontSliderLabel"><?= _l("fontwidth") ?></div>
                        <input id="fontwidth" type="range" min="1" max="9" value="5" class="fontSlider">
                        <div class="fontSliderValue" id="fontWidthValue">5</div>
                    </div>
                    <!-- line heigh -->
                    <div class="box slider-box">
                        <div class="fontSliderLabel" id="fontSliderLabel"><?= _l("lineheight") ?></div>
                        <input id="lineheight" type="range" min="0.6" max="3" value="1.2" step="0.1" class="fontSlider">
                        <div class="fontSliderValue" id="lineHeightValue">1.2</div>
                    </div>
                    <!-- font spacing -->
                    <div class="box slider-box">
                        <div class="fontSliderLabel" id="fontSliderLabel"><?= _l("fontspacing") ?></div>
                        <input id="fontspacing" type="range" min="-0.4" max="0.4" value="0" step="0.01" class="fontSlider">
                        <div class="fontSliderValue" id="fontSpacingValue">0</div>
                    </div>
                    <!-- custom font -->
                    <div class="box">
                        <label for="fileToUpload" class="custom-file-upload">
                            <i class="lni lni-upload"></i><?= _l("customfont") ?>
                        </label>
                        <input type="file" name="fileToUpload" id="fileToUpload" accept=".ttf,.otf,.woff,.woff2">
                        <div class="clearFont"><?= _l("reset") ?></div>
                    </div>
                    <!-- SUBMIT BUTTON -->
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

                <div class="text-block" id="genResults">
                    <?php require("$name.view.php"); ?>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
    <!-- bottom nav -->
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
    <script>
        //nothing
    </script>
</body>

</html>