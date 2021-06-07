<?php
 /**
  * 
  */
 class Person{
 	
 	function say_hello(){
 		echo "Hello from inside the class Person.<br/>";
 	}
 	
 }//end of class

 $methods = get_class_methods('Person');
 foreach ($methods as $method) {
 	echo $method."<br/>";
 }

 /*if (method_exists('Person','say_hello')) {

 	echo "say_hello method exist in class Person <br/>";
 }*/
 echo method_exists('Person', 'say_hello') ? "method exist" : "not exist";
?>