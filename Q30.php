<?php
$err = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_FILES['profile']['error'] == 0) {
        if ($_FILES['profile']['size'] < 1024 * 1024) { // 1MB
            $file_formats = ['image/png','image/jpeg'];
            if (in_array($_FILES['profile']['type'], $file_formats)) {
                if (move_uploaded_file($_FILES['profile']['tmp_name'], 'uploads/' . $_FILES['profile']['name'])) {
                    echo "File upload success!";
                } else {
                    $err['profile'] = 'File upload error.';
                }
            } else {
                $err['profile'] = 'Please upload valid file format (jpeg, png).';
            }
        } else {
            $err['profile'] = 'Please select file below 1MB.';
        }
    } else {
        $err['profile'] = 'Please select file.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
    <h1>File Upload</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Profile Picture</label> <br>
        <input type="file" name="profile" />
        <span style="color:red;"><?php echo isset($err['profile']) ? $err['profile'] : ''; ?></span>
        <br><br>
        <input type="submit" name="submit" value="Upload File" />
    </form>
</body>
</html>
