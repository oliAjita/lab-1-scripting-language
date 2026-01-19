<?php
$err = [];
$name = $email = $dob = $phone ="";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (!isset($_POST["name"]) || empty(trim($_POST["name"]))) {
        $err['name'] = "Please enter your name";
    } elseif (strlen(trim($_POST["name"])) < 8) {
        $err['name'] = "Username must contain at least 8 characters.";
    } else {
        $name = trim($_POST["name"]);
    }

    if (!isset($_POST["email"]) || empty(trim($_POST["email"]))) {
        $err['email'] = "Please enter your email";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $err['email'] = "Invalid email format.";
    } else {
        $email = trim($_POST["email"]);
    }

    if (!isset($_POST["dob"]) || empty(trim($_POST["dob"]))) {
        $err['dob'] = "Please enter your date of birth";
    } elseif (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST["dob"])) {
        $err['dob'] = "DOB must be in yyyy-mm-dd format.";
    } else {
        $dob = trim($_POST["dob"]);
    }

    if (!isset($_POST["phone"]) || empty(trim($_POST["phone"]))) {
        $err['phone'] = "Please enter your phone number";
    } elseif (!preg_match("/^\d{10}$/", $_POST["phone"])) {
        $err['phone'] = "Phone must be 10 digits.";
    } else {
        $phone = trim($_POST["phone"]);
    }

    if (count($err) == 0) {
        try{
        $con = new mysqli("localhost", "root", "", "details");
        $sql = "insert into users (name, email, dob, phone)
                VALUES ('$name', '$email', '$dob', '$phone')";
            $con->query($sql);
            if ($con->affected_rows == 1) {
                echo "<p style='color: green;'>Information stored successfully!</p>";
            } else {
            echo "<p style='color: red;'>Error</p>";
            }
        }
        catch(Exception $ex){
            die("Connection error: " . $ex->getMessage());
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Personal Details</title>
    <style>
        .error { 
            color: red; 
        }
        label { 
            display: block; 
            margin-top: 10px; 
        }
    </style>
</head>
<body>
    <h2>Personal Details</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="name">Name: 
            <input type="text" name="name" value="<?php echo isset($name) ?$name: '' ?>" />
            <span class="error"><?php echo $err['name'] ?? ''; ?></span>
        </label>

        <label for="email">Email:
            <input type="text" name="email" value="<?php echo isset($email) ?$email: '' ?>" />
            <span class="error"><?php echo $err['email'] ?? ''; ?></span>
        </label>

        <label for="dob">Date of Birth:
            <input type="text" name="dob" value="<?php echo isset($dob) ?$dob: '' ?>"/>
            <span class="error"><?php echo $err['dob'] ?? ''; ?></span>
        </label>

        <label for="phone">Phone:
            <input type="text" name="phone" value="<?php echo isset($phone) ?$phone: '' ?>"/>
            <span class="error"><?php echo $err['phone'] ?? ''; ?></span>
        </label>
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>