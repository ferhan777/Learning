<?php
 try {
 	require_once 'includes/pdo_connect.php';
 	$count = $db->query('SELECT COUNT(*) FROM names');
 	$numrows = $count->fetchColumn();//portable method to check numrows
 	if($numrows){
 	$sql = 'SELECT name,meaning,gender FROM names
 	         ORDER BY name';
 	$result = $db->query($sql);
     }
 	//$numrows = $result->rowCount();//sqlite wont return count.
 	         
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
<h1>PDO : Counting Rows in a result set</h1>
<?php
 if (isset($error)) {
 	echo "<p>{$error}</p>";
 }
 echo "<p>The total result found : {$numrows}</p>";
 if($numrows){
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
<?php } ?>
</body>
</html>