<?php

if(isset($_POST) && !empty($_POST['submit'])){
 try {
 	require_once 'db_connect.php';
 	
 	$name = filter_input(INPUT_POST, 'name');
  $meaning = filter_input(INPUT_POST, 'meaning');
  $gender = filter_input(INPUT_POST, 'gender');

  $sql = 'INSERT INTO names(name,meaning,gender) VALUES (:name,:meaning,:gender)';
  $stmt = $db->prepare($sql);
  //$stmt->bindValue(':name',$name);
  //$stmt->bindValue(':meaning',$meaning);
  //$stmt->bindValue(':gender',$gender);
  $values = [':name' => $name,':meaning' => $meaning,':gender' =>$gender];
  $stmt->execute($values);
  $stmt->closeCursor();
  $errorInfo = $stmt->errorInfo();// the property of $stmt object not $db object
  if (isset($errorInfo[2])) {
  	$error = $errorInfo[2];
  }else{
  	echo "you have successfully added the name to database";
  	header( "refresh:5;url=names_list.php" );
  }

 } catch (Exception $e) {
 	$error = $e->getMessage();
 }
}//closing of if

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Insert Names</title>
</head>
<body>
	<?php if(isset($error)){echo "<p>{$error}</p?";} ?>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="add_names_form">
  	<label> Name : </label>
  	<input type="text" name="name"><br><br>
  	<label> Meaning : </label>
  	<input type="text" name="meaning"><br><br>
  	
  	<label> Gender : </label>
  	<input type="radio" name="gender" id="girl" value="girl" checked>
  	<label for="girl">Girl</label>
  	<input type="radio" name="gender" id="boy" value="boy">
  	<label for="boy">Boy</label>
  	<input type="radio" name="gender" id="unisex" value="unisex">
  	<label for="unisex">Unisex</label><br><br>

  	<input type="submit" name="submit" value="Add Name">
  	<input type="reset" name="reset">

  </form>
  <p> <a href="names_list.php">View all Names</a></p>
</body>
</html>