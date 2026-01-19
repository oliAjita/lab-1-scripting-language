<?php
try {
    $con = new mysqli('localhost', 'root', '', 'scripting_language');
    $sql = "SELECT * FROM record ORDER BY name";
    $result = $con->query($sql);
    $data = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }
    } else {
        echo "No record found.";
    }
} catch (Exception $ex) {
    die("Connection error: " . $ex->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Records List</title>
</head>
<body>
    <h2>Records</h2>
    <a href="insert.php">Add Record</a>
    <table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th> <th>Name</th> <th>Rank</th> <th>Status</th>
        <th>Image</th> <th>Created By</th> <th>Updated By</th>
        <th>Created At</th> <th>Updated At</th> <th>Actions</th>
    </tr>
    <?php foreach ($data as $record) { ?>
        <tr>
            <td><?php echo ($record['id']); ?></td>
            <td><?php echo ($record['name']); ?></td>
            <td><?php echo ($record['rank']); ?></td>
            <td><?php echo ($record['status']); ?></td>
            <td><?php echo ($record['image']); ?></td>
            <td><?php echo ($record['created_by']); ?></td>
            <td><?php echo ($record['updated_by']); ?></td>
            <td><?php echo ($record['created_at']); ?></td>
            <td><?php echo ($record['updated_at']); ?></td>
            
            <td><a href="update.php?id=<?php echo $record['id']; ?>">Edit</a>
            <a href="delete.php?id=<?php echo $record['id']; ?>">Delete</a> </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>