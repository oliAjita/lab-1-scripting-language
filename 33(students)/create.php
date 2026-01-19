<?php 
require_once "db.php";  
$err = [];
$fields = ['name','course_id','fee','rollno','phone','address','dob','status'];
$data = array_fill_keys($fields, "");

// fetch courses
$courses = $conn->query("SELECT id, title FROM courses");

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
        $sql = "INSERT INTO students 
                (name, course_id, fee, rollno, phone, address, dob, status, created_at, updated_at) 
                VALUES ('{$data['name']}','{$data['course_id']}','{$data['fee']}','{$data['rollno']}',
                        '{$data['phone']}','{$data['address']}','{$data['dob']}','{$data['status']}','$now','$now')";
        $conn->query($sql);
        echo $conn->affected_rows == 1 
             ? "<p style='color:green;'>Student added successfully!</p>" 
             : "<p style='color:red;'>Error while adding student.</p>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <style>.error{color:red;}label{display:block;margin-top:10px;}</style>
</head>
<body>
<h2>Add Student</h2>
<form method="post">
    <?php foreach (['name'=>'Name','fee'=>'Fee','rollno'=>'Roll No','phone'=>'Phone','address'=>'Address','dob'=>'Date of Birth'] as $f=>$label): ?>
        <label><?= $label ?>:
            <input type="<?= $f=='dob'?'date':'text' ?>" name="<?= $f ?>" value="<?= htmlspecialchars($data[$f]) ?>">
            <span class="error"><?= $err[$f]??'' ?></span>
        </label>
    <?php endforeach; ?>

    <label>Course:
        <select name="course_id">
            <option value="">Select</option>
            <?php while ($row = $courses->fetch_assoc()): ?>
                <option value="<?= $row['id'] ?>" <?= $data['course_id']==$row['id']?'selected':'' ?>>
                    <?= htmlspecialchars($row['title']) ?>
                </option>
            <?php endwhile; ?>
        </select>
        <span class="error"><?= $err['course_id']??'' ?></span>
    </label>

    <label>Status:
        <select name="status">
            <option value="">Select</option>
            <option value="active" <?= $data['status']=='active'?'selected':'' ?>>Active</option>
            <option value="inactive" <?= $data['status']=='inactive'?'selected':'' ?>>Inactive</option>
        </select>
        <span class="error"><?= $err['status']??'' ?></span>
    </label>
    <br><input type="submit" value="Save">
</form>
</body>
</html>
