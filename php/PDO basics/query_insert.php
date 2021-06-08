<?php
 try {
 	require_once 'includes/pdo_connect.php';
    $sql = 'INSERT INTO names(name,meaning,gender) 
            VALUES ("William","resolute guardian","boy")';

    //$result = $db->query($sql);
    //echo $result->queryString; // to know the query string
   /* we can use the exec() instead of the query() method to know about affected rows/data inserted*/
   $affected = $db->exec($sql); // returns an integer 1.. means one row affected
   echo $affected .' Row inserted with ID '.$db->lastInsertID(); //lastInsertID wont work in all db

 }catch (Exception $e) {
 	$error = $e->getMessage();
 }
 if (isset($error)) {
     echo $error;
 }
?>