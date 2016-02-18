<?php

require_once "GeneratorSettings.php";

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
		$chosenWords = [];
		$wordlist = $settings->wordlist;
		$numWords = $settings->numWords;

		// Randomly pick a new word to go in sequence
		for($i = 0; $i < $numWords; $i++){
			$random_i = rand(0, count($wordlist)-1);
			$chosenWords[] = $wordlist[$random_i];
		}

		// Combine words with delimiter
		$passphrase = implode($settings->seperator, $chosenWords);	

		// First Upper Case
		if($settings->uc1st){
			$passphrase = ucfirst($passphrase);
		}
		

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