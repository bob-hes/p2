<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>bzs's xkcd Password Generator</title>
		<script src="jquery-1.12.0.min.js"></script>

	</head>
	<body>
		

		<form method="get">
			<?php
			require_once("src/autoload.php");
			$fr = new FormRepopulater($_GET);
			?>


			<input <?php $fr->number("numWords", 4); ?> min="2" max="15" /> Num Words<br />
			<input <?php $fr->checkbox("hasNum"); ?> /> Has Num<br />
			<input <?php $fr->checkbox("hasSpclChar"); ?> /> Has Special Char<br />
			<input <?php $fr->checkbox("uc1st"); ?> /> First character uppercase<br />
			<input <?php $fr->text("seperator", "-"); ?> maxlength="1" size="1" /> Seperator <br />
			<input type="submit" />

			<!-- schneier method? first letter of every word in sentence -->
			<!-- The "troubador" method; http://security.stackexchange.com/questions/6095/xkcd-936-short-complex-password-or-long-dictionary-passphrase/6096#6096 -->
			<!-- languages -->
			<!-- 256 >  -->
		</form>

		<br />

		<div id="passphrase">
			<?php

			$settings = new GeneratorSettings();
			$settings->setFromArray($_GET);

			if($settings->isValid()){
				$pass = new PassGenerator($settings);
				echo $pass->generate();
			}
			else {
				var_dump($settings->getInvalids());
			}


			?>

		</div>

	</body>
</html>