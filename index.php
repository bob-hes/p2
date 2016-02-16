<!DOCTYPE html>
<html>
	<head>




	<script src="jquery-1.12.0.min.js"></script>



	</head>
	<body>
		

		<form method="post">
			<?php
			require_once("src/FormRepopulater.php");
			require_once("src/PassGenerator.php");
			$fr = new FormRepopulater($_POST);

			var_dump($_POST);
			?>


			<input <?php $fr->number("numWords", 4); ?> min="2" max="15" /> Num Words<br />
			<input <?php $fr->checkbox("hasNum"); ?> /> Has Num<br />
			<input <?php $fr->checkbox("hasSpclChar"); ?> /> Has Special Char<br />
			<input type="submit" />
		</form>

		<br />

		<div id="passphrase">
			<?php
			ini_set('display_errors',1);
			ini_set('display_startup_errors',1);
			error_reporting(-1);


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