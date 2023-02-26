<?php

function is_post()
{
    return filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST';
}

function is_get()
{
    return filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET';
}

function view($name, $model)
{
    global  $vb;
    require(__DIR__ . "/../views/layout.view.php");
}


function get_languages()
{
    $path = __DIR__ . '/../lang/';
    $files = array_diff(scandir($path), array('.', '..'));
    $langs = [];
    foreach ($files as $file) {
        $lang = substr($file, 0, 2);
        $langs[$lang] = $file;
    }

    return $langs;
}


function set_language()
{
    $langs = get_languages();
    if (isset($_GET['lang'])) {
        $lang_param = htmlentities($_GET['lang']);
        foreach ($langs as $lang => $lang_file) {
            if ($lang_param == $lang) {
                return $lang;
            }
        }
    }
    return "ka";
}


function get_language_file($language)
{
    $langs = get_languages();
    return $langs[$language];
}

//translation
function _l($label)
{
    global $lang;
    if (isset($lang[$label])) {
        return $lang[$label];
    }
    return $label;
}

//data read functions

// get options
function get_options()
{
    foreach (CONFIG["options"] as $op => $val) {
        $addOps[$op] = $val;
    }
    return $addOps;
}

function  get_word_count()
{
    return CONFIG['w_count'];
}

function  get_geo_script()
{
    return CONFIG['geoscript'];
}

function get_scripts($type)
{
    return GEORGIAN_SCRIPT[$type];
}

function get_letters()
{
    return GEORGIAN_LETTERS;
}



// get dictionary
function get_words()
{

    $result = [];
    $wordlist = fopen(listFileLocation, "r") or die("Unable to locate/open the word list file.");
    while (($word = fgets($wordlist)) !== false) {
        array_push($result, $word);
    }

    $result = array_map("trim", $result);
    return $result;
}
