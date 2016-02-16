<?php
require_once "InputValidator.php";

/**
 * Configuration of settings to be given to the password generator.
 * Also, validates any changes to the settings using an InputValidator. 
 * Allows more flexibility to add new setting properties
 * unlike making a single generate() function and 
 * passing in all these settings as individual arguments.
 *
 * Validator function names will match the property name
 * that is being validated
 */
class GeneratorSettings{

	// Default Properties
	// - Note: Private properties are accessed through magic methods in
	// order for more control over the setting of properties.
	// - Private properties are also in array format to easily check if a
	// valid property name is being accessed.
	// - Properties may also be set with a set<Property Name>() method as long as
	// the property name begins with lowercase letter.
	private $conf = [
		"wordlist" => ["a","bb","ccc","dddd"],
		"numWords" => 4,
		"hasNum" => false,
		"hasSpclChar" => false,
		"delimiter" => "-",
		"validator" => null
	];

	/**
	 * When initializing, a validator could be passed in. However, 
	 * if not, a default validator from InputValidator will be used.
	 * 
	 * @param InputValidator $ownValidator - has a bunch of functions that
	 * share the same name as the set of properties needed to be validated
	 */
	public function __construct($ownValidator=null){
		
		// Create default validator if no validator provided
		if($ownValidator === null){
			$this->validator = new InputValidator();
		}

		// Validator provided but not of the right type
		else if(!empty($ownValidator) && gettype($ownValidator) !== "InputValidator"){
			throw new InvalidArgumentException("GeneratorSettings only accepts InputValidator in initializing");
		}
	}

	/**
	 * Configures the settings from the array. Only 
	 * keys that match the same name as the properties in
	 * this class will change the configurations. Properties
	 * not found in this class but found in the array will be
	 * skipped.
	 * 
	 * @param String[] -> String $arr - an array, most likely $_GET or $_POST 
	 * or derived from $_GET or $_POST, that will hold the settings wanted to be
	 * changed. Any array key not found as a property will be skipped.
	 */
	public function setFromArray($arr){
		foreach ($arr as $fieldname => $value) {
			if(array_key_exists($fieldname, $this->conf)){
				$this->$fieldname = $value;
			}
		}

		return $this;
	}

	/**
	 * Used by the overriding __get() and __set methods to
	 * check if a property exists in the $conf array.
	 * Throws an exception if not found.
	 * 
	 * @param  String $prop - name of property to check
	 * @throws Basic Exception saying the property does
	 * not exst
	 */
	private function checkPropExists($prop){
		if(!array_key_exists($prop, $this->conf)){
			throw new Exception("Property $name does not exist");
		}
	}


	/**
	 * Overriding method that automatically creates a
	 * setter for each of the properties found in $conf.
	 * Properties that need to be validated while being set
	 * will share the same name as functions found in the validator.
	 * 
	 * @param String $name  - name of property checked to be validated
	 * @param Multi $value - value to set property $name to and be validated
	 */
	public function __set($name, $value){
		$this->checkPropExists($name);

		// Validate if validator method is found
		if(method_exists($this->validator, $name)){
			$this->conf["validator"]->$name($value);
		}

		$this->conf[$name] = $value;
	}

	/**
	 * Overriding method that creates getters for each
	 * of the properties found in $conf.
	 * 
	 * @param  String $name - field name of property who's value 
	 * will be accessed
	 * 
	 * @return Mixed - value found in the $conf array
	 */
	public function __get($name){
		$this->checkPropExists($name);
		return $this->conf[$name];
	}


	/**
	 * __call is used to set up setters for each of the properties
	 * so that one can set multiple properties at once like so:
	 *
	 * $settings->setNumWords(4)
	 * 			->setHasNum(true)
	 * 			->setHasSpclChar(true);
	 *
	 * Will only accept methods of the "set<PropertyName>()" type.
	 * Property should have a lower case in the $conf array already.
	 * 
	 * @param  String $name      - function name that should start with "set"
	 * @param  Array  $arguments - a single argument will only be accepted
	 * 
	 * @return GeneratorSettings - this instance will be returned to make
	 * setting multiple properties easier
	 */
	public function __call($name, $arguments){

		// 1) check if function name is even long enough
		if(strlen($name) > 3){

			$isToSet = substr($name, 0, 3) === "set";
			$has1Argu = count($arguments) === 1;

			// 2) Check if function name is "set<PropertyName>" type
			// 	  and has only 1 argument
			if($isToSet && $has1Argu){
				$property = lcfirst(substr($name, 3));
				$this->$property = $arguments[0];
				return $this;
			}
		}

		throw new BadMethodCallException();
	}


	/**
	 * Checks to see if any of the settings were set
	 * to something invalid. If anything is invalid, calling
	 * invalidInputs() will reveal the properties set to invalid
	 * settings as well as the messages of why they are invalid
	 * 
	 * @return boolean - true if no invalid settings.
	 * False if otherwise.
	 */
	public function isValid(){
		return $this->validator->valid;
	}

	/**
	 * Returns the list of invalid properties as well
	 * as the messages that explain why they are invalid
	 *
	 * @return String[] -> String - The array returned should be
	 * in the form of:
	 *
	 * array[InvalidPropertyName] = "Message of invalid name";
	 *
	 * where the keys are the invalid properties and the values
	 * are the explanations of the invalid property
	 */
	public function getInvalids(){
		return $this->validator->inputsInvalid;
	}


	// Possible Special Characters
	// According to University of Wisconsin-Madison https://kb.wisc.edu/page.php?id=4073
	public static $possibleSpclChar = ["!", "\"", "#","$","%","&","'","(",")","*","+",",","-",".","/",":",";", "<","=",">","?","@","[","\\","]","^","_","`","{","|","}","~"];
}




?>