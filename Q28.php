<?php
if (isset($_COOKIE['username']) && !empty($_COOKIE['username'])) {
    session_start();
    $_SESSION['name'] = $_COOKIE['name'];
    $_SESSION['username'] = $_COOKIE['username'];
    header('location:dashboard.php');
    exit;
}

$user = [
    'name' => 'Ram Thapa',
    'username' => 'admin',
    'password' => 'admin123'
];

$err = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) && !empty(trim($_POST['username']))) {
        $username = trim($_POST['username']);
    } else {
        $err['username'] = 'Enter username';
    }

    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        $err['password'] = 'Enter password';
    }

    if (count($err) == 0) {
        if ($username === $user['username'] && $password === $user['password']) {
            session_start();
            $_SESSION['name'] = $user['name'];
            $_SESSION['username'] = $user['username'];

            // Set cookies 
            if (isset($_POST['remember'])) {
                setcookie('name', $user['name'], time() + 7*24*3600);
                setcookie('username', $user['username'], time() + 7*24*3600);
            }
            header('location:dashboard.php');
            exit;
        } else {
            $err['login'] = 'Invalid username or password.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login Form</h1>
    <?php
    if (isset($_GET['msg']) && $_GET['msg'] == 1) {
        echo '<p>Please login to access your dashboard</p>';
    }
    if (isset($err['login'])) {
        echo '<p style="color:red;">'.$err['login'].'</p>';
    }
    ?>
    <form action="" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Enter username" value="<?php echo isset($username)?htmlspecialchars($username):'' ?>" />
        <?php echo isset($err['username']) ? '<p style="color:red;">'.$err['username'].'</p>' : ''; ?>
        <br />

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Enter password" />
        <?php echo isset($err['password']) ? '<p style="color:red;">'.$err['password'].'</p>' : ''; ?>
        <br />

        <input type="checkbox" name="remember" value="remember" /> Remember me for 7 days
        <br />
        <input type="submit" name="login" value="Login" />
    </form>
</body>
</html>
