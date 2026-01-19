<?php
$points = "";
$wins = $_POST['wins'] ?? '';
$draws = $_POST['draws'] ?? '';
$losses = $_POST['losses'] ?? '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $wins = intval($wins);
    $draws = intval($draws);
    $losses = intval($losses);
    $points = ($wins * 3) + ($draws * 1) + ($losses * 0);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Points Calculator</title>
</head>
<body>
    <h2>Points Calculator</h2>
    <form method="post" action="">
        <label for="wins">Number of wins:</label>
        <input type="number" name="wins" required value="<?=$wins?>"><br><br>

        <label for="draws">Number of draws:</label>
        <input type="number" name="draws" required value="<?=$draws?>"><br><br>

        <label for="losses">Number of losses:</label>
        <input type="number" name="losses" required value="<?=$losses?>"><br><br>

        <input type="submit" value="Calculate">
    </form>

    <?php if ($points !== ""): ?>
        <h3>Total points: <?php echo $points; ?></h3>
    <?php endif; ?>
</body>
</html>