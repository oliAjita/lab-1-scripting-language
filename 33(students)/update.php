<?php
require_once "db.php";

$id = (int)($_GET['id'] ?? 0);
$fields = ['name','course_id','fee','rollno','phone','address','dob','status'];
$data = array_fill_keys($fields, "");
$err = [];

try {
    $sql = "SELECT * FROM students WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        extract($data); 
    } else {
        die("Record not found");
    }
} catch (Exception $ex) {
    die("Connection error: " . $ex->getMessage());
}

// handle form submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($fields as $f) {
        if (!empty(trim($_POST[$f] ?? ""))) {
            $data[$f] = trim($_POST[$f]);
        } else {
            $err[$f] = "Please enter/select $f.";
        }
    }

    if (!$err) {
        $now = date('Y-m-d H:i:s');
        $stmt = $conn->prepare("UPDATE students SET 
            name=?, course_id=?, fee=?, rollno=?, phone=?, address=?, dob=?, status=?, updated_at=? 
            WHERE id=?");
        $stmt->bind_param(
            "sidssssssi",
            $data['name'],
            $data['course_id'],
            $data['fee'],
            $data['rollno'],
            $data['phone'],
            $data['address'],
            $data['dob'],
            $data['status'],
            $now,
            $id
        );

        echo $stmt->execute()
            ? "<p style='color:green;'>Update success</p>"
            : "<p style='color:red;'>Update failed</p>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <style>.error{color:red;}label{display:block;margin-top:10px;}</style>
</head>
<body>
<h2>Edit Student</h2>
<form method="post">
    <?php foreach (['name'=>'Name','course_id'=>'Course ID','fee'=>'Fee','rollno'=>'Roll No','phone'=>'Phone','address'=>'Address','dob'=>'Date of Birth'] as $f=>$label): ?>
        <label><?= $label ?>:
            <input type="<?= $f=='dob'?'date':'text' ?>" name="<?= $f ?>" value="<?= htmlspecialchars($data[$f]) ?>">
            <span class="error"><?= $err[$f] ?? '' ?></span>
        </label>
    <?php endforeach; ?>

    <label>Status:
        <select name="status">
            <option value="">Select</option>
            <option value="active" <?= $data['status']=='active'?'selected':'' ?>>Active</option>
            <option value="inactive" <?= $data['status']=='inactive'?'selected':'' ?>>Inactive</option>
        </select>
        <span class="error"><?= $err['status'] ?? '' ?></span>
    </label>

    <br><input type="submit" value="Update">
</form>
</body>
</html>
