<?php
function calc($voltage, $current) {
    return $voltage * $current;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $voltage = floatval($_POST['voltage']);
    $current = floatval($_POST['current']);
    $power = calc($voltage, $current);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Power Calculator</title>
</head>
<body>
    <h2>Electric Power Calculator</h2>
    <form method="post">
        <label>Enter Voltage (V):
            <input type="number" step="0.01" name="voltage" required value="<?= htmlspecialchars($_POST['voltage'] ?? '') ?>">
        </label>
        <br><br>
        <label>Enter Current (A):
            <input type="number" step="0.01" name="current" required value="<?= htmlspecialchars($_POST['current'] ?? '') ?>">
        </label>
        <br><br>
        <input type="submit" value="Calculate">
    </form>

    <?php if (isset($power)) : ?>
        <p><strong>Power: <?= round($power, 2) ?> W</strong></p>
    <?php endif; ?>
</body>
</html>
