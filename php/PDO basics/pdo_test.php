<?php
 try {
 	require_once 'includes/pdo_connect.php';
  	
  } catch (Exception $e) {
  	$error = $e->getMessage();
  } 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Connecting with PDO</title>
</head>
<body>
  <h1>Connecting with PDO</h1>
  <?php
   if($db){
   	echo "<p>Connection Succeful.</p>";
   }elseif (isset($error)) {
   	echo "<p>{$error}</p>";
   } 
  ?>
</body>
</html>