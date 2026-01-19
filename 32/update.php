<?php
$err = [];
$id = $_GET['id'] ?? 'null';
try {
    $con = new mysqli('localhost', 'root', '', 'scripting_language');
    $sql = "SELECT * FROM record WHERE id = $id";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        extract($data);
    } else {
        die("Book not found");
    }
} catch (Exception $ex) {
    die("Connection error: " . $ex->getMessage());
}

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

    if (!empty($_FILES['image']['name'])) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) mkdir($targetDir);
        $image = time() . "_" . basename($_FILES['image']['name']);
        $targetFile = $targetDir . $image;

        if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $err = "Image upload failed!";
        }
    }

    if (count($err) == 0) {
        try {
            $con = new mysqli('localhost', 'root', '', 'scripting_language');
            $sql = "UPDATE record SET 
                        name='$name', 
                        rank='$rank', 
                        status='$status',
                        image='$image',
                        created_by='$created_by',
                        updated_by='$updated_by'
                    WHERE id=$id";

            $con->query($sql);

            if ($con->affected_rows == 1) {
                echo "Update success";
            } else {
                echo "Update failed";
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
    <title>Edit Member</title>
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
    <h2>Edit Record</h2>
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
