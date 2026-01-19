<?php
$total = "";
$chicken = $_POST['chicken'] ?? '';
$cows = $_POST['cows'] ?? '';
$pigs = $_POST['pigs'] ?? '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $chicken = intval($chicken);
    $cows = intval($cows);
    $pigs = intval($pigs);
    $total = ($chicken * 2) + ($cows * 4) + ($pigs * 4);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Animal Legs Calculator</title>
</head>
<body>
    <h2>Animal Legs Calculator</h2>
    <form method="post" action="">
        <label for="chicken">Number of chicken:</label>
        <input type="number" name="chicken" required value="<?=$chicken?>"><br><br>

        <label for="cows">Number of cows:</label>
        <input type="number" name="cows" required value="<?=$cows?>"><br><br>

        <label for="pigs">Number of pigs:</label>
        <input type="number" name="pigs" required value="<?=$pigs?>"><br><br>

        <input type="submit" value="Calculate">
    </form>

    <?php if ($total !== ""): ?>
        <h3>Total legs: <?php echo $total; ?></h3>
    <?php endif; ?>
</body>
</html>