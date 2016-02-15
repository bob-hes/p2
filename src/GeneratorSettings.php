<?php

/**
 * Configuration of settings to be given to the password generator.
 * Better than making a function and passing in all these settings as a parameter.
 */
class GeneratorSettings{

	// Default settings
	public $wordlist = ["a","bb","ccc","dddd"];
	public $numWords = 4;
	public $hasNum = false;
	public $hasSpclChar = false;
	public $delimiter = "-";

	// Possible Special Characters
	// According to University of Wisconsin-Madison https://kb.wisc.edu/page.php?id=4073
	public static $possibleSpclChar = ["!", "\"", "#","$","%","&","'","(",")","*","+",",","-",".","/",":",";", "<","=",">","?","@","[","\\","]","^","_","`","{","|","}","~"];
}




?>