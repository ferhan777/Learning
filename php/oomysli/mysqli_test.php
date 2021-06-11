<?php
 try {
 	require_once 'includes/mysqli_connect.php';
 } catch (Exception $e) {
 	$error = $e->getMessage();
 }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>MySqli connection</title>
	<link rel="stylesheet" type="text/css" href="includes/styles.css">
</head>
<body>
 <h2>Connecting with MySqli</h2>
 <?php
  if (isset($error)) {
   	echo "<p>{$error}</p>";
   }else{
   	echo "<p>Connection successful</p>";
   }
   $db->close(); 
 ?>
</body>
</html>