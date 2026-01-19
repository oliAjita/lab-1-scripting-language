<?php
    $id = $_GET['id'];
try{
    $con = new mysqli('localhost','root','','scripting_language');
    $sql = "delete from record where id=$id";
    $con->query($sql);
    if($con->affected_rows == 1) {
        echo "Delete success";
    } else {
        echo "Delete failed";
    }
}catch(Exception $ex){
    die("Connection error: " . $ex->getMessage());
}
?>