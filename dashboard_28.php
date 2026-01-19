<?php
session_start();
$name = $_SESSION['name'];
$username = $_SESSION['username'];

echo "<h1>Hello $name as $username</h1>"
?>
