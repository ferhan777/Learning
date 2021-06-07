<?php
/**
 * 
 */
class Person{
	
	function say_hello(){ // functions inside a class is called method even though we use keyword function
		echo "Hello from inside the class person <br/><br/>";
	}
	
}//end of the class
$person = new Person();
$person->say_hello();

echo get_class($person) . "<br>";// return the object of the instance
if (is_a($person,'Person')) {
	echo "Yup its a person";
}else{
	echo "not a person";
}
?>