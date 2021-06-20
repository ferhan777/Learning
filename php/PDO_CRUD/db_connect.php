<?php

 define('DB_USER', 'root');
 define('DB_PASSWORD','root');

 $dsn = 'mysql:host=localhost;dbname=oophp';
 try {
 	$db = new PDO($dsn,DB_USER,DB_PASSWORD);
 } catch (PDOException $e) {
 	$err_msg = $e->getMessage();
 	include('db_error.php');
 	exit();

 }
?>