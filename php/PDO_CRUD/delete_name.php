<?php
 $id=$_GET['name_id'];
 require_once 'db_connect.php';

 $sql = 'DELETE FROM names WHERE id=:id';
 //preparing statements
 $stmt = $db->prepare($sql);
 //$stmt->bindValue(':id',$id,PDO::PARAM_INT)
 
 $stmt->execute([':id' => $id]);
 
 echo $stmt->rowCount(). " Row deleted refreshing in 3 seconds ";
 header( "refresh:3;url=names_list.php" ); exit();

?>