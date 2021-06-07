
<?php
/*
 Epoch time/ UNIX timestamp
 zero is january 1 1970

 make a unix timestamp
 time() current time
 mktime($h,$m,$s,$m,$d,$yr) will return a unix timestamp with specified period
 strtotime($any_string);
 checkdate() can be used to verify whether a date exist or not


 format a UNIX timestamp  2 method
 date($format,$timestamp)
 strftime($format,$timestamp)

*/
 $timestamp = time();
 echo strftime("The date today is %m/%d/%y");
 echo "<hr>"; 


#MySql timedate format 

 $dt = time();
 $mysql_datetime = strftime("%Y-%m-%d %H:%M:%S",$dt);
 echo $mysql_datetime;
?>
