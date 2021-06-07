<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>References as function argument</title>
</head>
<body>
 <?php
  function ref_test(&$var){
  	$var = $var * 2;
  }

  $a = 10;
  ref_test($a);
  echo $a;
  echo "<br/><br/><hr>";

  echo "<span>References as function return values</span>";
  
  function &ref_return(){ //& sign is used to return the reference not the value
  	global $num;
  	$num = $num * 2;
  	return $num;
  }
  $num = 10;
  $b =& ref_return(); //& its important to have both & when we need reference as return 
  echo "<br/>the number is {$num} and b is {$b}";
  $b = 30;
  echo "<br/>the number is {$num} and b is {$b}<br>";

  function &increment(){
  	static $var = 0;
  	$var++;
  	return $var;
  }
  $c =& increment(); //var increment
  increment();
  $c++;
  increment();
  echo $c;
 ?>
</body>
</html>