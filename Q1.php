<?php
// a. Create variables with different datatypes
$int_var = 77;
$float_var = 3.14;
$string_var = "Scripting Language";
$boolean_var = true;
$array_var = array("numbers", "letters", "vowels");
$null_var = null;

//Print all the data using echo and print
echo "Integer: " . $int_var . "<br>";
print "Float: " . $float_var . "<br>";
echo "String: " . $string_var . "<br>";
echo "Boolean: " . ($boolean_var ? "true" : "false") . "<br>";
echo "Null: " . $null_var . "<br>";
print "<br>";

//Display content of array using print_r and var_dump
echo "Array using print_r:<br><pre>";
print_r($array_var);
echo "</pre><br>";

echo "Array using var_dump:<br><pre>";
var_dump($array_var);
echo "</pre><br>";

//Display result of checking data types
echo "Data type of int_var: " . gettype($int_var) . "<br>";
echo "Data type of float_var: " . gettype($float_var) . "<br>";
echo "Data type of string_var: " . gettype($string_var) . "<br>";
echo "Data type of boolean_var: " . gettype($boolean_var) . "<br>";
echo "Data type of array_var: " . gettype($array_var) . "<br>";
echo "Data type of null_var: " . gettype($null_var) . "<br>";
?>
