<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $people = intval($_POST['people']);
    $capacity = 5; 
    if ($people == 0) {
        echo "<p>No cars needed.</p>";
    } else {
        $cars = ceil($people / $capacity);
        echo "<p>Number of cars needed: $cars</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Needed Cars</title>
</head>
<body>
    <h2>Cars Needed Calculation</h2>
    <form method="post">
        <label for="people">Number of people:</label>
        <input type="number" name="people" min="0" required> <br><br>
        <input type="submit" value="Calculate">
    </form>
</body>
</html>
