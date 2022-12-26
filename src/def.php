<?php
//definictions and locations
define('listFileLocation', __DIR__ . "/ka_GE.txt");


//split by chars and remove non-allowed
function my_char_split($string)
{

    $letters = get_letters(); //get allowed list
    include(__DIR__ . '/dicts.php');

    foreach ($mt_conv as $a => $val) {
        $string = str_replace($a, $val, $string);
    }
    $arr_str = mb_str_split($string); //do da split
    $arr_str = array_unique($arr_str); //keep unique only

    $result = array_intersect($letters, $arr_str); //leave only allowed

    $result = array_map("trim", $result);




    return $result;
}

//randomly provide true false
function random($randomness)
{
    $randomness = $randomness * 10;
    $tf = rand(0, $randomness) == 1;
    return $tf;
}

function clean_chars($string)
{
    return implode("", my_char_split($string));
}


// get dictionary
function get_words()
{

    $result = array();
    $wordlist = fopen(listFileLocation, "r") or die("Unable to locate/open the word list file.");
    while (($word = fgets($wordlist)) !== false) {
        array_push($result, $word);
    }

    $result = array_map("trim", $result);
    return $result;
}

function get_letters()
{
    include(__DIR__ . '/dicts.php');
    $result = array();
    $result = $georgian_letters;

    $result = array_map("trim", $result);
    return $result;
}
//match words
function word_match($word, $char)
{
    $letterlist = get_letters(); //get letters
    $rep_arr = array();
    $result = array();
    $rep_arr = array_diff($letterlist, $char); //get letters to remove
    $removed = str_replace($rep_arr, array(""), $word); //remove letters
    $cnt = count($word) - 1;
    //compare size of original word to replaced version
    for ($x = 0; $x <= $cnt; $x++) {
        $wl = $word[$x];
        $cp = $removed[$x];

        //if size same word contains only letters we want so push to results
        if ($wl == $cp) {
            array_push($result, $cp);
        }
    }
    $result = array_unique($result); //remove dupes for good measure

    $result = array_map("trim", $result);
    return $result;
}


//main logic
function my_text_finder($string, $addOps)
{
    include(__DIR__ . '/dicts.php');
    $text = "";
    $matched = 0;
    if ($string <> "") {
        $result = array();
        $wordlist = array();
        $substring = array();
        //split char and leave only unique allowed letters
        $substring = my_char_split($string);

        $wordlist = get_words(); //get dictionary
        $matches = word_match($wordlist, $substring);  //check dictionary

        //set max word amount and make sure there's at least on result else return dummy html
        $word_count_limit = $addOps["wordcount"];
        $arr_size_max = count($matches);
        if ($arr_size_max > $word_count_limit) {
            $arr_size_max = $word_count_limit;
        }

        if ($arr_size_max > 1) {
            $rand_key = array_rand($matches, $arr_size_max);

            foreach ($rand_key as $k) {
                array_push($result, $matches[$k]);
            }

            if ($addOps["numbers"] <> "off") {
                $maxNum = $arr_size_max / 20;
                for ($i = 0; $i <= $maxNum; $i++) {
                    array_push($result, rand(0, 9999));
                }
            }
            shuffle($result);
        }

        $matched = count($result);
    }

    $punc = $addOps["punc"];




    if ($matched > 0) { //start of mathed results
        foreach ($result as $res) {
            if ($punc <> "off" && random(5)) {
                $res = '"' . $res . '"';
            }
            if ($punc <> "off" && random(5)) {
                $res = "(" . $res . ")";
            }
            if ($punc <> "off" && random(10)) {
                $res = "[" . $res . "]";
            }
            if ($punc <> "off" && random(10)) {
                $res = "{" . $res . "}";
            }
            if ($punc <> "off" && random(3)) {
                $k = array_rand($punctuation_marks);
                $v = $punctuation_marks[$k];
                $res =  $res . $v;
            }
            $text .=  $res ." ";
        }
        $f_text = $text;
        //check for additional options
        if ($addOps["mtavruli"] <> "off") {
            $f_text .= "<br/><br/>";
            $mt_text = $text;
            foreach ($mt_conv as $a => $val) {
                $mt_text = str_replace($val, $a, $mt_text);
            }
            $f_text .= $mt_text;
        }
        if ($addOps["am"] <> "off") {
            $f_text .= "<br/><br/>";
            $am_text = $text;
            foreach ($am_conv as $a => $val) {
                $am_text = str_replace($val, $a, $am_text);
            }
            $f_text .= $am_text;
        }
        if ($addOps["nk"] <> "off") {
            $f_text .= "<br/><br/>";
            $nk_text = $text;
            foreach ($nk_conv as $a => $val) {
                $nk_text = str_replace($val, $a, $nk_text);
            }
            $f_text .= $nk_text;
        }
    } else { //end of mathed results
        $f_text = '<div class="dummy">ჩაგეწერა ჯერ რამე შე კაი ადამიანო!</div>'; //text to display if nothing searched

    }

    return $f_text;
    //return array_rand($punctuation_marks) ;
}
