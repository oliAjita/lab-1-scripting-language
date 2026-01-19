<?php
$students = [
    [1, "Rajesh", 25, 56, 89, 57, 64, 98],
    [2, "Hari", 5, 56, 89, 57, 64, 98],
    [3, "Shyam", 6, 54, 79, 57, 69, 98],
    [4, "Rita", 10, 16, 89, 56, 64, 98],
    [5, "Gita", 4, 56, 89, 57, 69, 98],
    [6, "Sita", 24, 56, 99, 57, 24, 98],
    [7, "Sita", 24, 56, 99, 57, 24, 98],
    [8, "Sita", 24, 56, 99, 57, 24, 98]
];

// Function to calculate result
function getResult($m1, $m2, $m3, $m4, $m5) {
    if ($m1 < 35 || $m2 < 35 || $m3 < 35 || $m4 < 35 || $m5 < 35) {
        return "Fail";
    }
    return "Pass";
}

// First table
echo "<h3>Mark Ledger</h3>";
echo "<table border='1' cellspacing='0' cellpadding='5' width='100%'>";
echo "<tr>
        <th>SN</th> <th>Name</th> <th>Roll</th>
        <th>Web Tech II</th> <th>DBMS</th> <th>Economics</th> <th>DSA</th> <th>Account</th>
        <th>Total</th> <th>Result</th>
      </tr>";

foreach ($students as $student) {
    $total = $student[3] + $student[4] + $student[5] + $student[6] + $student[7];
    $result = getResult($student[3], $student[4], $student[5], $student[6], $student[7]);

    // Row color based on result
    $rowColor = ($result == "Pass") ? "style='background-color: #00ff99;'" : "style='background-color: #ff0000c1;'";
    
    echo "<tr $rowColor>";
    echo "<td>{$student[0]}</td>";
    echo "<td>{$student[1]}</td>";
    echo "<td>{$student[2]}</td>";
    echo "<td>{$student[3]}</td>";
    echo "<td>{$student[4]}</td>";
    echo "<td>{$student[5]}</td>";
    echo "<td>{$student[6]}</td>";
    echo "<td>{$student[7]}</td>";
    echo "<td>$total</td>";
    echo "<td>$result</td>";
    echo "</tr>";
}
echo "</table><br><br>";

//Alternate colors
echo "<h3>Alternate color</h3>";
echo "<table border='1' cellspacing='0' cellpadding='5' width='100%'>";
echo "<tr>
        <th>SN</th><th>Name</th><th>Roll</th>
        <th>Web Tech II</th><th>DBMS</th><th>Economics</th><th>DSA</th><th>Account</th>
        <th>Total</th><th>Result</th>
      </tr>";

foreach ($students as $index => $student) {
    $total = $student[3] + $student[4] + $student[5] + $student[6] + $student[7];
    $result = getResult($student[3], $student[4], $student[5], $student[6], $student[7]);
    $rowColor = ($index % 2 == 0) ? "style='background-color: #232222ff; color:white;'" 
        : "style='background-color: #9f9f9fff; color:black;'";    echo "<tr $rowColor>";
    echo "<td>{$student[0]}</td>";
    echo "<td>{$student[1]}</td>";
    echo "<td>{$student[2]}</td>";
    echo "<td>{$student[3]}</td>";
    echo "<td>{$student[4]}</td>";
    echo "<td>{$student[5]}</td>";
    echo "<td>{$student[6]}</td>";
    echo "<td>{$student[7]}</td>";
    echo "<td>$total</td>";
    $resultColor = ($result == "Pass") ? "style='background-color: #00ff99;'" : "style='background-color: #ff0000c1;'";
    echo "<td $resultColor>$result</td>";
    echo "</tr>";
}
echo "</table>";
?>
