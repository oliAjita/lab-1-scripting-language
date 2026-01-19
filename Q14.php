<?php
function index($arr, $str) {
    $index = array_search($str, $arr);
    return ($index === false) ? -1 : $index;
}
$subject = ["DBMS", "DSA", "SAD", "Stats", "Web Tech"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = $_POST['search'];
    $index = index($subject, $search);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Index in Array</title>
</head>
<body>
    <h2>Find Index</h2>
    <form method="post">
        <p>Subjects: DBMS, DSA, SAD, Stats, Web Tech</p>
        <label> Enter Subject Name:
            <input type="text" name="search" required value="<?= htmlspecialchars($_POST['search'] ?? '') ?>">
        </label>
        <br><br>
        <input type="submit" value="Find Index">
    </form>

    <?php if ($index !== null) : ?>
        <p><strong> 
            <?= $index !== -1 
                ? "The index of '" . htmlspecialchars($search) . "' is $index." 
                : "'" . htmlspecialchars($search) . "' does not exist in the array." ?> 
        </strong></p>
    <?php endif; ?>
</body>
</html>
