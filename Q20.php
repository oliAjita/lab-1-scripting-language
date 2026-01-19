<?php
$str = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $str = trim($_POST['string']); 
    $length = strlen($str);

    if ($length < 2) {
        $new = $str; 
    } else {
        $front = substr($str, 0, 2); 
        $new = str_repeat($front, 4); 
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>String</title>
</head>
<body>
    <h2>Enter a string</h2>
    <form method="POST">
        <label>String: </label>
        <input type="text" name="string" required value="<?= htmlspecialchars($str); ?>"> <br> <br>
        <input type="submit" value="Submit">
    </form>

    <?php if (isset($new)) : ?>
        <p><strong>
            The new string is: <?= htmlspecialchars($new) ?>
        </strong></p>
    <?php endif; ?>
</body>
</html>
