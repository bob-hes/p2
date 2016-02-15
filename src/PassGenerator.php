<?php

require "GeneratorSettings.php";

/**
 * Will generate a passphrase based on the settings given by a GenneratorSettings object.
 * This won't be initialized without a GeneratorSettings object being passed in
 */
class PassGenerator{

	private $settings;

	/**
	 * PassGenerator will only initialize with a GeneratorSettings object passed in
	 * 
	 * @param GeneratorSettings $settings - defines the configurations of the 
	 * passphrase such as number of words, whether to have numbers, and 
	 * whether to have special characters, etc
	 */
	public function __construct(GeneratorSettings $settings){
		$this->settings = $settings;
	}


	/**
	 * Takes the settings passed in from initializing the GeneratorSettings object, 
	 * and uses those settings to return a passphrase from randomly picked out words
	 * from the $settings's wordlist
	 * 
	 * @return String - passphrase based on the configurations of $settings. 
	 */
	public function generate(){
		$settings = $this->settings;
		$delimiter = "-";
		$chosenWords = [];
		$wordlist = $settings->wordlist;
		$numWords = $settings->numWords;

		// Randomly pick a new word to go in sequence
		for($i = 0; $i < $numWords; $i++){
			$random_i = rand(0, count($wordlist)-1);
			$chosenWords[] = $wordlist[$random_i];
		}

		$passphrase = implode("-", $chosenWords);	


		// add num
		if($settings->hasNum){
			$passphrase .= rand(0,9);
		}

		// add special character
		if($settings->hasSpclChar){
			$spclChar = GeneratorSettings::$possibleSpclChar;
			$passphrase .= $spclChar[rand(0, count($spclChar)-1)];
		}


		return $passphrase;
	}
}

?>