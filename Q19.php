<?php
$new = $str = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $str = trim($_POST['string']); 
    if (str_starts_with($str, "if")) {
        $new = $str;
    } else {
        $new = "if" . $str;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add "if" to String</title>
</head>
<body>
    <form method="post">
        <label>Enter a string: </label>
        <input type="text" name="string" required value="<?= htmlspecialchars($str); ?>">
        <br> <br>
        <input type="submit" value="Submit">
    </form>

    <?php if (!empty($new)) : ?>
        <p><strong>The new string is: <?= htmlspecialchars($new) ?></strong></p>
    <?php endif; ?>
</body>
</html>
