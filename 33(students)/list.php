<?php
include "db.php";
try {
    $sql = "SELECT * FROM students ORDER BY name";
    $result = $conn->query($sql);
    $data = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }
    } else {
        echo "<p style='color:red;'>No students found.</p>";
    }
} catch (Exception $ex) {
    die("Connection error: " . $ex->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
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
    <h1>List of Students</h1>
    <a href="create_student.php">Add Student</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Course ID</th>
            <th>Fee</th>
            <th>Roll No</th>
            <th>Phone</th>
            <th>Address</th>
            <th>DOB</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
        </tr>
        <?php foreach ($data as $s): ?>
    <tr>
        <td><?= $s['id'] ?></td>
        <td><?= htmlspecialchars($s['name']) ?></td>
        <td><?= $s['course_id'] ?></td>
        <td><?= $s['fee'] ?></td>
        <td><?= $s['rollno'] ?></td>
        <td><?= htmlspecialchars($s['phone']) ?></td>
        <td><?= htmlspecialchars($s['address']) ?></td>
        <td><?= $s['dob'] ?></td>
        <td><?= $s['status'] ?></td>
        <td><?= $s['created_at'] ?></td>
        <td><?= $s['updated_at'] ?></td>
        <td>
            <a href="update.php?id=<?= $s['id'] ?>">Edit</a> | 
            <a href="delete.php?id=<?= $s['id'] ?>">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
    </table>
</body>
</html>
