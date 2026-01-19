<?php
function calculateArea($base, $height, $shape) {
    if ($shape === "triangle") {
        return 0.5 * $base * $height;
    } elseif ($shape === "parallelogram") {
        return $base * $height;
    } else {
        return null; 
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $base = floatval($_POST['base']);
    $height = floatval($_POST['height']);
    $shape = $_POST['shape'];
    $area = calculateArea($base, $height, $shape);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Area Calculator</title>
</head>
<body>
    <h2>Calculate Area</h2>
    <form method="post">
        <label> Base:
            <input type="number" step="0.01" name="base" required value="<?= htmlspecialchars($_POST['base'] ?? '') ?>">
        </label>
        <br><br>
        <label> Height:
            <input type="number" step="0.01" name="height" required value="<?= htmlspecialchars($_POST['height'] ?? '') ?>">
        </label>
        <br><br>
        <label> Shape:
            <select name="shape" required>
                <option value="triangle" <?= (($_POST['shape'] ?? '') === 'triangle') ? 'selected' : '' ?>>Triangle</option>
                <option value="parallelogram" <?= (($_POST['shape'] ?? '') === 'parallelogram') ? 'selected' : '' ?>>Parallelogram</option>
            </select>
        </label>
        <br><br>
        <input type="submit" value="Calculate">
    </form>

    <?php if (isset($area)) : ?>
        <h3> <?= $area !== null ? "Area of the " . htmlspecialchars($shape) . ": " . round($area, 2) : "Error" ?> </h3>
    <?php endif; ?>
</body>
</html>
