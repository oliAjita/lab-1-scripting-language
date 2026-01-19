<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $n = intval($_POST['n']); 
    $diff = abs($n - 51);
    if ($n > 51) {
        $diff *= 3; 
    }
    $result = $diff; 
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Absolute Difference</title>
</head>
<body>
<h2>Enter a number to find difference with 51</h2>
<form method="post">
    <label>Number: </label>
    <input type="number" name="n" required value="<?= htmlspecialchars($_POST['n'] ?? '') ?>"> <br><br>
    <input type="submit" value="Calculate">
</form>

<?php if (isset($result)) : ?>
    <p><strong>Result = <?= $result ?>.
    </strong></p>
<?php endif; ?>
</body>
</html>
