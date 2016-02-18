<?php
class Basics extends PHPUnit_Framework_TestCase
{

	public function testOnlyInitalizeGeneratorWithSettings(){
		try{
			$generator = new PassGenerator();
		}
		catch(Exception $e){
			return;
		}

		$this->fail("Should have thrown an error in not inserting settings to the generator.");
	}

	public function testHasFourWords() {

		// 1) Set up
		$defSettings = new GeneratorSettings();
		$generator = new PassGenerator($defSettings);
		$pass = $generator->generate();

		// 2) Break up words delimited
		$passArray = explode("-", $pass);

		// 3) Empty Strings should not be delimited
		foreach ($passArray as $word) {
			$this->assertNotEmpty($word, "One of words is empty: ".$pass);
		}

		// 4) Check if by default it's 4 words
		$this->assertCount(4, $passArray, "Not 4 words: ".$pass);
	}

	public function testCanAddNum(){

		// 1) Set up and get pass
		$hasNumSettings = new GeneratorSettings();
		$hasNumSettings->hasNum = true;
		$generator = new PassGenerator($hasNumSettings);
		$pass = $generator->generate();

		// 2) Last char must be a number
		$lastChar = substr($pass, -1);
		$isNum = is_numeric($lastChar);
		$this->assertTrue($isNum, "Last char not number: ".$pass);
	}

	public function testCanAddSpecialChar(){
		// 1) Set up and get pass
		$spclCharSettings = new GeneratorSettings();
		$spclCharSettings->hasSpclChar = true;
		$generator = new PassGenerator($spclCharSettings);
		$pass = $generator->generate();

		// 2) Last char must be special char
		$lastChar = substr($pass, -1);
		$isSpclChar = in_array($lastChar, GeneratorSettings::$possibleSpclChar);
		$this->assertTrue($isSpclChar, "Last char not special char: ".$pass);
	}



	public function testCanChooseNumWords(){
		// 1) Set up and get pass
		$count = 6;
		$choseNumWords = new GeneratorSettings();
		$choseNumWords->numWords = $count;
		$generator = new PassGenerator($choseNumWords);
		$pass = $generator->generate();

		// 2) Count num of words
		$delimiter = $choseNumWords->seperator;
		$wordArray = explode($delimiter, $pass);
		$this->assertCount($count, $wordArray, "Passphrase not matching the # of words specified: ".$pass);
	}

	public function testLimitWordsTo15(){
		$excessWords = new GeneratorSettings();
		$excessWords->numWords = 16;
		$valid = $excessWords->isValid();

		$this->assertFalse($valid, "Generating with 16 words ( >15 words) should be invalid");
	}

	public function testLimitWordMinTo2(){
		$lackWords = new GeneratorSettings();
		$lackWords->numWords = 1;
		$valid = $lackWords->isValid();

		$this->assertFalse($valid, "Generating with 1 word should be invalid");
	}

	public function testCanSpecifyDelimiter(){
		$numwords = 6;
		$delimiter = "*";

		// 1) Set up and get pass
		$ownSeperator = new GeneratorSettings();
		$ownSeperator->setNumWords($numwords)
					 ->setSeperator($delimiter);
		$generator = new PassGenerator($ownSeperator);
		$pass = $generator->generate();

		// 2) Check if number of words exists delimited by *
		$wordArr = explode($delimiter, $pass);
		$this->assertCount($numwords, $wordArr, "Passphrase not delimited by ". $delimiter . ": " . $pass);
	}

	public function testAccessUndefinedPropertiesThrowsException(){
		try{
			$sett = new GeneratorSettings();

			// Setting
			$sett->undefinedProp = 6;

			// Getting
			$get = $sett->undefinedProp;
		}
		catch(Exception $e){
			return;
		}

		$this->fail("Access to undefined property does not throw exception: ". $sett->undefinedProp);
	}

	public function testSettingsFromArray(){
		$potentialpost = [
			"wordlist" => ["BOB"],
			"numWords" => 3,
			"seperator" => "#"
		];

		$sett = new GeneratorSettings();
		$sett->setFromArray($potentialpost);
		$gen = new PassGenerator($sett);
		$pass = $gen->generate();

		$this->assertEquals($pass, "BOB#BOB#BOB", "Cannot set from array: ".$pass);

	}

}
