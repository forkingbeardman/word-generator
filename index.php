<?php

require "inc/includes.php";
header('Content-Type: text/html; charset=utf-8');

$chars = "";
$result = "";
//options

$vb['options'] = get_options();
$vb['chars'] = null;
$vb['w_count'] = get_word_count();
$vb['geoscript'] = get_geo_script();
$vb['lang'] = set_language();
$var = get_language_file($vb['lang']);
require(__DIR__ . "/lang/$var");
//print_r(get_languages());


if (isset($_POST['submit'])) {
	//be sure to validate and clean your variables
	$chars = htmlentities($_POST['chars']);

	foreach ($vb['options'] as $op => $op_val) {
		if (isset($_POST[$op])) {
			$vb['options'][$op] = htmlentities($_POST[$op]);
		}
	}

	$vb['chars'] = $chars;
	
}
view('index', $vb);
