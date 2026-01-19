<?php
require_once "db.php";

$err = [];
$title = $duration = $status = "";
$id = "";

/* 1. Get course ID from URL */
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $result = $conn->query("SELECT * FROM courses WHERE id = $id");

    if ($result->num_rows == 1) {
        $course = $result->fetch_assoc();
        $title = $course['title'];
        $duration = $course['duration'];
        $status = $course['status'];
    } else {
        die("Course not found.");
    }
} else {
    die("Invalid course ID.");
}

/* 2. Handle form submit */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['title']) && !empty(trim($_POST['title']))) {
        $title = trim($_POST['title']);
    } else {
        $err['title'] = "Please enter the course title.";
    }

    if (isset($_POST['duration']) && !empty(trim($_POST['duration']))) {
        $duration = trim($_POST['duration']);
    } else {
        $err['duration'] = "Please enter the duration.";
    }

    if (isset($_POST['status']) && !empty(trim($_POST['status']))) {
        $status = trim($_POST['status']);
    } else {
        $err['status'] = "Please enter the status.";
    }

    if (count($err) == 0) {
        $now = date('Y-m-d H:i:s');

        $sql = "UPDATE courses 
                SET title='$title', 
                    duration='$duration', 
                    status='$status', 
                    updated_at='$now'
                WHERE id=$id";

        $conn->query($sql);

        if ($conn->affected_rows == 1) {
            echo "<p style='color:green;'>Course updated successfully!</p>";
        } else {
            echo "<p style='color:red;'>No changes made or error occurred.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Course</title>
    <style>
        .error { color: red; }
        label { display: block; margin-top: 10px; }
    </style>
</head>
<body>

<h2>Update Course</h2>

<form method="post">
    <label>Title:
        <input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>">
        <span class="error"><?php echo $err['title'] ?? ''; ?></span>
    </label>

    <label>Duration:
        <input type="text" name="duration" value="<?php echo htmlspecialchars($duration); ?>">
        <span class="error"><?php echo $err['duration'] ?? ''; ?></span>
    </label>

    <label>Status:
        <select name="status">
            <option value="">Select</option>
            <option value="active" <?php if ($status == 'active') echo 'selected'; ?>>Active</option>
            <option value="inactive" <?php if ($status == 'inactive') echo 'selected'; ?>>Inactive</option>
        </select>
        <span class="error"><?php echo $err['status'] ?? ''; ?></span>
    </label>

    <br>
    <input type="submit" value="Update">
</form>

</body>
</html>
    