<?php
 try {
 	require_once 'includes/pdo_connect.php';
 	/* immediately after including the database we can set to show pdo exception message rather than using
       errorInfo(); just include $db->setAttribute(PDO::ATTR_ERMODE,PDO::ERRMODE_EXCEPTION) but errorInfo is more user friendly
 	*/
 	$sql = 'SELECT name,meaning,gender FROM names
 	         ORDER BY name';
 	$result = $db->query($sql);
 	$errorInfo = $db->errorInfo();
 	if(isset($errorInfo[2])){
 		$error = $errorInfo[2];
 	}
 	         
 } catch (Exception $e) {
 	$error = $e->getMessage();
 }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PDO : Select Loop</title>
	<link rel="stylesheet" type="text/css" href="includes/styles/styles.css">
</head>
<body>
<h1>PDO : Fetching the next row</h1>
<?php
 if (isset($error)) {
 	echo "<p>{$error}</p>";
 }else{
?>
<table>
	<tr>
		<th> Name </th>
		<th> Meaning </th>
		<th> Gender </th>
	</tr>
	<?php while($row = $result->fetch()){ ?>
	<tr>
		<td><?php echo $row[0];?></td>
		<td><?php echo $row['meaning'];?></td>
		<td><?php echo $row['gender'];?></td>
	</tr>
<?php } ?>
</table>
<?php } //end else ?>
</body>
</html>