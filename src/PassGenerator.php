<?php

require "GeneratorSettings.php";

/**
 * 
 */
class PassGenerator{

	private $settings;

	public function __construct(GeneratorSettings $settings){
		$this->settings = $settings;
	}

	public function generate(){
		$delimiter = "-";
		$chosenWords = [];
		$wordlist = $this->settings->wordlist;

		// Randomly pick a new word to go in sequence
		for($i = 0; $i < 4; $i++){
			$random_i = rand(0, count($wordlist)-1);
			$chosenWords[] = $wordlist[$random_i];
		}

		return implode("-", $chosenWords);		
	}
}

?>