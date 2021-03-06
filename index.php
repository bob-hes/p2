<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Bob's xkcd Password Generator</title>
		<link rel="shortcut icon" type="image/png" href="images/favicon.ico"/>
		

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

		<!-- Person Stylesheet -->
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-1 sides">
				</div>
				<div class="col-md-10 content">


					<div class="page-header">
						<h1>
							xkcd Password Generator
						</h1>
					</div>


					<?php 
						require_once("src/autoload.php");

						$settings = new GeneratorSettings();
						$settings->setFromArray($_GET);
						$valid = $settings->isValid();

						// ALERT for invalid settings
						if(!$valid){ 
							echo '
							<div class="alert alert-warning">
								Options don\'t seem to be valid. <br />';

								foreach($settings->getInvalids() as $msg){
									echo $msg . "<br />";
								}
							echo'
								Passphrases will be made from default settings.
							</div>';
					
							// Set to default setting
							$settings = new GeneratorSettings();
						}	
					?>


					<!-- PASSPHRASES -->
					<table class="table">
						<tbody>
							<?php
								$pg = new PassGenerator($settings);
								for($i = 0; $i < 5; $i++){
									echo '<tr>
											<td>
												<input value="'.$pg->generate().'" type="text" class="form-control passphrases" />
											</td>
										</tr>';
								}
							?>
						</tbody>
					</table>


					<!-- SETTINGS -->
					<div class="row">
						<div class="col-md-3">
						</div>
						<div class="col-md-6">


							<?php $fr = new FormRepopulater($_GET); ?>
							<form class="form-horizontal" role="form">
								<div class="form-group">
									
									<label for="numWords" class="col-sm-4 control-label">
										Number of Words
									</label>
									<div class="col-sm-2">
										<input <?php $fr->number("numWords", 4); ?> min="2" max="15" class="form-control" id="numWords" />
									</div>
									<label for="seperator" class="col-sm-3 control-label">
										Seperated by
									</label>
									<div class="col-sm-2">
										<input <?php $fr->text("seperator", "-"); ?> class="form-control" id="seperator" maxlength="1" />
									</div>

								</div>
	
								<div class="form-group">
									<div class="col-sm-offset-1 col-sm-2">
										<div class="checkbox">
											<label>
												<input <?php $fr->checkbox("hasNum"); ?> /> 
												Include Number
											</label>
										</div>
									</div>
									<div class="col-sm-offset-1 col-sm-2">
										<div class="checkbox">
											<label>
												<input <?php $fr->checkbox("hasSpclChar"); ?> /> 
												Include Special Character
											</label>
										</div>
									</div>
									<div class="col-sm-offset-1 col-sm-2">
										<div class="checkbox">
											<label>
												<input <?php $fr->checkbox("uc1st"); ?> /> 
												First Character Uppercase
											</label>
										</div>
									</div>
									<div class="col-sm-offset-1 col-sm-2">
										<div class="checkbox">
											<label>
												<input <?php $fr->checkbox("capitalize"); ?> /> 
												Capitalize each word
											</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-6">
										 
										<button type="submit" class="btn btn-default submit">
											Give Passphrases!
										</button>
									</div>
								</div>
							</form>
						</div>
						<div class="col-md-3">
						</div>
					</div>
					<p>
						Inspired from <a target="_blank" href="http://xkcd.com/936/">this famous xkcd comic strip</a> drawn by Randall Munroe, the xkcd password generator creates easier to remember passwords that are longer and more secure. The ideas behind it oppose the common idea that strong passwords need to be obfucated with special characters or complicated schemes that make the password harder to remember.
					</p>
					<p>
					</p>
				</div>
				<div class="col-md-1">
				</div>
			</div>
		</div>
	</body>
</html>