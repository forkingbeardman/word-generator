<?php

//split by chars and remove non-allowed
function my_char_split($string)
{
    $mt_conv = GEORGIAN_SCRIPT['mtavruli'];
    $letters = get_letters(); //get allowed list

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


//match words
function word_match($word, $char)
{
    $letterlist = get_letters(); //get letters
    $rep_arr = [];
    $result = [];
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


function add_punctuation($array)
{   
    $punctuation_marks = PUNCTUATION;
    $text = "";
    foreach ($array as $res) {
        if (random(5)) {
            $res = '"' . $res . '"';
        }
        if (random(5)) {
            $res = "(" . $res . ")";
        }
        if (random(10)) {
            $res = "[" . $res . "]";
        }
        if (random(10)) {
            $res = "{" . $res . "}";
        }
        if (random(3)) {
            $k = array_rand($punctuation_marks);
            $v = $punctuation_marks[$k];
            $res =  $res . $v;
        }
        $text .=  $res . " ";
    }
    return $text;
}


function convert_chars($string, $type) {
    $conv_type = get_scripts($type);
    $conv_text = $string;

    foreach ($conv_type as $a => $val) {
        $conv_text = str_replace($val, $a, $conv_text);
    }
    return $conv_text;
}


//main logic
function my_text_finder($data)
{
    $string = $data['chars'];
    $options = $data['options'];

    $matched = 0;
    if ($string <> "") {
        $result = [];
        $wordlist = [];
        $substring = [];
        //split char and leave only unique allowed letters
        $substring = my_char_split($string);

        $wordlist = get_words(); //get dictionary
        $matches = word_match($wordlist, $substring);  //check dictionary

        //set max word amount and make sure there's at least on result else return dummy html
        $word_count_limit = $options["wordcount"];
        $arr_size_max = count($matches);
        if ($arr_size_max > $word_count_limit) {
            $arr_size_max = $word_count_limit;
        }

        if ($arr_size_max > 1) {
            $rand_key = array_rand($matches, $arr_size_max);

            foreach ($rand_key as $k) {
                array_push($result, $matches[$k]);
            }

            if ($options["numbers"] <> "off") {
                $maxNum = $arr_size_max / 20;
                for ($i = 0; $i <= $maxNum; $i++) {
                    array_push($result, rand(0, 9999));
                }
            }
            shuffle($result);
        }

        $matched = count($result);
    }

    $text = "";
    if ($matched > 0) { //start of mathed results
            if ($options["punc"] <> "off" ) {
                $text = add_punctuation($result);
            } else {
                $text = implode(" ", $result);
            }
            
        $f_text = $text;
        //check for additional options

        foreach ($data['geoscript'] as $type) {
            if(isset($options[$type]) && $options[$type] <> "off") {
                $f_text .= "<br/><br/>";
                $f_text .= convert_chars($text,$type);
            }
        }

        
    } else { //end of mathed results
        $f_text = '<div class="dummy">' .  _l("emptyinput") . '</div>'; //text to display if nothing searched

    }

    return $f_text;
    //return array_rand($punctuation_marks) ;
}
