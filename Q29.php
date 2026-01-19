<?php
$err = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_FILES['cv']['error'] == 0) {
        if ($_FILES['cv']['size'] < 1024 * 1024) { // 1MB
            $allowed = ['application/pdf',
                        'application/msword',
                        'application/vnd.ms-word.document.12'];
            
            if (in_array($_FILES['cv']['type'], $allowed)) {
                if (move_uploaded_file($_FILES['cv']['tmp_name'], 'uploads/' . $_FILES['cv']['name'])) {
                    echo "CV uploaded successfully!";
                } else {
                    $err = "Upload error.";
                }
            } else {
                $err = "Only PDF or DOCX allowed.";
            }
        } else {
            $err = "File must be less than 1MB.";
        }
    } else {
        $err = "Please select a file.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload CV</title>
</head>
<body>
    <h2>Upload CV</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="cv">
        <span style="color:red;"><?php echo $err; ?></span><br><br>
        <input type="submit" value="Upload">
    </form>
</body>
</html>
