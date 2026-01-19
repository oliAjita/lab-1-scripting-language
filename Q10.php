<?php
function compare($str1, $str2) {
    return strlen($str1) === strlen($str2);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $str1 = $_POST['str1'];
    $str2 = $_POST['str2'];
    $result = compare($str1, $str2);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Compare String Length</title>
</head>
<body>
    <h2>Compare String Length</h2>
    <form method="post">
        <label>Enter First String:
            <input type="text" name="str1" required value="<?= htmlspecialchars($_POST['str1'] ?? '') ?>">
        </label>
        <br><br>
        <label>Enter Second String:
            <input type="text" name="str2" required value="<?= htmlspecialchars($_POST['str2'] ?? '') ?>">
        </label>
        <br><br>
        <input type="submit" value="Compare">
    </form>

    <?php if (isset($result)) : ?>
        <p><strong> <?= $result ? "<h3>true</h3>" : "<h3>false</h3>" ?> </strong></p>
    <?php endif; ?>
</body>
</html>
