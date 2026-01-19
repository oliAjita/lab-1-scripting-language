<?php
include "db.php";
$id = $_GET['id'];
try{
    $sql = "delete from courses where id=$id";
    $conn->query($sql);
    if($conn->affected_rows == 1) {
        echo "Delete success";
    } else {
        echo "Delete failed";
    }
}catch(Exception $ex){
    die("Connection error: " . $ex->getMessage());
}
?>