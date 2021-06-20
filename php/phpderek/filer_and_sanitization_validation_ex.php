<?php
 if (isset($_POST['email'])) {
 	if(!filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL)){
     echo '<p>The email is not valid</p>';
 	}
 }

 if (isset($_POST['num1']) && !empty($_POST['num2'])) {
 	$num1=filter_input(INPUT_POST,'num1',FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
 	$num2=filter_input(INPUT_POST,'num2',FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
 	$output = sprintf("%.1f + %.1f = %.1f",$num1,$num2,($num1 + $num2));
 	echo htmlspecialchars($output)."<br>";

 	if (isset($_POST['website'])) {
 		$website = filter_input(INPUT_POST, "website",FILTER_VALIDATE_URL);
 		echo "Website : {$website}<br>";
 	}
 }
 #for more search filter validate or filter sanitize in php manual
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PHP tutorials</title>
</head>
<body>
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
 	<label>Email : </label>
 	<input type="text" name="email">
 	<label>Number 1 : </label>
 	<input type="text" name="num1">
 	<label>Number 2 : </label>
 	<input type="text" name="num2">
 	<label>Website : </label>
 	<input type="text" name="website">
 	<input type="submit" value="submit">
 </form>
</body>
</html>