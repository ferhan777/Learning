<?php
try {
    require_once 'includes/mysqli_connect.php';
    $sql = 'SELECT name FROM names';
    $db->real_query($sql);
    $result = $db->store_result(); // we can use the use_result method too but no further query supported
    if (!$result) {
        $error = "Error generated by first query: $db->error";
    }
    $result2 = $db->query('SELECT * FROM savings');
    if (!$result2) {
        $error = "Error generated by second query: $db->error";
    }
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>MySQLi: Unbuffered Query</title>
    <link rel="stylesheet" href="includes/styles.css" type="text/css">
</head>
<body>
<h1>MySQLi: Using real_query()</h1>
<?php if (isset($error)) {
    echo "<p>$error</p>";
} else { ?>
    <ul>
        <?php while ($row = $result->fetch_assoc()) {
            echo '<li>' . $row['name'] . '</li>';
        } ?>
    </ul>
    <table>
        <tr>
            <th>Name</th>
            <th>Balance</th>
        </tr>
        <?php while ($row = $result2->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td>$<?php echo number_format($row['balance'], 2); ?></td>
            </tr>
        <?php } ?>
    </table>
<?php
} // end else
$db->close();
?>
</body>
</html>