<?php
/**
 * 
 */
class Person{

	var $first_name; //inside a class we should use the keyword var for creating variables.
	var $last_name; // These are called class properties or attributes.

	var $arm_count = 2;
	var $leg_count = 2;
	
	function say_hello(){ // functions inside a class is called method even though we use keyword function
		echo "Hello from inside the class : ".get_class($this)."<br/><br/>";
	}

	function hello(){
		$this->say_hello();
	}

	function full_name(){

		return $this->first_name ." ". $this->last_name;
	}
	
}//end of the class

$person = new Person();
#$person -> say_hello();
#$person -> hello();
//echo $person->arm_count;
echo "<br>";
$person->first_name="Muhammed";
$person->last_name = "Ferhan";
echo $person->full_name() . "<br>";

$vars = get_class_vars('Person');
foreach ($vars as $var=>$value) {
	echo "{$var} => {$value}<br/>";
}


?>