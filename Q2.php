<?php
define("PI", 3.1416);
$radius = "";
$area = null;
if (isset($_POST['radius'])) {
    $radius = floatval($_POST['radius']);
    $area = PI * $radius * $radius;
}
?>

<!DOCTYPE html>
<html>
<head> 
    <title>Area of a Circle</title>
</head>
<body>
    <h2>Calculate Area of a Circle</h2>
    <form method="post">
        <label> Enter Radius: </label>
        <input type="number" step="0.01" name="radius" required value="<?= htmlspecialchars($radius) ?>"><br><br>
        <input type="submit" value="Calculate"><br>
    </form>
    <?php if (isset($area)) : ?>
        <h3>Area of the circle: <?= round($area, 2) ?></h3>
    <?php endif; ?>
</body>
</html>
