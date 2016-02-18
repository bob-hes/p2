<?php

/**
 * Checks to see if settings set by GeneratorSettings instance 
 * are valid for the PassGenerator to run.
 */
class InputValidator{

	public $valid = true;
	public $inputsInvalid = [];

	/**
	 * Flags this instance being checked as invalid and stores the
	 * invalid element along with a description
	 * 
	 * @param  String $fieldname    - name of field found to have invalid value
	 * @param  String $errorMessage - description of why field is invalid
	 */
	private function foundInvalid($fieldname, $errorMessage){
		$this->valid = false;
		$this->inputsInvalid[$fieldname] = $errorMessage;
	}


	/**
	 * Checks if the number of words in the passphrase is valid.
	 * 
	 * @param  Mixed $num - valid if integer between 2 and 15.
	 */
	public function numWords(&$num){
		$min = 2;
		$max = 15;

		// If number is string, switch to integer
		if(is_numeric($num) && gettype($num) === "string"){
			settype($num, "integer");
		}


		if(gettype($num) !== "integer"){
			$this->foundInvalid(__FUNCTION__, "Number of Words: Must be an integer.");
		}
		else if($num < $min || $num > $max){
			$this->foundInvalid(__FUNCTION__, "Number of Words: Must be more than $min and less than $max.");
		}
	}

	/**
	 * Checks for seperator to be 1 character at most
	 * 
	 * @param  Mixed $sep - seperator should be 1 char
	 */
	public function seperator(&$sep){

		if(strlen($sep) > 1){
			$this->foundInvalid(__FUNCTION__, "Seperator could only be 1 char.");
		}

	}

}

?>