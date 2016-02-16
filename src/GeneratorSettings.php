<?php

/**
 * Configuration of settings to be given to the password generator.
 * Also, validates any changes to the settings. Setters will throw
 * exception if invalid value is passed.
 * Better than making a function and passing in all these settings as a parameter.
 */
class GeneratorSettings{

	// Default settings
	private $wordlist = ["a","bb","ccc","dddd"];
	private $numWords = 4;
	private $hasNum = false;
	private $hasSpclChar = false;
	private $delimiter = "-";


	public function getWordList(){
		return $this->wordlist;
	}

	public function setNumWords($num){
		$min = 2;
		$max = 15;

		if(gettype($num) !== "integer"){
			throw new Exception("Must be an integer");
		}
		else if($num < $min){
			throw new Exception("Must be more than $min");
		}
		else if($num > $max){
			throw new Exception("Must be less than $max");
		}

		$this->numWords = $num;
		return $this;
	}
	public function getNumWords(){
		return $this->numWords;
	}

	public function setHasNum($hasNum){
		$this->hasNum = $hasNum;
		return $this;
	}
	public function getHasNum(){
		return $this->hasNum;
	}

	public function setHasSpclChar($hasSpclChar){
		$this->hasSpclChar = $hasSpclChar;
		return $this;
	}
	public function getHasSpclChar(){
		return $this->hasSpclChar;
	}

	public function setDelimiter($delimiter){
		$this->delimiter = $delimiter;
		return $this;
	}
	public function getDelimiter(){
		return $this->delimiter;
	}


	// Possible Special Characters
	// According to University of Wisconsin-Madison https://kb.wisc.edu/page.php?id=4073
	public static $possibleSpclChar = ["!", "\"", "#","$","%","&","'","(",")","*","+",",","-",".","/",":",";", "<","=",">","?","@","[","\\","]","^","_","`","{","|","}","~"];
}




?>