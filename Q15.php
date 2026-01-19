<?php
$result = "";
$arr = [25, 37, 12, 98, 77]; 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $index = intval($_POST['index']); 
    if (isset($arr[$index])) {
        $result = "Value at index $index: " . $arr[$index];
    } else {
        $result = "Index $index does not exist in the array!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Array Value by Index</title>
</head>
<body>
<h2>Enter Index to Get Array Value</h2>
<form method="post">
    <label> Index: </label>
    <input type="number" name="index" required value="<?= ($_POST['index'] ?? '') ?>"> <br><br>
    <input type="submit" value="Get Value">
</form>

<?php if ($result != ""): ?>
    <p><?= $result ?></p>
<?php endif; ?>
</body>
</html>
