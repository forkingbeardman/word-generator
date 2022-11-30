<?php
//definictions and locations
define('listFileLocation', __DIR__ . "/ka_GE.txt");
define('listLetters', __DIR__ . "/ka_GE_Letters.txt");


//split by chars and remove non-allowed
function my_char_split($string)
{
    $letters = get_letters(); //get allowed list
    $arr_str = mb_str_split($string); //do da split
    $arr_str = array_unique($arr_str); //keep unique only

    $result = array_intersect($letters, $arr_str); //leave only allowed

    $result = array_map("trim", $result);
    return $result;
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

//get allowed letter dict
function get_letters()
{
    $result = array();
    $letterlist = fopen(listLetters, "r") or die("Unable to locate/open the word list file.");
    while (($l = fgets($letterlist)) !== false) {
        array_push($result, $l);
    }

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
function my_text_finder($string)
{
    $dummy = '<div class="dummy">ჩაგეწერა ჯერ რამე შე კაი ადამიანო!</div>'; //text to display if nothing searched
    if ($string <> "") {
        $result = array();
        $wordlist = array();
        $substring = array();
        //split char and leave only unique allowed letters
        $substring = my_char_split($string);

        $wordlist = get_words(); //get dictionary
        $matches = word_match($wordlist, $substring);  //check dictionary

        //set max word amount and make sure there's at least on result else return dummy html
        $word_count_limit = 200;
        $arr_size_max = count($matches);
        if ($arr_size_max > $word_count_limit) {
            $arr_size_max = $word_count_limit;
        }
        
        if ($arr_size_max > 1) {
            $rand_key = array_rand($matches, $arr_size_max);
            shuffle($rand_key);
            foreach ($rand_key as $k) {
                array_push($result, $matches[$k]);
            }
        }
    } else {
        $result = array($dummy);
    }
    return $result;
}
