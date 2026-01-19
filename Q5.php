<?php
function area($base, $height) {
        return 0.5 * $base * $height;
}
$result = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $base = $_POST['base'];
    $height = $_POST['height'];
    $tarea = area($base, $height);
    $result = "Area of the triangle is " . $tarea;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Area of a Triangle</title>
</head>
<body>
    <h2>Calculate Area of a Triangle</h2>
    <form method="post">
        <label>Base: <input type="number" name="base" required value="<?= htmlspecialchars($base) ?>"></label><br><br>
        <label>Height: <input type="number" name="height" required value="<?= htmlspecialchars($height) ?>"></label><br><br>
        <input type="submit" value="Calculate">
    </form>
    <p><strong><?php echo $result; ?></strong></p>
</body>
</html>
