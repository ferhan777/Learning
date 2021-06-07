<?php
 /**
   * 
   */
  class Person 
  {
  	
  	/*function __construct(argument)
  	{
  		// code...
  	}*/

  }//end of class
  

  /*$classes = get_declared_classes();
  
  foreach ($classes as $class) {
   	echo $class."<br>";
   }//end of foreach
   */

   if (class_exists("Person")) {
   	echo "Class Person is defined";
   }else{
   	echo "Class Person not defined";
   }

    
?>