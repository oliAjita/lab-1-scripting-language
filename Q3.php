<?php
$result = "";
$minutes = "";

function convert($minutes) {
    return $minutes * 60;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $minutes = floatval($_POST['minutes']); 
    $seconds = convert($minutes);
    $result = "$minutes minutes = $seconds seconds";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Minutes to Seconds Converter</title>
</head>
<body>
    <h2>Convert Minutes to Seconds</h2>
    <form method="post">
        <label>
            Enter minutes: 
            <input type="number" step="0.01" name="minutes" required value="<?= htmlspecialchars($_POST['minutes'] ?? '') ?>">
        </label>
        <br><br>
        <input type="submit" value="Convert">
    </form>

    <?php if (isset($result)) : ?>
        <p><strong><?= $result ?></strong></p>
    <?php endif; ?>
</body>
</html>
