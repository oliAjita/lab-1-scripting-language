<?php
include "db.php";
try {
    $sql = "SELECT * FROM courses ORDER BY title";
    $result = $conn->query($sql);
    $data = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }
    } else {
        echo "<p style='color:red;'>No courses found.</p>";
    }
} catch (Exception $ex) {
    die("Connection error: " . $ex->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Course List</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <h1>List of Courses</h1>
    <a href="create.php">Add Course</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Duration</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php foreach ($data as $course) { ?>
        <tr>
            <td><?php echo $course['id']; ?></td>
            <td><?php echo $course['title']; ?></td>
            <td><?php echo $course['duration']; ?></td>
            <td><?php echo $course['status']; ?></td>
            <td>
                <a href="update.php?id=<?php echo $course['id']; ?>">Edit</a> | 
                <a href="delete.php?id=<?php echo $course['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
