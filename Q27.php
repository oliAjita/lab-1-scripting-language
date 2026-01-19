<?php
session_start();
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $user = "admin";
    $pass = "admin123";

    if ($username === $user && $password === $pass) {
        $_SESSION['username'] = $username;
        header("Location: welcome.php");
        exit;
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
<h2>Login Form</h2>
<form method="post">
    <label>Username:</label>
    <input type="text" name="username"><br><br>
    <label>Password:</label>
    <input type="password" name="password"><br><br>

    <span style="color:red;"><?php echo $error; ?></span><br>
    <input type="submit" value="Login">
</form>
</body>
</html>
