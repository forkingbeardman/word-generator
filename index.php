<?php
require __DIR__ . '/src/def.php';
header('Content-Type: text/html; charset=utf-8');
?>

<head>
	<meta charset="UTF-8">
	<meta name="keywords" content="HTML, CSS, JavaScript">
	<meta name="description" content="Text Gen">
	<link rel="stylesheet" type="text/css" href="src/style.css">
</head>

<body>
	<div class="wrapper">
		<div class="user-input">
			<form action="" method="get">
				<div class="input-field">
					<input type="text" class="form-control" name="chars" id="chars" placeholder="ასოები..." autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"></input>
					<div class="underline"></div>
				</div>
				<div class="buttons-wrap">
					<div class="buttons">
						<div class="btn">
							<div class="btn-group">
								<input type="submit" name="submit" value="ძიება"></input>
							</div>
						</div>
						<div class="btn">
							<a href="./">
								<div class="clear">გასუფთავება</div>
							</a>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="text-wrapper">
			<div class="text-output">
				<!-- Submit Logic -->

				<?php
				$text = '<div class="dummy">ლორემ იპსუმმა რა დაგიშავა? არაა, უნდა მაწვალო!</div>';
				$val1 = "";
				$result = "";
				if (isset($_GET['submit'])) {
					//be sure to validate and clean your variables
					$val1 = htmlentities($_GET['chars']);
					//echo $val1;
					$text = "";
					//then you can use them in a PHP function. 
					$result = my_text_finder($val1);
					foreach ($result as $res) {
						$text .=  $res. " ";
					}
				}
				echo $text;
				?>
			</div>
		</div>
	</div>
	<footer class="footer">© 2022. Idjit Brother Ltd</footer>
</body>