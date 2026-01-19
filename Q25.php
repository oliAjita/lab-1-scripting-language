<?php
$info = [
    'Name' => 'Ram Bahadur',
    'Address' => 'Lalitpur',
    'Email' => 'info@ram.com',
    'Phone' => 98454545,
    'Website' => 'www.ram.com'
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Display Info</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 10px 0;
            font-family: 'Times New Roman', Times, serif;
        }
        td {
            border: 1px solid #333;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h2>User Information</h2>
    <table>
        <?php
        foreach ($info as $key => $value) {
            echo "<tr>";
            echo "<td><b>" . $key . "</b></td>";
            echo "<td>" . $value . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
