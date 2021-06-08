<?php
 try {
 	require_once 'includes/pdo_connect.php';
 	$sql = 'SELECT name,meaning,gender FROM names
 	         ORDER BY name';
 	$result = $db->query($sql);
 	         
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
<h1>PDO : Fetching a column</h1>
<?php
 if (isset($error)) {
 	echo "<p>{$error}</p>";
 }
?>
<table>
	<tr>
		<th>Column</th>
	</tr>
	<?php while($col = $result->fetchColumn(1)){?>
	<tr>
		<td><?php echo $col; ?></td>
	</tr>
<?php } ?>
</table>

</body>
</html>