<?php
function SumTriple($num1, $num2) {
        $sum = $num1 + $num2;
        return ($num1 === $num2) ? 3 * $sum : $sum;

    }
$result = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $num1 = intval($_POST['num1']);
    $num2 = intval($_POST['num2']);
    $result = SumTriple($num1, $num2);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sum or Triple</title>
</head>
<body>
    <h2>Sum or Triple Calculator</h2>
    <form method="post">
        <label for="num1">First number:</label>
        <input type="number" name="num1" id="num1" required value="<?= htmlspecialchars($num1); ?>">
        <br><br>
        <label for="num2">Second number:</label>
        <input type="number" name="num2" id="num2" required value="<?= htmlspecialchars($num2); ?>">
        <br><br>
        <input type="submit" value="Calculate">
    </form>

    <?php

    if ($result !== "") {
        echo "<p>Result: $result</p>";
    }
    ?>
</body>
</html>
