<?php
$largest = null;
$num1 = $num2 = $num3 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $num3 = $_POST["num3"];

    // Largest using ternary operator
    $largest = ($num1 >= $num2) 
                  ? (($num1 >= $num3) ? $num1 : $num3) 
                  : (($num2 >= $num3) ? $num2 : $num3);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Largest Number</title>
</head>
<body>
    <h2>Largest Number</h2>
    <form method="post">
        <label>Enter first number: </label>
        <input type="number" step="any" name="num1" required value="<?= htmlspecialchars($num1) ?>"><br><br>

        <label>Enter second number: </label>
        <input type="number" step="any" name="num2" required value="<?= htmlspecialchars($num2) ?>"><br><br>

        <label>Enter third number: </label>
        <input type="number" step="any" name="num3" required value="<?= htmlspecialchars($num3) ?>"><br><br>

        <input type="submit" value="Find Largest">
    </form>

    <?php if (isset($largest)) : ?>
        <h3>The largest number is: <?= $largest ?></h3>
    <?php endif; ?>
</body>
</html>
