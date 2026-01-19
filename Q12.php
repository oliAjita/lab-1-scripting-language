<?php
function length($str) {
    if ($str === "") {
        return 0;
    } else {
        return 1 + length(substr($str, 1));
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $length = length($name);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>String Length</title>
</head>
<body>
    <h2>String Length using Recursion</h2>
    <form method="post">
        <label> Enter a String:
            <input type="text" name="name" required value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
        </label> <br><br>
        <input type="submit" value="Calculate">
    </form>

    <?php if (isset($length)) : ?>
        <p><strong> Length of "<?= htmlspecialchars($name) ?>" is <?= $length ?>. </strong></p>
    <?php endif; ?>
</body>
</html>
