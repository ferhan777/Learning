 <?php
 try {
 	require_once 'db_connect.php';
 	$sql = 'SELECT * FROM names ORDER BY id';
 	$result = $db->query($sql);
  $names_set = $result->fetchAll();
    //print_r($names_set); die();
    $result->closeCursor();
 	
 } catch (Exception $e) {
 	$error = $e->getMessage();
 }//closing of catch block
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Names List</title>
	<style>

     thead {color: green;}
     tbody {color: blue;}
     tfoot {color: red;}

     table, th, td {
       border: 1px solid black;
     }
    </style>
</head>
<body>
 <?php if($names_set){?>
 <table>
 	<thead>
 		<tr>
 			<th>Name</th>
 		    <th>Meaning</th>
 		    <th>Gender</th>
 		    <th>Actions</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php foreach ($names_set as $row) : ?>
 			
 		
 		<tr>
 			<td><?php echo $row['name'];?></td>
 			<td><?php echo $row['meaning'];?></td>
 			<td><?php echo $row['gender'];?></td>
 			<td>
 				<a href="edit_name.php?name_id=<?php echo $row['id'];?>">Edit</a>
 				/
 				<a href="delete_name.php?name_id=<?php echo $row['id']?>">Delete</a>
 			</td>
 		</tr>
 	</tbody>
 <?php endforeach; ?>
 	<tfoot>
 		<tr>
 			<td colspan="3" align="center">@2021</td>
 		</tr>
 	</tfoot>
 </table>
 <?php }else{ echo "<p>Names Table is Empty</p>"; }?>
 <p><a href="insert_names.php">Insert New Name ?</a></p>
</body>
</html>