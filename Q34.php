<?php
$result = "";
$name = $roll = $s1 = $s2 = $s3 = $s4 = $s5 = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $roll = htmlspecialchars($_POST['roll']);
    $s1 = floatval($_POST['s1']);
    $s2 = floatval($_POST['s2']);
    $s3 = floatval($_POST['s3']);
    $s4 = floatval($_POST['s4']);
    $s5 = floatval($_POST['s5']);
    $total = $s1 + $s2 + $s3 + $s4 + $s5;
    $percentage = round($total / 5, 2);

    if ($percentage >= 80) {
        $division = "Distinction";
    } elseif ($percentage >= 60) {
        $division = "First Division";
    } elseif ($percentage >= 45) {
        $division = "Second Division";
    } elseif ($percentage >= 35) {
        $division = "Third Division";
    } else {
        $division = "Fail";
    }

    $result = "
    <h2>Mark Sheet</h2>
    <table border='1' cellpadding='8' cellspacing='0' style='border-collapse:collapse;'>
        <tr><td><b>Name</b></td><td>$name</td></tr>
        <tr><td><b>Roll No</b></td><td>$roll</td></tr>
        <tr><td><b>English</b></td><td>$s1</td></tr>
        <tr><td><b>Science</b></td><td>$s2</td></tr>
        <tr><td><b>Maths</b></td><td>$s3</td></tr>
        <tr><td><b>Computer</b></td><td>$s4</td></tr>
        <tr><td><b>Account</b></td><td>$s5</td></tr>
        <tr><td><b>Total</b></td><td>$total</td></tr>
        <tr><td><b>Percentage</b></td><td>$percentage %</td></tr>
        <tr><td><b>Division</b></td><td>$division</td></tr>
    </table>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Mark Sheet</title>
</head>
<body>
    <h2>Enter Student Details</h2>
    <form method="post">
        Name: <input type="text" name="name" required value="<?= $name ?>"><br><br>
        Roll No: <input type="text" name="roll" required value="<?= $roll ?>"><br><br>
        English: <input type="number" name="s1" required value="<?= $s1 ?>"><br><br>
        Science: <input type="number" name="s2" required value="<?= $s2 ?>"><br><br>
        Maths: <input type="number" name="s3" required value="<?= $s3 ?>"><br><br>
        Computer: <input type="number" name="s4" required value="<?= $s4 ?>"><br><br>
        Account: <input type="number" name="s5" required value="<?= $s5 ?>"><br><br>
        <input type="submit" value="Generate Mark Sheet">
    </form>

    <div>
        <?= $result ?>
    </div>
</body>
</html>
