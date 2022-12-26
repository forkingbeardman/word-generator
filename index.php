<?php
require __DIR__ . '/src/def.php';
header('Content-Type: text/html; charset=utf-8');

$text = '<div class="dummy">ლორემ იპსუმმა რა დაგიშავა? არაა, უნდა მაწვალო!</div>';
$chars = "";
$result = "";
//options
$aDropd = array("100", "200", "500");
//$styles = array("mtavruli"); //for future autogenerating
$addOps = array("mtavruli" => "off", "am" => "off", "nk" => "off", "punc" => "off", "wordcount" => "100", "numbers" => "off");

//post
if (isset($_POST['submit'])) {
	//be sure to validate and clean your variables
	$chars = htmlentities($_POST['chars']);
	if (isset($_POST['mtavruli'])) {
		$addOps['mtavruli'] = htmlentities($_POST['mtavruli']);
	}
	if (isset($_POST['am'])) {
		$addOps['am'] = htmlentities($_POST['am']);
	}
	if (isset($_POST['nk'])) {
		$addOps['nk'] = htmlentities($_POST['nk']);
	}
	if (isset($_POST['wordcount'])) {
		$addOps['wordcount'] = htmlentities($_POST['wordcount']);
	}
	if (isset($_POST['numbers'])) {
		$addOps['numbers'] = htmlentities($_POST['numbers']);
	}
	if (isset($_POST['punc'])) {
		$addOps['punc'] = htmlentities($_POST['punc']);
	}

	//then you can use them in a PHP function. 
	$result = my_text_finder($chars, $addOps);
}

?>

<head>
	<title>Georgian Word Generator</title>
	<meta charset="UTF-8">
	<meta name="keywords" content="Georgian, Words, Generator, Alphabet, Typography, Help, Placehoplder, Text">
	<meta name="author" content="ForkingBeardman">
	<meta name="description" content="Generate Random Georgian words using only the characters provided">
	<link rel="stylesheet" type="text/css" href="src/style.css">

<body>
	</head>
	<div class="wrapper">
		<div class="user-input">
			<form action="" method="post" id="">
				<div class="input-field">
					<input type="text" class="form-control" name="chars" id="chars" placeholder="ასოები..." autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" value="<?php echo clean_chars($chars) ?>"></input>
					<div class="underline"></div>
				</div>
				<div class="buttons-wrap">
					<div class="buttons">
						<input type="submit" name="submit" value="ძიება" class="btn"></input>
						<div class="btn">
							<a href="./">
								<div class="clear">გასუფთავება</div>
							</a>
						</div>
					</div>
				</div>
				<div class="add-options">
					<label class="lbl_chckbox" for="mtavruli">მთავრული</label>
					<input type="checkbox" name="mtavruli" id="mtavruli" <?php echo $addOps['mtavruli'] <> "off" ? "checked" : "" ?>>
					<label class="lbl_chckbox" for="am">ასომთავრული</label>
					<input type="checkbox" name="am" id="am" <?php echo $addOps['am'] <> "off" ? "checked" : "" ?>>
					<label class="lbl_chckbox" for="nk">ნუსხური</label>
					<input type="checkbox" name="nk" id="nk" <?php echo $addOps['nk'] <> "off" ? "checked" : "" ?>>
					<label class="lbl_chckbox" for="numbers">რიცხვები</label>
					<input type="checkbox" name="numbers" id="numbers" <?php echo $addOps['numbers'] <> "off" ? "checked" : "" ?>>
					<label class="lbl_chckbox" for="punc">პუნქტუაცია</label>
					<input type="checkbox" name="punc" id="punc" <?php echo $addOps['punc'] <> "off" ? "checked" : "" ?>>
					<label for="wordcount">მაქს რაოდენობა:</label>
					<?php
					echo '<select id="wordcount" name="wordcount">';
					foreach ($aDropd as $sOption) {
						$sSel = ($sOption == htmlentities($_POST['wordcount'])) ? 'selected="selected"' : "";
						echo "<option   $sSel>$sOption</option>";
					}
					echo "</select>";
					?>
				</div>
			</form>
		</div>
		<div class="text-wrapper">
			<div class="text-output">
				<!-- Submit Logic -->

				<?php

				echo $result;
				?>
			</div>
		</div>
	</div>
	<footer class="footer">© 2022. Idjit Brother Ltd</footer>
</body>