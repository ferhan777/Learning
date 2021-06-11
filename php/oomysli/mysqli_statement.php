<?php
if (isset($_GET['search'])) {
    try {
        require_once 'includes/mysqli_connect.php';
        $sql = 'SELECT make, yearmade, mileage, price, description
                FROM cars
                LEFT JOIN makes USING (make_id)
                WHERE make LIKE ? AND yearmade >= ? AND price <= ?
                ORDER BY price';
        $stmt = $db->stmt_init();
        if (!$stmt->prepare($sql)) {
            $error = $stmt->error;
        } else {
            /* In mysqli prep statement we need to specify datatypes
               i for integer
               d for number with decimal
               s for string
               b for binary large object BLOB
            */
          /*we use a variable to add wild card like %.. no method like bindvalue of PDO.. so we need to  make it a variable*/     
          $make ='%'.$_GET['make'].'%';       
         $stmt->bind_param('sid',$make,$_GET['yearmade'],$_GET['price']);
         $stmt->execute();
         //$result = $stmt->get_result(); 
         //print_r($result); die();

         /*To bind the result we can use the following method
          $stmt->bind_result($maker,$year,$miles,$price,$desc);
          change $result object with $stmt in rest of the page and substitute the binded values
          $stmt->fetch() in the while loop also use $stmt->store_result() before the $numrows=$stmt->num_rows; 
         */

        }
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>MySQLi: Prepared Statement</title>
    <link rel="stylesheet" href="includes/styles.css">
</head>
<body>
<h1>MySQLi: Prepared Statement</h1>
<?php if (isset($error)) {
    echo "<p>$error</p>";
} ?>
<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
        <legend>Search for Cars</legend>
    <p>
        <label for="make">Make: </label>
        <input type="text" name="make" id="make">
        <label for="yearmade">Year (minimum): </label>
        <select name="yearmade" id="yearmade">
            <?php for ($y = 1970; $y <= 2010; $y+=5) {
                echo "<option>$y</option>";
            } ?>
        </select>
        <label for="price">Price (maximum): </label>
        <select name="price" id="price">
            <?php for ($p = 5000; $p <= 30000; $p+=5000) {
                echo "<option value='$p'";
                if ($p == 30000) {
                    echo ' selected';
                }
                echo '>$' . number_format($p) . '</option>';
            } ?>
        </select>
        <input type="submit" name="search" value="Search">
    </p>
    </fieldset>
</form>
<?php
if (isset($_GET['search'])) {
    $numrows = $result->num_rows;
    if (!$numrows) {
        echo '<p>No results found.</p>';
    } else {
        ?>
        <table>
            <tr>
                <th>Make</th>
                <th>Year</th>
                <th>Mileage</th>
                <th>Price</th>
                <th>Description</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['make']; ?></td>
                    <td><?php echo $row['yearmade']; ?></td>
                    <td><?php echo number_format($row['mileage']); ?></td>
                    <td>$<?php echo number_format($row['price'], 2); ?></td>
                    <td><?php echo $row['description']; ?></td>
                </tr>
            <?php }  ?>
        </table>
    <?php }
}
if (isset($db)) {
    $db->close();
}
?>
</body>
</html>