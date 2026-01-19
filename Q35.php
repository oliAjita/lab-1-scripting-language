<?php
$simple_interest = "";
$principal = $_POST['principal'] ?? '';
$rate = $_POST['rate'] ?? '';
$time = $_POST['time'] ?? '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $principal = floatval($principal);
    $rate = floatval($rate);
    $time = floatval($time);
    $si = ($principal * $rate * $time) / 100;
    $simple_interest = round($si, 2);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Interest Calculator</title>
</head>
<body>
    <h2>Interest Calculator</h2>
    <form method="post">
        <label>Principal: </label>
        <input type="number" name="principal" required value="<?=$principal?>"><br><br>

        <label>Rate (%): </label>
        <input type="number" step="0.1" name="rate" required value="<?= $rate ?>"><br><br>

        <label>Time (years): </label>
        <input type="number" step="0.1" name="time" required value="<?= $time ?>"><br><br>

        <button type="submit" value="SI">Calculate Simple Interest</button>
    </form>
    <?= $simple_interest !== "" ? "<h3>Simple Interest: $simple_interest</h3>" : "" ?>

</body>
</html>
