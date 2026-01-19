<?php
function Days($years) {
    return $years * 365;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ageYears = intval($_POST['years']); 
    $ageDays = Days($ageYears); 
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Age in Days</title>
</head>
<body>
    <h2>Convert Age</h2>
    <form method="post">
        <label> Enter Age in Years:
            <input type="number" name="years" required value="<?= htmlspecialchars($_POST['years'] ?? '') ?>">
        </label>
        <br><br>
        <input type="submit" value="Calculate">
    </form>

    <?php if (isset($ageDays)) : ?>
        <p><strong>Age in days: <?= $ageDays ?></strong></p>
    <?php endif; ?>
</body>
</html>
