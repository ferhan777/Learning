<?php
 
 require_once 'db_connect.php';
 if (isset($_GET['name_id'])) {
    
 
   $name_id = $_GET['name_id'];
   $name_query = "SELECT name,meaning,gender FROM names WHERE id = $name_id";
   $result = $db->query($name_query);
   $name_set = $result->fetchAll(PDO::FETCH_ASSOC);
 //print_r($name_set); die();
   foreach ($name_set as $detail) {
     $name = $detail['name'];
     $meaning = $detail['meaning'];
     $gender = $detail['gender'];

   }
}//end of if and form populating variables   
 
 
## new edit processing starts here
if(isset($_POST) && !empty($_POST['submit'])){
 try {
    require_once 'db_connect.php';
    
  $name = filter_input(INPUT_POST, 'name');
  $meaning = filter_input(INPUT_POST, 'meaning');
  $gender = filter_input(INPUT_POST, 'gender');
  $name_id = filter_input(INPUT_POST,'name_id');
  

  $sql = 'UPDATE names 
          SET name = :name,meaning = :meaning,gender = :gender WHERE id = :name_id';
  $stmt = $db->prepare($sql);
  //$stmt->bindValue(':name',$name);
  //$stmt->bindValue(':meaning',$meaning);
  //$stmt->bindValue(':gender',$gender);
  $values = [':name' => $name,':meaning' => $meaning,':gender' => $gender,':name_id' => $name_id];
  $stmt->execute($values);
  $stmt->closeCursor();
  $errorInfo = $stmt->errorInfo();// the property of $stmt object not $db object
  if (isset($errorInfo[2])) {
    $error = $errorInfo[2];
  }else{
    echo "<p>you have successfully updated the record refresh in 5 seconds...</p>";
    header( "refresh:4;url=names_list.php" );
    die();
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
    <input type="text" name="name" value="<?php echo $name;?>"><br><br>
    <label> Meaning : </label>
    <input type="text" name="meaning" value="<?php echo $meaning; ?>"><br><br>
    
    <label> Gender : </label>
    <input type="radio" name="gender" id="girl" value="girl" <?php if($gender=='girl'){echo "checked";}?>>
    <label for="girl">Girl</label>
    <input type="radio" name="gender" id="boy" value="boy" <?php if($gender=='boy'){echo "checked";}?>>
    <label for="boy">Boy</label>
    <input type="radio" name="gender" id="unisex" value="unisex" <?php if($gender=='unisex'){echo "checked";}?>>
    <label for="unisex">Unisex</label><br><br>
    <input type="hidden" name="name_id" value="<?php echo $name_id;?>">
    <input type="submit" name="submit" value="Update Name">
    <input type="reset" name="reset">

  </form>
  <p> <a href="names_list.php">View all Names</a></p>
</body>
</html>