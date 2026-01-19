<?php
function add($num1, $num2) {
    return $num1 + $num2;
}

$sum = null;
$num1 = $num2 = $result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST['num1']; 
    $num2 = $_POST['num2']; 
    $sum = add($num1, $num2);
    $result = "Sum is " . $sum;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sum</title>
</head>
<body>
    <h2>Sum</h2>
    <form method="post">
        <label>
            Enter first number:
            <input type="number" step="0.01" name="num1" required value="<?= htmlspecialchars($num1) ?>">
        </label> <br><br>
        <label>
            Enter second number:
            <input type="number" step="0.01" name="num2" required value="<?= htmlspecialchars($num2) ?>">
        </label>
        <br><br>
        <input type="submit" value="Calculate">
    </form>
    <p><strong><?php echo $result; ?></strong></p>
</body>
</html>
