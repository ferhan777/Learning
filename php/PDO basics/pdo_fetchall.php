<?php
 try {
 	require_once 'includes/pdo_connect.php';
 	$sql = 'SELECT name,meaning,gender FROM names
 	         ORDER BY name';
 	$result = $db->query($sql);
 	$all = $result->fetchAll(PDO::FETCH_ASSOC);/* using argument to get what we need.. otherwise array is large with numbered index as well as associative array we can use FETCH_NUM to return indexed array with num*/
 	         
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
<h1>PDO : Fetching all the rows together and return as MD array</h1>
<?php
 if (isset($error)) {
 	echo "<p>{$error}</p>";
 }
?>
<pre>
	<?php print_r($all); ?>
</pre>
</body>
</html>