<?php
$str = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $str = trim($_POST['string']); 
    $length = strlen($str);
    $first = substr($str, 0, min(3, $length));
    $new = $first . $str . $first;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add First 3 Characters</title>
</head>
<body>
    <h2>Enter a string</h2>
    <form method="post">
        <label>String: </label>
        <input type="text" name="string" required value="<?= htmlspecialchars($str); ?>"> <br> <br>
        <input type="submit" value="Submit">
    </form>

    <?php if (isset($new)) : ?>
        <p><strong> The new string is: <?= htmlspecialchars($new) ?> </strong></p>
    <?php endif; ?>
</body>
</html>
