<?php
function division($num) {
    return $num % 5 === 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num = floatval($_POST['num']);
    $div = division($num);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Divisibility Check</title>
</head>
<body>
    <h2>Divisible by 5</h2>
    <form method="post">
        <label> Enter a number:
        <input type="number" step="0.01" name="num" required value="<?= htmlspecialchars($_POST['num'] ?? '') ?>">
        </label>
        <br><br>
        <input type="submit" value="Check">
    </form>

    <?php if (isset($div)) : ?>
        <p><strong> <?= $div ? "<h3>true</h3>" : "<h3>false</h3>" ?> </strong></p>
    <?php endif; ?>
</body>
</html>
