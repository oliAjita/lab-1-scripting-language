<?php
$str="";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $str = trim($_POST['string']); 
    $length = strlen($str);

    if ($length >= 1) {
        $last = $str[$length - 1]; 
        $new = $last . $str . $last;
    } else {
        $new = $str; 
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Last Char at Front and Back</title>
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
