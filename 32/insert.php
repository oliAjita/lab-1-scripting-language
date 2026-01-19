<?php
$err = [];
$name = $rank = $status = $image = "";
$created_by = $updated_by = "admin";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['name']) && !empty(trim($_POST['name']))) {
        $name = trim($_POST['name']);
    } else {
        $err['name'] = "Please enter the name.";
    }

    if (isset($_POST['rank']) && !empty(trim($_POST['rank']))) {
        $rank = trim($_POST['rank']);
    } else {
        $err['rank'] = "Please enter the rank.";
    }

    if (isset($_POST['status']) && in_array($_POST['status'], ['active','inactive'])) {
        $status = $_POST['status'];
    } else {
        $err['status'] = "Please select a valid status.";
    }

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        if ($_FILES['image']['size'] < 1024 * 1024) { 
            $file_formats = ['image/png', 'image/jpeg'];
            if (in_array($_FILES['image']['type'], $file_formats)) {
                $target = "uploads/" . basename($_FILES['image']['name']);
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                    $image = basename($_FILES['image']['name']);
                } else {
                    $err['image'] = "File upload failed.";
                }
            } else {
                $err['image'] = "Please upload a valid file format (jpeg, png).";
            }
        } else {
            $err['image'] = "Please select a file below 1MB.";
        }
    } else {
        $err['image'] = "Please upload an image.";
    }

    if (count($err) == 0) {
        try {
            $conn = new mysqli("localhost", "root", "", "scripting_language"); 
            $sql = "INSERT INTO record (name, rank, status, image, created_by, updated_by) 
                    VALUES ('$name', '$rank', '$status', '$image', '$created_by', '$updated_by')";
            $conn->query($sql);

            if ($conn->affected_rows == 1) {
                echo "<p style='color:green;'>Record added successfully!</p>";
            } else {
                echo "<p style='color:red;'>Error adding record.</p>";
            }
        } catch (Exception $ex) {
            die("Connection error: " . $ex->getMessage());
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Member</title>
    <style>
        .error { 
            color: red; 
        }
        label { 
            display: block; 
            margin-top: 10px; 
        }
    </style>
</head>
<body>
    <h2>Add Record</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Name:
            <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>">
            <span class="error"><?php echo $err['name'] ?? ''; ?></span>
        </label>

        <label>Rank:
            <input type="text" name="rank" value="<?php echo htmlspecialchars($rank); ?>">
            <span class="error"><?php echo $err['rank'] ?? ''; ?></span>
        </label>

        <label>Status:
            <select name="status">
                <option value="">Select</option>
                <option value="active" <?php if ($status=='active') echo 'selected'; ?>>Active</option>
                <option value="inactive" <?php if ($status=='inactive') echo 'selected'; ?>>Inactive</option>
            </select>
            <span class="error"><?php echo $err['status'] ?? ''; ?></span>
        </label>

        <label>Image:
            <input type="file" name="image">
            <span class="error"><?php echo $err['image'] ?? ''; ?></span>
        </label>

        <br>
        <input type="submit" value="Save">
    </form>
</body>
</html>
