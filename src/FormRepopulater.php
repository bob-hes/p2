<?php

/**
 * Helps makes repopulating a form easier.
 * Methods match the names of the type of input, and
 * echo the repetitive attributes of the input such as
 * the type of input, name, and the default value.
 */
class FormRepopulater{

	// Data to repopulate with.
	// While repopulating, if a field exists as a
	// key here then the value of 
	// that key will repopulate that data
	private $repopulateInfo = [];

	/**
	 * [__construct description]
	 * @param [type] $array [description]
	 */
	public function __construct($array=null){
		if(!empty($array)){
			$this->repopulateInfo = $array;
		}
	}

	/**
	 * Checks to see if there is data for this field
	 * to repopulate with
	 * 
	 * @param  String $name - fieldname to check
	 * @return boolean - true if there is data to repopulate
	 * this field; false otherwise
	 */
	private function haveRepop($name){
		if(isset($this->repopulateInfo[$name])){
			return true;
		}
		return false;
	}

	/**
	 * Creates the definite attributes of a text
	 * input type and repopulates it
	 * 
	 * @param  String $name    - fieldname
	 * @param  String $default - default text
	 * @return string - type, name, and default value of the input
	 */
	public function text($name, $default=""){
		
		if($this->haveRepop($name)){
			$default = $this->repopulateInfo[$name];
		}

		echo " type='text' name='$name' value='$default' ";
	}

	/**
	 * Creates the definite attributes of a number
	 * input type and repopulates it
	 * 
	 * @param  String $name    - fieldname
	 * @param  String $default - default number to start
	 * @return string - type, name, and default value of the input
	 */
	public function number($name, $default=""){
		
		if($this->haveRepop($name)){
			$default = $this->repopulateInfo[$name];
		}

		echo " type='number' name='$name' value='$default' ";
	}

	/**
	 * Creates the definite attributes of a checkbox input
	 * type and repopulates it
	 * 
	 * @param  string $name    - fieldname
	 * @param  string $checked - blank if unchecked. equal to string "checked" if checked
	 * @return string - type, name, and "checked" attributes for checkbox
	 */
	public function checkbox($name, $checked=""){

		if($this->haveRepop($name)){
			if($this->repopulateInfo[$name] === "on"){
				$checked = "checked";
			}
		}

		echo " type='checkbox' name='$name' $checked ";
	}

}

?>